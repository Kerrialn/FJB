<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Job;
use Auth;
use File;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Application;
use App\SaveJob;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user = Auth::user();
        $users = User::where('account_type','candidate')->get();
        $vacancies = Job::orderBy('created_at','desc')->get();
        $pending = Job::where('public', 0)->get();
        $applications = Application::where("user_id", $current_user->id)->get();
        $bookmarks = SaveJob::where("user_id", $current_user->id)->get();
        $job_titles = Job::pluck('title');
        $company_names = Job::pluck('company_name');
        
        $jobs_created = Job::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        
        return view('home', ['jobs_created'=>$jobs_created, 'users'=>$users, 'pending'=>$pending, 'applications'=>$applications, 'bookmarks'=>$bookmarks, 'vacancies'=>$vacancies, 'job_titles'=>$job_titles, 'company_names'=>$company_names, ]);
    }

    public function create()
    {
        return view('create');
    }    
      
     
    public function edit_vacancy($id)
    {
        $job = Job::find($id);
        return view('modify', ['job'=>$job]);
    }    
         
    public function update_vacancy(Request $request, $id)
    {
        if(Auth::user()->account_type == 'admin' ){
        $job = Job::find($id);
        $job->update($request->all());
        return redirect('/home#vacancies')->with('message', 'Vacancy updated');
        }else{
         return redirect()->back()->with('message', 'Access denied');   
        }
    }    
    
    

    public function delete_vacancy($id)
    {
        if(Auth::user()->account_type == 'admin' ){
            
          $job = Job::find($id);
          $job->delete($job->id);
          return redirect('/home#vacancies')->with('message', 'Vacancy deleted');
            
        }else{
            return redirect()->back()->with('message', 'Access denied');
        }
        
    }
    
    
    
        public function remove_bookmark(Request $request, $id)
    {
          $bookmark = SaveJob::find($id);
          $bookmark->delete($bookmark->id);
  
        return redirect()->back()->with('message', 'Bookmark removed');
    }
    
    
    public function bookmark_job($id)
    {
        $bookmark = new SaveJob;
        $bookmark->user_id = Auth::user()->id; 
        $bookmark->job_id = $id;
        $bookmark->save();
        return redirect()->back()->with('message', 'Job bookmarked');
    }        
    
    
    public function update_user(Request $request)
    {
        $user = Auth::user();
        $user->update($request->all());
        return redirect()->back()->with('message', 'Changes saved');
    }       


    public function apply(Request $request, $id)
    {
        
        $job = Job::findOrFail($id);
        $user = User::findOrFail(Auth::user()->id);

        Mail::send('email.apply', ['user' => $user, 'job'=>$job], function ($m) use ($user, $job)  {
            $m->from('no-reply@lesson-planner.org', 'FJB one-click apply');
            $m->attach('resumes/'.$user->cv_path);
            $m->to($job->email, $user->first_name . $user->last_name )->subject($job->title);
        });

        $application = new Application;
        $application->user_id = Auth::user()->id; 
        $application->job_id = $id;
        $application->save();

        return redirect()->back()->with('message', 'Application sent');
    }

    public function allow_post(Request $request, $id)
    {
         Job::where('id', $id )->update(['public'=>1]);
        return redirect('/home#review')->with('message', 'Vacancy Allowed');
    }   


    public function reject_post(Request $request, $id)
    {
         Job::where('id', $id )->update(['public'=>3]);
        return redirect('/home#review')->with('message', 'Vacancy Rejected');
    }   




    public function upload_cv(Request $request)
    {
        $this->validate($request, [
            "file" => "required|mimes:pdf|max:10000",
        ]);       

        $user = Auth::user();
        $input = $request->all();

        if($file = $request->file('file')){
            $name = $file->getClientOriginalName();
            $location = "resumes";
            $file->move($location , $name);
            $input['cv_path'] = $name;
        }


        User::where('id', Auth::user()->id )->update(['cv_path'=>$name]);
        return redirect('/home');
    }  

    public function delete_cv()
    {
        $user_id = Auth::user()->id;
        $user = Auth::user();
        $filename = 'resumes/' . $user->cv_path;
        File::delete($filename);
        User::where('id', $user_id )->update(['cv_path'=>NULL]);
        return redirect('/home')->with('message', 'Resume deleted');
    }


    public function createVac(Request $request)
    {

        $this->validate($request, [
            'title'=>'required',
            'company_name'=>'required',
            'description'=>'required',
            'email' => 'required_without:apply_link',
            'apply_link' => 'required_without:email',
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        $job = Job::create($input);

        
        return redirect('/home')->with('message', 'Vacancy submitted');
    }

}
