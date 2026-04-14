<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'category', 'size', 'author_type', 'featured']);
        
        $articles = Article::published()
            ->filter($filters)
            ->latest('published_at')
            ->paginate(12);

        $categories = Article::published()->distinct()->pluck('category')->filter();
        $sizes = ['small', 'medium', 'large'];
        $authorTypes = ['doctor', 'psychologist', 'other'];

        return view('articles.index', compact(
            'articles',
            'categories',
            'sizes',
            'authorTypes',
            'filters'
        ));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->orWhere('id', $slug)->firstOrFail();
        
        if (!$article->is_published) {
            abort(404);
        }

        $article->incrementViews();
        $relatedArticles = $article->related_articles;

        return view('articles.show', compact('article', 'relatedArticles'));
    }

    public function storeComment(Request $request, $slug)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $article = Article::where('slug', $slug)->orWhere('id', $slug)->firstOrFail();
        
        Comment::create([
            'body' => $request->body,
            'article_id' => $article->id,
            'user_id' => auth()->id(),
            'is_approved' => true, // Auto-approve for now
        ]);

        return back()->with('success', 'تم إضافة تعليقك بنجاح!');
    }
}
