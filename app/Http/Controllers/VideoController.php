<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'category', 'duration_type', 'presenter_type', 'featured']);
        
        $videos = Video::published()
            ->filter($filters)
            ->latest('published_at')
            ->paginate(12);

        $categories = ['psychology', 'thinking_anxiety', 'addiction', 'other'];
        $durationTypes = ['short', 'medium', 'long'];
        $presenterTypes = ['doctor', 'psychologist', 'other'];

        return view('videos.index', compact(
            'videos',
            'categories',
            'durationTypes',
            'presenterTypes',
            'filters'
        ));
    }

    public function show(Video $video)
    {
        if (!$video->is_published) {
            abort(404);
        }

        $video->incrementViews();
        $relatedVideos = $video->related_videos;

        return view('videos.show', compact('video', 'relatedVideos'));
    }
}
