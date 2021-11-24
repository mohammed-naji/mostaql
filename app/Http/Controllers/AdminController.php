<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Notifications\JobApprovalNotification;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function jobs()
    {
        $jobs = Project::with('user')->latest()->paginate(10);
        return view('admin.jobs.index', compact('jobs'));
    }

    function jobs_delete($id) {
        Project::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Job deleted');
    }

    public function jobs_update($id, $status)
    {
        if( ! in_array($status, ['open', 'closed', 'waiting-admin-approval']) ) {
            return redirect()->back()->with('success', 'Status Not allowed');
        }
        $project = Project::findOrFail($id);
        $project->update(['status' => $status]);

        if($status == 'open') {
            $user = $project->user;
            $user->notify(new JobApprovalNotification);
        }

        return redirect()->back()->with('success', 'Job updated');
    }
}
