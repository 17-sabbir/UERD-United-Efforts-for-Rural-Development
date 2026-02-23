<?php

use App\Http\Controllers\frontController;
use App\Http\Controllers\Frontend\PageController;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('lang/{locale}', function (string $locale) {
    $supported = ['en', 'bn'];

    abort_unless(in_array($locale, $supported, true), 404);

    session(['locale' => $locale]);

    return redirect()->back()->withCookie(cookie('locale', $locale, 60 * 24 * 365));
})->name('locale.switch');
/*
|--------------------------------------------------------------------------
| Clints Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $slider = DB::table('slider')->get();
    $project = Project::where('status', 'ongoing')
        ->orderBy('priority', 'desc')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();
    $news = DB::table('latest_news')->take(6)->get();
    $mission_vision = DB::table('mission_vision')->orderBy('id', 'asc')->first();
    $albumAgg = DB::table('gallery')
        ->select('album', DB::raw('MAX(id) as cover_id'), DB::raw('COUNT(*) as photo_count'))
        ->groupBy('album')
        ->orderBy('cover_id', 'desc')
        ->get();

    $coverRows = DB::table('gallery')
        ->whereIn('id', $albumAgg->pluck('cover_id'))
        ->get()
        ->keyBy('id');

    $albums = $albumAgg->map(function ($row) use ($coverRows) {
        $name = $row->album ?: 'General';
        $cover = $coverRows->get($row->cover_id);

        return (object) [
            'name' => $name,
            'cover_image' => $cover ? $cover->image : null,
            'photo_count' => (int) $row->photo_count,
        ];
    })->values();

    $albumsPreview = $albums->take(6);
    $hasMoreAlbums = $albums->count() > 6;
    $application = DB::table('applications')->get()->first();
    // Fetch Empowering Lives data
    $empoweringLives = DB::table('empowering_lives')->first();
    // Fetch Development Sustainability data
    $devSustainability = DB::table('development_sustainability')->first();
    // Fetch 3 programs for the homepage highlights
    $programs = DB::table('programs')->where('status', 'active')->orderBy('created_at', 'desc')->take(3)->get();
    $stories = DB::table('stories')->orderBy('id', 'desc')->get();

    return view('home', compact('slider', 'project', 'news', 'mission_vision', 'albumsPreview', 'hasMoreAlbums', 'application', 'programs', 'stories', 'empoweringLives', 'devSustainability'));
});

Route::post('user/subscribe', [frontController::class, 'subscribe'])->name('user.subscribe');

// About us
Route::get('about/us', [frontController::class, 'about_us'])->name('about.us');
Route::get('mission/vision', [frontController::class, 'vision_mission'])->name('vision.mission');
Route::get('about/us/team/members', [frontController::class, 'teamMembers'])->name('team.members');
Route::get('origin/affilation', [frontController::class, 'origin_affilation'])->name('origin_affilation');
Route::get('committee', [frontController::class, 'committee'])->name('executive.committee');
Route::get('cheif/message', [frontController::class, 'cheif_msg'])->name('cheif.message');
Route::get('partner/donor', [frontController::class, 'partner'])->name('partner.donor');
Route::get('about/impact', [frontController::class, 'impact'])->name('about.impact');

// Programs
// Route::get('key/focus', [frontController::class, 'key_focus'])->name('key.focus.area');
Route::get('project/archieve', [frontController::class, 'proj_archieve'])->name('project.archieve');
Route::get('ongoing/project', [frontController::class, 'ongoing_project'])->name('ongoing.project');
Route::get('ongoing/project/view/{id}', [frontController::class, 'project_view'])->name('ongoing.project.view');
Route::get('latest/news/view/{id}', [frontController::class, 'news_view'])->name('latest.news.view');
Route::get('latest/news/all', [frontController::class, 'news_all'])->name('latest.news.all');
Route::get('youtube/video', [frontController::class, 'youtube'])->name('youtube.video');
Route::get('programs', [frontController::class, 'programs'])->name('programs.all');
Route::get('programs/view/{id}', [frontController::class, 'programsView'])->name('programs.view');
Route::get('success/stories', [frontController::class, 'stories'])->name('success.stories');
Route::get('success/stories/view/{id}', [frontController::class, 'storiesView'])->name('success.stories.view');
Route::get('events/calender', [frontController::class, 'calender'])->name('events.calender');

// Stay Informed
Route::get('strategic/plan', [frontController::class, 'strategic_plan'])->name('strategic.plan');
Route::get('policy/guideline', [frontController::class, 'policy_guideline'])->name('policy.guideline');
Route::get('publication', [frontController::class, 'publication'])->name('publication');

// Involved
Route::get('get_invoked/career', [frontController::class, 'career'])->name('invoked.career');
Route::get('volunteer/opportunities', [frontController::class, 'volOpportunities'])->name('volunterr.opportunities');
Route::get('donate', [frontController::class, 'donate'])->name('donate');
Route::post('donation/submit', [frontController::class, 'donationSubmit'])->name('donation.submit');
Route::get('fundraising', [frontController::class, 'fundraising'])->name('fundraising');
Route::get('contact', [frontController::class, 'contact'])->name('contact');
Route::post('message/store', [frontController::class, 'messageStore'])->name('message.store');

// __Gallery
Route::get('gallery/all', [frontController::class, 'all_photos'])->name('photo.all');
Route::get('gallery/albums', [frontController::class, 'albums'])->name('gallery.albums');
Route::get('gallery/album/{album}', [frontController::class, 'album_photos'])->name('gallery.album');

// FAQ
Route::get('faq', [frontController::class, 'faq'])->name('faq');

// Organization Profile
Route::get('organization-profile', [PageController::class, 'profile'])->name('frontend.profile');

// Projects
Route::get('projects', [PageController::class, 'projects'])->name('frontend.projects');
