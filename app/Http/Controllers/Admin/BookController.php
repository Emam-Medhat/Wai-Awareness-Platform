<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Book::with(['user'])
            ->when($request->search, function ($q, $search) {
                $q->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                          ->orWhere('author_name', 'like', "%{$search}%")
                          ->orWhere('isbn', 'like', "%{$search}%");
                });
            })
            ->when($request->category, function ($q, $category) {
                $q->where('category', $category);
            })
            ->when($request->language, function ($q, $language) {
                $q->where('language', $language);
            })
            ->when($request->status, function ($q, $status) {
                if ($status === 'published') {
                    $q->where('is_published', true);
                } elseif ($status === 'draft') {
                    $q->where('is_published', false);
                }
            })
            ->when($request->featured, function ($q, $featured) {
                $q->where('is_featured', $featured === 'yes');
            })
            ->latest();

        $books = $query->paginate(15)->withQueryString();
        $categories = [
            'psychology' => 'علم النفس',
            'addiction' => 'الإدمان',
            'relationships' => 'العلاقات',
            'self_development' => 'التطوير الذاتي',
            'family' => 'الأسرة والطفل',
        ];

        return view('admin.books.index', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = [
            'psychology' => 'علم النفس',
            'addiction' => 'الإدمان',
            'relationships' => 'العلاقات',
            'self_development' => 'التطوير الذاتي',
            'family' => 'الأسرة والطفل',
        ];
        return view('admin.books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')
                ->store('books/covers', 'public');
        }

        if ($request->hasFile('pdf_file')) {
            $data['pdf_file'] = $request->file('pdf_file')
                ->store('books/files', 'public');
        }

        // Set default values
        $data['user_id'] = auth()->id();
        $data['is_published'] = $request->has('is_published');
        $data['is_featured'] = $request->has('is_featured');

        $book = Book::create($data);

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'تم إضافة الكتاب بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book): View
    {
        $book->load(['user']);
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book): View
    {
        $categories = [
            'psychology' => 'علم النفس',
            'addiction' => 'الإدمان',
            'relationships' => 'العلاقات',
            'self_development' => 'التطوير الذاتي',
            'family' => 'الأسرة والطفل',
        ];
        return view('admin.books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book): RedirectResponse
    {
        $data = $request->validated();

        // Generate slug if title changed and slug is empty
        if (empty($data['slug']) && $request->has('title')) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            // Delete old cover image
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')
                ->store('books/covers', 'public');
        }

        if ($request->hasFile('pdf_file')) {
            // Delete old file
            if ($book->pdf_file) {
                Storage::disk('public')->delete($book->pdf_file);
            }
            $data['pdf_file'] = $request->file('pdf_file')
                ->store('books/files', 'public');
        }

        // Set boolean values
        $data['is_published'] = $request->has('is_published');
        $data['is_featured'] = $request->has('is_featured');

        $book->update($data);

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'تم تحديث الكتاب بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): RedirectResponse
    {
        // Delete associated files
        $book->deleteFiles();

        $book->delete();

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'تم حذف الكتاب بنجاح!');
    }

    /**
     * Toggle featured status.
     */
    public function toggleFeatured(Book $book): RedirectResponse
    {
        $book->update([
            'is_featured' => !$book->is_featured
        ]);

        $status = $book->is_featured ? 'تمييز' : 'إلغاء تمييز';
        
        return redirect()
            ->back()
            ->with('success', "تم {$status} الكتاب بنجاح!");
    }

    /**
     * Toggle published status.
     */
    public function togglePublished(Book $book): RedirectResponse
    {
        $book->update([
            'is_published' => !$book->is_published
        ]);

        $status = $book->is_published ? 'نشر' : 'إلغاء نشر';
        
        return redirect()
            ->back()
            ->with('success', "تم {$status} الكتاب بنجاح!");
    }
}
