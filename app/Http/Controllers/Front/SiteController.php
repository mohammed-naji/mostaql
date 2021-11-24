<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use App\Notifications\NewJobNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function find_jobs()
    {
        $jobs = Project::with('skills')->where('status', 'open')->orderBy('id', 'DESC')->paginate(5);
        $job_counts = Project::where('status', 'open')->count();
        return view('front.find_jobs', compact('jobs', 'job_counts'));
    }

    public function job($id)
    {
        $job = Project::with('skills', 'user.profile')->findOrFail($id);
        // dd($job);
        return view('front.job_details', compact('job'));
    }

    public function post_job()
    {
        return view('front.post_job');
    }

    function post_job_submit(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required',
        ]);

        Project::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
            'price' => $request->price,
        ]);

        $user = User::where('email', 'admin@admin.com')->first();
        $user->notify(new NewJobNotification);

        return redirect()->route('employer.post_job')->with('msg', 'Your job was posted successfully to the admin approval, thanks for using our website')->with('type', 'warning');

    }

    public function jobs()
    {
        $jobs = Auth::user()->projects()->where('status', 'open')->get();

        return view('front.employer_jobs', compact('jobs'));
    }
}
