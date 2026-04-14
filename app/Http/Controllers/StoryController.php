<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    public function index(Request $request)
    {
        $stories = Story::approved()
            ->latest()
            ->paginate(9);

        return view('stories.index', compact('stories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:255',
            'author_city' => 'required|string|max:255',
            'author_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'content' => 'required|string|max:2000',
            'is_anonymous' => 'nullable|boolean',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['is_anonymous'] = $request->boolean('is_anonymous');

        if ($request->hasFile('author_avatar')) {
            $avatar = $request->file('author_avatar');
            $avatarPath = $avatar->store('stories/avatars', 'public');
            $validated['author_avatar'] = $avatarPath;
        }

        Story::create($validated);

        return back()->with('success', 'تم إرسال قصتك بنجاح، ستتم مراجعتها والنشر بعد الموافقة');
    }
}
