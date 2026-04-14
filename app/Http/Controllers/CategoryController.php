<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display all categories page.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        // Get all active categories with books count
        $categories = Category::where('is_active', true)
            ->withCount(['books' => function ($query) {
                $query->published();
            }])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        // Get featured books across all categories
        $featuredBooks = Book::published()
            ->featured()
            ->with(['user'])
            ->latest()
            ->limit(6)
            ->get();

        // Get latest books
        $latestBooks = Book::published()
            ->with(['user'])
            ->latest()
            ->limit(8)
            ->get();

        // Get statistics
        $stats = [
            'total_categories' => $categories->count(),
            'total_books' => Book::published()->count(),
            'total_authors' => Book::published()->distinct('author_name')->count('author_name'),
            'total_views' => Book::published()->sum('views'),
        ];

        return view('categories.index', compact(
            'categories',
            'featuredBooks',
            'latestBooks',
            'stats'
        ));
    }

    /**
     * Get all categories for API/JSON response.
     *
     * @return JsonResponse
     */
    public function apiIndex(): JsonResponse
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get()
            ->map(function ($category) {
                $category->books_count = \App\Models\Book::published()
                    ->where('category', $category->slug)
                    ->count();
                return $category;
            });

        return response()->json([
            'categories' => $categories,
            'total' => $categories->count()
        ]);
    }
    public function show(string $categorySlug, Request $request): View|RedirectResponse
    {
        // Get category by slug
        $category = Category::where('slug', $categorySlug)
            ->where('is_active', true)
            ->firstOrFail();
        
        // Get published books for this category with filters
        $books = Book::published()
            ->where('category', $category->slug)
            ->with(['user']) // Eager load relationships
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('author_name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($request->sort, function ($query, $sort) {
                return match ($sort) {
                    'popular' => $query->orderByDesc('views'),
                    'downloads' => $query->orderByDesc('download_count'),
                    'rating' => $query->orderByDesc('rating'),
                    'latest' => $query->latest(),
                    default => $query->latest(),
                };
            })
            ->paginate(12)
            ->withQueryString();

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

        return view('categories.show', compact(
            'category',
            'books',
            'relatedCategories',
            'metaTitle',
            'metaDescription'
        ));
    }
}
