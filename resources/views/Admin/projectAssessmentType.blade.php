@extends('Admin.layouts.index')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Project Assessment Type
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Exam</a></li>
        <li class="active">Project Assessment Type</li>
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
              <h3 class="box-title">Add Project Assessment Type</h3>
            </div>
            <form id="exam_assessment_type" action="{{route('add_project_assessment_type')}}" method="post" class="smooth-submit">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Project Assessment Type Name :</label>
                  <input type="term" class="form-control" name="type_name" placeholder="Enter term name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description :</label>
                  <textarea class="form-control" rows="3" name="type_des" placeholder="Enter Description..."></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Creation Date :</label>
                  <input type="date" name="type_date" class="form-control">
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
              <h3 class="box-title">Project Assessment Type List</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover exam_project_type">
                <thead>
                <tr>
                  <th>Sr. No.</th>
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
  <div class="modal fade" id="edit-projecttype">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Project Assessment Type Update</h4>
              </div>
            <form id="update_assessment_type" action="{{route('project_assessment_type_update')}}" method="post" class="smooth-submit">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Project Assessment type Name :</label>
                  <input type="hidden" id="exam_prjecttype_id" name="id">
                  <input type="term" id="exam_project_typesss" class="form-control" name="type_name" placeholder="Enter term name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description :</label>
                  <textarea class="form-control" rows="3" name="type_des" id="exam_project_dess" placeholder="Enter Description..."></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Creation Date :</label>
                  <input type="date" name="type_date" id="exam_project_datess" class="form-control">
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
   <div class="modal fade" id="view-projecttype">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Project Assessment Type Detail</h4>
              </div>
              <div class="modal-body">
                <table class="table table-striped bordergray col-lg-12">       
                    <tbody>
                        <tr class="row m-0 p-0">
                            <th class="col-lg-3">Project Assessment Type Name:</th>
                            <td class="col-lg-3" id="exam_project_typess"></td>
                            <th class="col-lg-3">Creation Date:</th>
                            <td class="col-lg-3" id="exam_project_dates"></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped bordergray col-lg-12">    
                    <tbody>
                        <tr class="row m-0 p-0">
                            <th class="col-lg-3">Description:</th> 
                            <td class="col-lg-9" id="exam_project_des"></td>
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