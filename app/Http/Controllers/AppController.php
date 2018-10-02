<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\SaveJob;

class AppController extends Controller
{
    
    public function index()
    {
    	$jobs = Job::where('public',1)->orderBy('created_at', 'DESC')->get();
        return view('welcome', ['jobs'=>$jobs]);
    }    
    public function test()
    {
    	$jobs = Job::where('public',1)->orderBy('created_at', 'DESC')->paginate(20);
        return view('test', ['jobs'=>$jobs]);
    }



    public function search(Request $request)
    {
 
        $keyword = $request->input('search');
        $jobs = Job::where('title', 'LIKE', '%' .  $keyword . '%')->orWhere('company_name', 'LIKE', '%' .  $keyword . '%')->where('public', 1)->orderBy('created_at', 'DESC')->get();
        $output="";
         
        foreach ($jobs as $job) {
 		
 		$output .= '<a class="no-link" href="job/' . $job->id . '">'.
          '<div class="card">'.
              '<div class="card-action bb-1 fjb-color white-text">'.
                '<span class="card-title">'.
                    '<div class="title">' . $job->title . '</div>'.
                    '<i>' . $job->company_name . '</i>'.
                '</span>'.
              '</div>'. 
            '<div class="card-content">'.
              '<p class="content">' . str_limit($job->description, 200) . '</p>'.
            '</div>'.
            '<div class="card-action">'.
              '<div class="row m-0">'.
                  '<div class="col m6 s6">'.
                  '</div>'.
                  '<div class="col m6 s6 right-align">'.
                     '<span class="tooltipped" data-position="bottom" data-tooltip="Created">'. $job->created_at->diffForHumans() .'</span>'.
                  '</div>'.
              '</div>'.
            '</div>'.
          '</div>'.
        '</a>';
         
        }   

    	return Response($output);
    }


    public function job($id)
    {
    	$job = Job::findOrFail($id);
        return view('job', ['job'=>$job]);
    }

}
