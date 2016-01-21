<?php

namespace App\Http\Controllers\Company;

use App\project;
use App\Task;
use View, Input, Redirect, Session, Validator;
use App\Http\Controllers\Controller;
use App\project as ProjectModel;
use App\Company as CompanyModel;
use App\Question as QuestionModel;
use App\User as UserModel;
use App\TaskUser as TaskUserModel;
use App\UserProject as UserProjectModel;
use App\Answer as AnswerModel;
use App\Task as TaskModel;

class ProjectController extends Controller { 

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('company');

	}


	public function index() {
		
		$param['pageNo'] = 1;
		$param['projects'] = ProjectModel::where('company_id', session::get('company_id'))->paginate(10);
		if (Session::has('alert')) {
			$param['alert'] = Session::get('alert');
		}
		
		return View::make('company.project.index')->with($param);
	}
	
	public function create() {
		$param['pageNo'] = 2;
		return View :: make('company.project.createprojcet')->with($param);
	}
	
	public function store(CreateProjectRequest $request) {

        $validator = $request->all();

        
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        } else {
			if(Input::has('project_id')) {
				$id = Input::get('project_id');
				$projects = ProjectModel::find($id);
				$alert['msg'] = 'Project has been updated successfully';
			} else {
				$projects = new ProjectModel;

				$alert['msg'] = 'Project has been created successfully';
			}
			$projects->name = Input::get('name');
			$projects->description  = Input::get('description');
			$projects->skills = Input::get('skills');
			$projects->environment = Input::get('environment');
			$projects->difficulty = Input::get('difficulty');
			$projects->status = Input::get('status');
			$projects->company_id = Session::get('company_id');
			$projects->save();
			 
			$alert['type'] = 'success';
			return Redirect::route('project')->with('alert', $alert);
		}
	}

	public function view($projectId) {

		$param['pageNo'] = 1;
		$param['projectId'] = $projectId;
		$param['tasks'] = TaskModel::where('project_id', $projectId)->orderBy('sequence')->paginate(10);
		$param['users'] = UserModel::get();
		$param['projectId'] = $projectId;
		if (Session::has('alert')) {
			$param['alert'] = Session::get('alert');
		}

		return View::make('company.project.view')->with($param);

	}
	
	public function delete($id) {
		TaskModel::where('project_id', $id)->delete();
		ProjectModel::where('id', $id)->delete();
		$alert['msg'] = 'Project has been deleted successfully';
		$alert['type'] = 'success';
	
		return Redirect::route('project')->with('alert', $alert);
	}
	
	public function edit($id) {
		$param['pageNo'] = 1;
		$result = ProjectModel::find($id);
		$param['projects'] = $result;
	
		return View::make('company.project.edit')->with($param);
	}
}