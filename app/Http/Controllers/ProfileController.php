<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profile;
use App\task;
use App\Resume;
use App\UserAnalysis;
use App\SkillUser;
use Request, Input, Response;

class ProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct(){

        $this->middleware('auth');
        $this->middleware('student');
    }


    public function resume()
    {
        return view('profile.paper');
    }

    public function index()
    {
        /*$this->middleware('auth');*/

        $user = \Auth::user();
       	
        
        $resume = Resume::where('studentID','=',$user->id)->first();


        if (!$resume or !$user->tasks()->first()) {
        	$resume = new Resume;
        	$resume->studentID = $user->id;
        	$resume->about = 'Please input the text about you.';
            $resume->evaluation = 'Not evaluated';
        	$resume->save();

            return view('Profile.empty');
        }


        $achievements = $user->ranks()->orderBy('overall_point','DESC')->get();


        $currentTask = $user->tasks()->orderBy('id', 'DESC')->get()->first();
       
        $currentTaskId = $currentTask->id;
        $prevTask = task::find($currentTask->id - 1);
        $nextTask = task::find($currentTask->id + 1);
        
        $output='';
        $output .="communication,".$resume->communication."\n";
        $output .="codingAbility-Javascript,".$resume->Javascript."\n";
        $output .='codingAbility-java,'.$resume->java."\n";
        $output .='codingAbility-Html,'.$resume->Html."\n";
        $output .='codingAbility-Mysql,'.$resume->Mysql."\n";
        $output .='codingAbility-Cpp,'.$resume->Cpp."\n";
        $output .='codingAbility-Python,'.$resume->Ruby."\n";
        $output .="learningAblity,".$resume->learningAblity."\n";
        
        $file = fopen('user_csv/visit-sequences-'.$user->id.'.csv', 'w');
		fwrite($file, $output);
		fclose($file);
        
		$skillUsers = SkillUser::where('user_id', $user->id)->get();
        return view('Profile.Profile',compact('user','resume','achievements','prevTask','nextTask','currentTask','skillUsers'));


    }

    public function store()
    {

        $user = \Auth::user();
        $input = Request::all();
        $resume = Resume::find($user->id);
        $resume->about = array_get($input,'about');
        $resume->save();

        return redirect('/profile');

    }
    
    public function resumeStore()
    {
    	$user = \Auth::user();
    	
    	$resume = Resume::where('studentID', $user->id)->firstOrFail();
    	
    	if ($resume) {
	    	$resume->about = Input::get('about');
	    	$resume->save();
    	}
    	
    }
    
    public function analysis()
    {
    	$user = \Auth::user();
    	return Response::download('user_csv/visit-sequences-'.$user->id.'.csv');
    }
    
}
