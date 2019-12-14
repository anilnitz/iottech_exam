<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam_term;
use App\Exam_type;

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

}
