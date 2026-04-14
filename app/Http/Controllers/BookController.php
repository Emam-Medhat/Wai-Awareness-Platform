<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Book::published()
            ->with(['user'])
            ->when($request->search, function ($q, $search) {
                $q->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                          ->orWhere('author_name', 'like', "%{$search}%")
                          ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($request->category, function ($q, $categorySlug) {
                if (is_array($categorySlug)) {
                    $q->whereIn('category', $categorySlug);
                } else {
                    $q->byCategory($categorySlug);
                }
            })
            ->when($request->language, function ($q, $language) {
                if (is_array($language)) {
                    $q->whereIn('language', $language);
                } else {
                    $q->byLanguage($language);
                }
            })
            ->when($request->sort, function ($q, $sort) {
                return match ($sort) {
                    'popular' => $q->popular(),
                    'latest' => $q->latest(),
                    'rating' => $q->highestRated(),
                    default => $q->latest(),
                };
            });

        $books = $query->paginate(12)->withQueryString();
        $categories = Category::active()->orderBy('name')->get();
        $featuredBooks = Book::getFeaturedBooks(3);

        return view('books.index', compact('books', 'categories', 'featuredBooks'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book): View
    {
        // Increment views
        $book->incrementViews();

        // Load relationships and related books
        $book->load(['user']);
        
        $relatedBooks = Book::published()
            ->where('category', $book->category)
            ->where('id', '!=', $book->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('books.show', compact('book', 'relatedBooks'));
    }

    /**
     * Download book file.
     */
    public function download(Book $book): RedirectResponse
    {
        if (!$book->isDownloadable()) {
            return back()->with('error', 'الملف غير متاح للتحميل.');
        }

        // Increment downloads
        $book->incrementDownloads();

        $filePath = storage_path('app/public/' . $book->file_path);
        $fileName = $book->slug . '.' . pathinfo($filePath, PATHINFO_EXTENSION);

        return response()->download($filePath, $fileName);
    }

    /**
     * Show books by category.
     */
    public function byCategory(string $categorySlug, Request $request): View
    {
        $category = Category::where('slug', $categorySlug)
            ->where('is_active', true)
            ->firstOrFail();

        $query = Book::published()
            ->where('category', $category->slug)
            ->with('user')
            ->when($request->search, function ($q, $search) {
                $q->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                          ->orWhere('author_name', 'like', "%{$search}%")
                          ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($request->sort, function ($q, $sort) {
                return match ($sort) {
                    'popular' => $q->orderByDesc('views'),
                    'latest' => $q->latest(),
                    'rating' => $q->orderByDesc('rating'),
                    default => $q->latest(),
                };
            });

        $books = $query->paginate(12)->withQueryString();

        // Get related categories for sidebar
        $relatedCategories = Category::where('id', '!=', $category->id)
            ->where('is_active', true)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        // SEO Meta
        $metaTitle = "{$category->name} - كتب ومقالات";
        $metaDescription = "اكتشف أفضل الكتب في مجال {$category->name}. " . 
                           "عرض {$books->total()} كتاب مع مراجعات وتقييمات.";

        return view('categories.show', compact('category', 'books', 'relatedCategories', 'metaTitle', 'metaDescription'));
    }

    public function create()
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
        }

        $categories = [
            'psychology' => 'علم النفس',
            'addiction' => 'الإدمان',
            'relationships' => 'العلاقات',
            'self_development' => 'التطوير الذاتي',
            'family' => 'الأسرة والطفل'
        ];

        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'author_name' => 'required|string|max:255',
            'author_title' => 'nullable|string|max:255',
            'category' => 'required|string|in:psychology,addiction,relationships,self_development,family',
            'language' => 'required|string|in:ar,en',
            'size' => 'nullable|string|in:small,medium,large',
            'isbn' => 'nullable|string|max:20',
            'pages' => 'nullable|integer|min:1',
            'publication_date' => 'nullable|date',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'book_file' => 'nullable|file|mimes:pdf|max:51200',
            'tags' => 'nullable|string',
            'featured' => 'nullable|boolean',
            'published' => 'nullable|boolean'
        ]);

        // Handle file uploads
        $coverImagePath = null;
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('books/covers', 'public');
        }

        $bookFilePath = null;
        if ($request->hasFile('book_file')) {
            $bookFilePath = $request->file('book_file')->store('books/files', 'public');
        }

        // Create book
        $book = Book::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . time(),
            'description' => $validated['description'],
            'content' => $validated['content'],
            'author_name' => $validated['author_name'],
            'author_title' => $validated['author_title'] ?? null,
            'category' => $validated['category'],
            'language' => $validated['language'],
            'size' => $validated['size'] ?? 'medium',
            'isbn' => $validated['isbn'] ?? null,
            'pages' => $validated['pages'] ?? null,
            'publication_date' => $validated['publication_date'] ?? null,
            'cover_image' => $coverImagePath,
            'pdf_file' => $bookFilePath,
            'tags' => $validated['tags'] ? explode(',', str_replace(' ', '', $validated['tags'])) : [],
            'featured' => $validated['featured'] ?? false,
            'published' => $validated['published'] ?? true,
            'user_id' => Auth::id(),
            'views' => 0,
            'download_count' => 0,
            'rating' => 0
        ]);

        return redirect()->route('books.show', $book->slug)
            ->with('success', 'تم إضافة الكتاب بنجاح!');
    }

    public function edit($slug)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
        }

        $book = Book::where('slug', $slug)->firstOrFail();
        
        // Check if user owns the book or is admin
        if (!Auth::user()->isAdmin() && $book->user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بتعديل هذا الكتاب');
        }

        $categories = [
            'psychology' => 'علم النفس',
            'addiction' => 'الإدمان',
            'relationships' => 'العلاقات',
            'self_development' => 'التطوير الذاتي',
            'family' => 'الأسرة والطفل'
        ];

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $slug)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
        }

        $book = Book::where('slug', $slug)->firstOrFail();
        
        // Check if user owns the book or is admin
        if (!Auth::user()->isAdmin() && $book->user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بتعديل هذا الكتاب');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'author_name' => 'required|string|max:255',
            'author_title' => 'nullable|string|max:255',
            'category' => 'required|string|in:psychology,addiction,relationships,self_development,family',
            'size' => 'nullable|string|in:small,medium,large',
            'isbn' => 'nullable|string|max:20',
            'pages' => 'nullable|integer|min:1',
            'publication_date' => 'nullable|date',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'book_file' => 'nullable|file|mimes:pdf|max:51200',
            'tags' => 'nullable|string',
            'featured' => 'nullable|boolean',
            'published' => 'nullable|boolean'
        ]);

        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            // Delete old cover image
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $coverImagePath = $request->file('cover_image')->store('books/covers', 'public');
            $validated['cover_image'] = $coverImagePath;
        }

        if ($request->hasFile('book_file')) {
            // Delete old book file
            if ($book->pdf_file) {
                Storage::disk('public')->delete($book->pdf_file);
            }
            $bookFilePath = $request->file('book_file')->store('books/files', 'public');
            $validated['pdf_file'] = $bookFilePath;
        }

        // Update slug if title changed
        if ($validated['title'] !== $book->title) {
            $validated['slug'] = Str::slug($validated['title']) . '-' . time();
        }

        // Handle tags
        if ($validated['tags']) {
            $validated['tags'] = explode(',', str_replace(' ', '', $validated['tags']));
        }

        $book->update($validated);

        return redirect()->route('books.show', $book->slug)
            ->with('success', 'تم تحديث الكتاب بنجاح!');
    }

    public function destroy($slug)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
        }

        $book = Book::where('slug', $slug)->firstOrFail();
        
        // Check if user owns the book or is admin
        if (!Auth::user()->isAdmin() && $book->user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بحذف هذا الكتاب');
        }

        // Delete files
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }
        if ($book->pdf_file) {
            Storage::disk('public')->delete($book->pdf_file);
        }

        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'تم حذف الكتاب بنجاح!');
    }
}
