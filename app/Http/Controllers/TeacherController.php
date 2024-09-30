<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\CommonAdmin;

class TeacherController extends Controller
{
    protected $TeacherModel;
    protected $CommonAdminmodel;

	public function __construct(){

		$this->TeacherModel = new Teacher();
		$this->CommonAdminmodel = new CommonAdmin();

	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	

        $data = $this->CommonAdminmodel->getAllData('teachers');

        // dd($data);
        
        return view('backend.teachers.list',[
            'data'=>$data,
            'title'=>'All Teachers',
            'meta_desc'=>'This is meta description for all Teachers'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_teacher()
    {
        return view('backend.teachers.teacher_add');
    }

    // Save Data
    function teacher_add_save(Request $request){
        $request->validate([
            'name'=>'required',
        ]);

        $adminSessionData = session('adminData');

        // dd($request);

        // Post bannerImage
        $bannerImage='na';
        if($request->hasFile('image')){
            $image1=$request->file('image');
            $bannerImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/teacher_image');
            $image1->move($dest1,$bannerImage);
        }else{
            
            return redirect('admin/create-teacher')->with('error','Please select an image !');
        }

        // $post->user_id=$request->user()->id;
        $data['name'] = $request->name;
        $data['religion'] = $request->religion;
        $data['nationality'] = $request->nationality;
        $data['photo'] = $bannerImage;

        $data['institute_name'] = $request->institute_name;
        $data['present_post'] = $request->present_post;
        $data['date_of_birth'] = $request->date_of_birth;
        $data['mobile_number'] = $request->mobile_number;

        $data['institution_serial_number'] = $request->institution_serial_number;
        $data['index_number'] = $request->index_number;
        $data['subject_teacher'] = $request->subject_teacher;
        $data['joining_date'] = $request->joining_date;

        $data['blood_group'] = $request->blood_group;
        $data['father_name'] = $request->father_name;
        $data['mother_name'] = $request->mother_name;
        $data['mailling_address'] = $request->mailling_address;

        $data['permanent_address'] = $request->permanent_address;
        $data['email'] = $request->email;
        $data['sms_mobile'] = $request->sms_mobile;

        $data['create_by'] = $adminSessionData['id'];

        // dd($data);

        $res = $this->CommonAdminmodel->insertData($data, 'teachers');
        // dd($res);

        if($res){

        	if(count($request->institution_name) > 0){

        		$institution_name_arr = $request->institution_name;
        		$exam_name_arr = $request->exam_name;
        		$passing_year_arr = $request->passing_year;
        		$cgpa_arr = $request->cgpa;

        		foreach ($request->institution_name as $key => $value) {

        			$data_edu['teacher_id'] = $res;
        			$data_edu['institution_name'] = $value;
			        $data_edu['exam_name'] = $exam_name_arr[$key];
			        $data_edu['passing_year'] = $passing_year_arr[$key];
			        $data_edu['cgpa'] =$cgpa_arr[$key];

			        $this->CommonAdminmodel->insertData($data_edu, 'teacher_educations');
        		}
        	}
        	return redirect('admin/teacher_list')->with('success','Teacher has been added');
        }
        return redirect('admin/teacher_list')->with('error','Something went wrong, please try again !');
    } 
}
