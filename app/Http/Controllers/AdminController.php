<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam_term;
use App\Exam_type;
use App\Exam_create;
use App\Exam_project_assessment_type;
use App\Exam_project_assessment;

class AdminController extends Controller
{
	function message($type, $msg, $data = null) {
        $this->data['type'] = $type;
        $this->data['message'] = $msg;
        $this->data['data'] = $data;
        header('Content-Type: application/json');
        echo json_encode($this->data);
    }

    public function index()
    {
    	return view('Admin.index');
    }
    public function terms()
    {
    	return view('Admin.term');
    }
    public function add_term(Request $request)
    {
    	$Exam_term=new Exam_term();
    	$Exam_term->term_name=$request->term_name;
    	$Exam_term->description=$request->term_des;
    	$Exam_term->current_date=$request->term_date;
    	$res=$Exam_term->save();
    	if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', 'Update SuccessFully', $res);
        }
    }
    public function term_list()
    {
    	/*$class_list=addClass::where('session',$this->currentActiveSession())->where('school_id',Auth::user()->school_id)->get();*/
    	$res=Exam_term::all();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<a term_id='" . $value->id . "' class='pr-2 pointer view-term' data-toggle='modal' data-target='#view-term'><i class='fa fa-eye'></i></a>"
                . "<a term_id='" . $value->id . "' class='pr-2 pointer edit-term' data-toggle='modal' data-target='#edit-term'><i class='fa fa-edit'></i></a>"
                . "<a term_id='" . $value->id . "' class='pointer delete_term' @csrf><i class='fa fa-trash text-danger'></i></a>";
            $i++;
        }
        $this->message('success', '', $res);
    }
    public function get_Term_data(Request $request)
    {
        $res = Exam_term::where('exam_terms.id',$request->id)->get();
        if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', '', $res);
        }
    }
    public function term_update(Request $req)
    {
       $val= Exam_term::find($req->id);
       $val->term_name=$req->term_name;
       $val->description=$req->term_des;
       $val->current_date=$req->term_date;
       $res=$val->save();
       if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', 'Update SuccessFully', $res);
        }
    }
    public function exam_term_delete(Request $request)
    {
        $value=Exam_term::find($request->id);
        $res=$value->delete();
        if (!$res)
        {
            $this->message('error', "Not Deleted" ,$res);
        }
        else
        {
            /*$urlss = $request->get('urls');
            File::delete($urlss);*/
            $this->message('success', "Deleted Successfully", $res);
        }
    }
    public function exam_type()
    {
        $term=Exam_term::all();
    	return view('Admin.exam_type',compact('term'));
    }
    public function exam_type_add(Request $request)
    {
        $Exam_type=new Exam_type();
        $Exam_type->term_id=$request->term_id;
        $Exam_type->type_name=$request->type_name;
        $Exam_type->description=$request->type_des;
        $Exam_type->current_date=$request->type_date;
        $res=$Exam_type->save();
        if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', 'Update SuccessFully', $res);
        }
    }

    public function exam_type_list()
    {
    	$res=Exam_type::with(['exam_term'])->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<a type_id='" . $value->id . "' class='pr-2 pointer view-type' data-toggle='modal' data-target='#view-type'><i class='fa fa-eye'></i></a>"
                . "<a type_id='" . $value->id . "' class='pr-2 pointer edit-type' data-toggle='modal' data-target='#edit-type'><i class='fa fa-edit'></i></a>"
                . "<a type_id='" . $value->id . "' class='pointer delete_type' @csrf><i class='fa fa-trash text-danger'></i></a>";
            $i++;
        }
        $this->message('success', '', $res);

    }
    public function get_type_data(Request $request)
    {
        $res = Exam_type::with(['exam_term'])->where('exam_types.id',$request->id)->get();
        if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', '', $res);
        }
    }
    public function type_update(Request $req)
    {
       $val= Exam_type::find($req->id);
       $val->term_id=$req->term_id;
       $val->type_name=$req->type_name;
       $val->description=$req->type_des;
       $val->current_date=$req->type_date;
       $res=$val->save();
       if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', 'Update SuccessFully', $res);
        }
    }

    public function exam_type_delete(Request $request)
    {
        $value=Exam_type::find($request->id);
        $res=$value->delete();
        if (!$res)
        {
            $this->message('error', "Not Deleted" ,$res);
        }
        else
        {
            /*$urlss = $request->get('urls');
            File::delete($urlss);*/
            $this->message('success', "Deleted Successfully", $res);
        }
    }
    public function exam()
    {
        $type=Exam_type::all();
        return view('Admin.exam',compact('type'));
    }
    public function add_exam(Request $request)
    {
        $exam=new Exam_create();
        $exam->exam_type_id=$request->type_id;
        $exam->exam_name=$request->exam_name;
        $exam->exam_description=$request->exam_des;
        $exam->from_exam=$request->from_exam;
        $exam->to_exam=$request->to_exam;
        $exam->current_date=$request->current_date;
        $res=$exam->save();
        if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', 'Added SuccessFully', $res);
        }
    }
    public function exam_list()
    {
        $res=Exam_create::with(['exam_type'])->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<a exam_id='" . $value->id . "' class='pr-2 pointer view-exam' data-toggle='modal' data-target='#view-exam'><i class='fa fa-eye'></i></a>"
                . "<a exam_id='" . $value->id . "' class='pr-2 pointer edit-exam' data-toggle='modal' data-target='#edit-exam'><i class='fa fa-edit'></i></a>"
                . "<a exam_id='" . $value->id . "' class='pointer delete_exam' @csrf><i class='fa fa-trash text-danger'></i></a>";
            $i++;
        }
        $this->message('success', '', $res);

    }
    public function exam_delete(Request $request)
    {
        $value=Exam_create::find($request->id);
        $res=$value->delete();
        if (!$res)
        {
            $this->message('error', "Not Deleted" ,$res);
        }
        else
        {
            $this->message('success', "Deleted Successfully", $res);
        }

    }
    public function get_exam_data(Request $request)
    {
        $res = Exam_create::with(['exam_type'])->where('exam_creates.id',$request->id)->get();
        if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', '', $res);
        }
    }
    public function exam_update(Request $req)
    {
       $val= Exam_create::find($req->id);
       $val->exam_type_id=$req->type_id;
       $val->exam_name=$req->exam_name;
       $val->exam_description=$req->exam_des;
       $val->from_exam=$req->from_date;
       $val->to_exam=$req->to_date;
       $val->current_date=$req->update_date;
       $res=$val->save();
       if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', 'Update SuccessFully', $res);
        }

    }
    public function project_assessment_type()
    {
        return view('Admin.projectAssessmentType');
    }
    public function add_project_assessment_type(Request $request)
    {
        $project_type=new Exam_project_assessment_type();
        $project_type->type_name=$request->type_name;
        $project_type->description=$request->type_des;
        $project_type->current_date=$request->type_date;
        $res=$project_type->save();
        if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', 'Added SuccessFully', $res);
        }
    }
    public function project_assessment_type_list()
    {
        $res=Exam_project_assessment_type::all();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<a project_type_id='" . $value->id . "' class='pr-2 pointer view-projecttype' data-toggle='modal' data-target='#view-projecttype'><i class='fa fa-eye'></i></a>"
                . "<a project_type_id='" . $value->id . "' class='pr-2 pointer edit-projecttype' data-toggle='modal' data-target='#edit-projecttype'><i class='fa fa-edit'></i></a>"
                . "<a project_type_id='" . $value->id . "' class='pointer delete_project_type' @csrf><i class='fa fa-trash text-danger'></i></a>";
            $i++;
        }
        $this->message('success', '', $res);
    }
    public function get_project_assessment_type(Request $request)
    {
        $res = Exam_project_assessment_type::where('exam_project_assessment_types.id',$request->id)->get();
        if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', '', $res);
        }
    }
    public function project_assessment_type_update(Request $req)
    {
       $val= Exam_project_assessment_type::find($req->id);
       $val->type_name=$req->type_name;
       $val->description=$req->type_des;
       $val->current_date=$req->type_date;
       $res=$val->save();
       if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', 'Update SuccessFully', $res);
        }

    }
    public function project_assessment_type_delete(Request $request)
    {
        $value=Exam_project_assessment_type::find($request->id);
        $res=$value->delete();
        if (!$res)
        {
            $this->message('error', "Not Deleted" ,$res);
        }
        else
        {
            $this->message('success', "Deleted Successfully", $res);
        }
    }
    public function project_assessment()
    {
        $type=Exam_project_assessment_type::all();
        return view('Admin.project_Assessment',compact('type'));
    }
    public function add_project_assessment(Request $request)
    {
        $project=new Exam_project_assessment();
        $project->assessment_types_id=$request->type_id;
        $project->project_name=$request->project_name;
        $project->project_description=$request->project_des;
        $project->from_project=$request->from_project;
        $project->to_project=$request->to_project;
        $project->current_date=$request->project_date;
        $res=$project->save();
        if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', 'Added SuccessFully', $res);
        }
    }
    public function project_assessment_list()
    {
        $res=Exam_project_assessment::with(['project_assessment_type'])->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<a assessment_id='" . $value->id . "' class='pr-2 pointer view-assessment' data-toggle='modal' data-target='#view-assessment'><i class='fa fa-eye'></i></a>"
                . "<a assessment_id='" . $value->id . "' class='pr-2 pointer edit-assessment' data-toggle='modal' data-target='#edit-assessment'><i class='fa fa-edit'></i></a>"
                . "<a assessment_id='" . $value->id . "' class='pointer delete_assessment' @csrf><i class='fa fa-trash text-danger'></i></a>";
            $i++;
        }
        $this->message('success', '', $res);
    }
    public function get_project_assessment(Request $request)
    {
        $res = Exam_project_assessment::with(['project_assessment_type'])->where('exam_project_assessments.id',$request->id)->get();
        if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', '', $res);
        }
    }
    public function project_assessment_update(Request $req)
    {
       $val= Exam_project_assessment::find($req->id);
       $val->assessment_types_id=$req->type_id;
       $val->project_name=$req->project_name;
       $val->project_description=$req->project_des;
       $val->from_project=$req->from_project;
       $val->to_project=$req->to_project;
       $val->current_date=$req->project_date;
       $res=$val->save();
       if (!$res) {
            $this->message('error', '', $res);
        } else {
            $this->message('success', 'Update SuccessFully', $res);
        }

    }
    public function project_assessment_delete(Request $request)
    {
        $value=Exam_project_assessment::find($request->id);
        $res=$value->delete();
        if (!$res)
        {
            $this->message('error', "Not Deleted" ,$res);
        }
        else
        {
            $this->message('success', "Deleted Successfully", $res);
        }

    }

}
