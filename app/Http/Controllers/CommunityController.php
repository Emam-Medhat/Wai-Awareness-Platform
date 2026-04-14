<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\CampaignContent;
use App\Models\CampaignReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CommunityController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $activeCampaigns = Campaign::active()->count();
        $totalCampaigns = Campaign::count();
        $recentCampaigns = Campaign::latest()->limit(5)->get();

        return view('community.index', compact(
            'user',
            'activeCampaigns',
            'totalCampaigns',
            'recentCampaigns'
        ));
    }

    public function contentLibrary()
    {
        $contents = CampaignContent::with(['campaign', 'creator'])
            ->latest()
            ->paginate(20);

        return view('community.content-library', compact('contents'));
    }

    public function uploadContent(Request $request)
    {
        $validated = $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,video,document,text',
            'file_path' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp,pdf,doc,docx,mp4,mov|max:10240',
            'description' => 'nullable|string|max:1000',
            'platform' => 'required|in:social,radio,tv,print,digital',
        ]);

        $validated['created_by'] = Auth::id();

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filePath = $file->store('campaign-content', 'public');
            $validated['file_path'] = $filePath;
        }

        CampaignContent::create($validated);

        return back()->with('success', 'تم رفع المحتوى بنجاح');
    }

    public function campaigns()
    {
        $campaigns = Campaign::with(['creator', 'manager'])
            ->latest()
            ->paginate(10);

        return view('community.campaigns.index', compact('campaigns'));
    }

    public function createCampaign()
    {
        return view('community.campaigns.create');
    }

    public function storeCampaign(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'target_audience' => 'nullable|string|max:255',
            'platforms' => 'nullable|array',
            'goals' => 'nullable|string|max:2000',
            'budget' => 'nullable|numeric|min:0',
        ]);

        $validated['created_by'] = Auth::id();
        $validated['status'] = 'draft';

        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imagePath = $image->store('campaigns', 'public');
            $validated['cover_image'] = $imagePath;
        }

        Campaign::create($validated);

        return redirect()->route('community.campaigns')
            ->with('success', 'تم إنشاء الحملة بنجاح');
    }

    public function editCampaign(Campaign $campaign)
    {
        if ($campaign->created_by !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        return view('community.campaigns.edit', compact('campaign'));
    }

    public function updateCampaign(Request $request, Campaign $campaign)
    {
        if ($campaign->created_by !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'target_audience' => 'nullable|string|max:255',
            'platforms' => 'nullable|array',
            'goals' => 'nullable|string|max:2000',
            'budget' => 'nullable|numeric|min:0',
            'status' => 'required|in:draft,active,paused,completed',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($campaign->cover_image) {
                Storage::disk('public')->delete($campaign->cover_image);
            }
            
            $image = $request->file('cover_image');
            $imagePath = $image->store('campaigns', 'public');
            $validated['cover_image'] = $imagePath;
        }

        $campaign->update($validated);

        return back()->with('success', 'تم تحديث الحملة بنجاح');
    }

    public function reports()
    {
        $reports = CampaignReport::with(['campaign', 'creator'])
            ->latest()
            ->paginate(15);

        return view('community.reports', compact('reports'));
    }

    public function generateReport(Request $request)
    {
        $validated = $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'title' => 'required|string|max:255',
            'period_start' => 'required|date',
            'period_end' => 'required|date|after:period_start',
            'reach' => 'required|integer|min:0',
            'engagement' => 'required|integer|min:0',
            'conversions' => 'required|integer|min:0',
        ]);

        $validated['created_by'] = Auth::id();

        CampaignReport::create($validated);

        return back()->with('success', 'تم إنشاء التقرير بنجاح');
    }
}
