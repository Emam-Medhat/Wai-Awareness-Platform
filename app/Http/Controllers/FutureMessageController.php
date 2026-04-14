<?php

namespace App\Http\Controllers;

use App\Models\FutureMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FutureMessageController extends Controller
{
    public function index()
    {
        $messages = Auth::user()
            ->futureMessages()
            ->latest('remind_at')
            ->paginate(10);

        return view('pages.future-message', compact('messages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
            'remind_at' => 'required|date|after:today',
        ]);

        $validated['user_id'] = Auth::id();

        FutureMessage::create($validated);

        return back()->with('success', 'تم حفظ رسالتك المستقبلية بنجاح');
    }

    public function destroy(FutureMessage $futureMessage)
    {
        if ($futureMessage->user_id !== Auth::id()) {
            abort(403);
        }

        if ($futureMessage->is_sent) {
            return back()->with('error', 'لا يمكن حذف رسالة تم إرسالها');
        }

        $futureMessage->delete();

        return back()->with('success', 'تم حذف الرسالة بنجاح');
    }
}
