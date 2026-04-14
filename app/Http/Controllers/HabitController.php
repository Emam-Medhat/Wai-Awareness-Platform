<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HabitController extends Controller
{
    public function index(Request $request)
    {
        $habits = Habit::approved()
            ->latest()
            ->paginate(9);

        return view('habits.index', compact('habits'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:255',
            'author_city' => 'required|string|max:255',
            'author_age' => 'nullable|integer|min:1|max:120',
            'author_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'content' => 'required|string|max:2000',
        ]);

        $validated['user_id'] = Auth::id();

        if ($request->hasFile('author_avatar')) {
            $avatar = $request->file('author_avatar');
            $avatarPath = $avatar->store('habits/avatars', 'public');
            $validated['author_avatar'] = $avatarPath;
        }

        Habit::create($validated);

        return back()->with('success', 'تم إرسال عادتك بنجاح، ستتم مراجعتها والنشر بعد الموافقة');
    }
}
