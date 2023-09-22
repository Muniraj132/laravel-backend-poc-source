<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ActivityLogController extends Controller
{
    
    
    public function index(Request $request)
{
    // Retrieve the activity log data for the current user
    $user = Auth::user();
    $activityLogs = ActivityLog::where('user_id', $user->id)
        ->orderBy('login_time', 'desc')
        ->get();

    return view('activity-log', compact('activityLogs'));
}

public function deleteActivityLog($id)
{
    // Find and delete the activity log
    $activityLog = ActivityLog::findOrFail($id);
    $activityLog->delete();

    // Redirect back or to a specific page
    return redirect()->back()->with('success', 'Activity log deleted successfully');
}


    public function exportToPdf()
{
    $activityLogs = ActivityLog::all();

    // Create an HTML string for the table
    $html = '<table border="1">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Login Time</th>
                        <th>Logout Time</th>
                    </tr>
                </thead>
                <tbody>';
    
    foreach ($activityLogs as $index => $activityLog) {
        $html .= '<tr>
                    <td>'.($index + 1).'</td>
                    <td>'.$activityLog->user->name.'</td>
                    <td>'.$activityLog->user->email.'</td>
                    <td>'.$activityLog->login_time.'</td>
                    <td>'.$activityLog->logout_time.'</td>
                  </tr>';
    }

    $html .= '</tbody></table>';

    // Generate the PDF
    $pdf = PDF::loadHTML($html);

    return $pdf->download('activity-log.pdf');
}
    
}
