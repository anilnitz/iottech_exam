@extends('Admin.layouts.index')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Examination Project
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Project Assessment</a></li>
        <li class="active">Add</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Project Assessment</h3>
            </div>
            <form id="assessment_add" action="{{route('add_project_assessment')}}" method="post" class="smooth-submit">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Project Assessment Type:</label>
                  <select class="form-control" name="type_id" required="true">
                    <option value="">Select Project Assessment Type</option>
                    @foreach($type as $val)
                    <option value="{{$val->id}}">{{$val->type_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Project Assessment Name :</label>
                  <input type="term" class="form-control" name="project_name" placeholder="Enter term name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description of Project Assessment :</label>
                  <textarea class="form-control" rows="3" name="project_des" placeholder="Enter Description..."></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">From Date :</label>
                  <input type="date" name="from_project" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">To Date :</label>
                  <input type="date" name="to_project" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Creation Date :</label>
                  <input type="date" name="project_date" class="form-control">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                <!-- <button type="submit" class="btn btn-danger">Cancel</button> -->
              </div>
            </form>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Project Assessment List</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover exam_project">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Assessment Type</th>
                  <th>Assessment Name</th>
                  <th>Creation Date</th>
                  <th>Action</th>
                </tr>
                </thead>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="edit-assessment">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Project Assessment Update</h4>
              </div>
            <form id="update_projects" action="{{route('project_assessment_update')}}" method="post" class="smooth-submit">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Assessment Type :</label>
                  <input type="hidden" id="prject_id" name="id">
                  <select class="form-control" id="project_typesss_id" name="type_id" required="true">
                    <option value="">Select Terms</option>
                    @foreach($type as $val)
                    <option value="{{$val->id}}">{{$val->type_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Assessment Project Name :</label>
                  <input type="text" id="project_names" class="form-control" name="project_name" placeholder="Enter type name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Assessment Description :</label>
                  <textarea class="form-control" rows="3" name="project_des" id="project_descs" placeholder="Enter Description..."></textarea>
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">From Date :</label>
                  <input type="date" name="from_project" class="form-control" id="project_froms">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">To Date :</label>
                  <input type="date" name="to_project" class="form-control" id="project_tos">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Creation Date :</label>
                  <input type="date" name="project_date" id="project_dates" class="form-control">
                </div>
              </div>
              <!-- <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div> -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" value="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
  </div>
   <div class="modal fade" id="view-assessment">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Project Assessment Detail</h4>
              </div>
              <div class="modal-body">
                <table class="table table-striped bordergray col-lg-12">       
                    <tbody>
                        <tr class="row m-0 p-0">
                            <th class="col-lg-3">Assessment Type:</th>
                            <td class="col-lg-3" id="project_assessment_type"></td>
                            <th class="col-lg-3">Assessment Project Name:</th>
                            <td class="col-lg-3" id="project_name"></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped bordergray col-lg-12">       
                    <tbody>
                        <tr class="row m-0 p-0">
                            <th class="col-lg-3">From Date:</th>
                            <td class="col-lg-3" id="project_from"></td>
                            <th class="col-lg-3">To Date:</th>
                            <td class="col-lg-3" id="project_to"></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped bordergray col-lg-12">    
                    <tbody>
                        <tr class="row m-0 p-0">
                            <th class="col-lg-3">Description:</th> 
                            <td class="col-lg-9" id="project_desc"></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped bordergray col-lg-12">       
                    <tbody>
                        <tr class="row m-0 p-0">
                            <th class="col-lg-6">Creation Date:</th>
                            <td class="col-lg-6" id="project_date"></td>
                        </tr>
                    </tbody>
                </table>
              </div>
              <div class="modal-footer">
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
 </div>
  @endsection