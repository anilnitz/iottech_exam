@extends('Admin.layouts.index')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Examination
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examination</a></li>
        <li class="active">Create</li>
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
              <h3 class="box-title">Add Exam</h3>
            </div>
            <form id="exam_add" action="{{route('add_exam')}}" method="post" class="smooth-submit">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Type:</label>
                  <select class="form-control" name="type_id" required="true">
                    <option value="">Select Type </option>
                    @foreach($type as $val)
                    <option value="{{$val->id}}">{{$val->type_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Exam Name :</label>
                  <input type="text" class="form-control" name="exam_name" placeholder="Enter exam name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description of Exam :</label>
                  <textarea class="form-control" rows="3" name="exam_des" placeholder="Enter Description..."></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">From Date :</label>
                  <input type="date" name="from_exam" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">To Date :</label>
                  <input type="date" name="to_exam" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Creation Date :</label>
                  <input type="date" name="current_date" class="form-control">
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
              <h3 class="box-title">Exam List</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover exam_list">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Term Name</th>
                  <th>Exam Type</th>
                  <th>Exam Name</th>
                  <th>From Exam</th>
                  <th>To Exam</th>
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
  <div class="modal fade" id="edit-exam">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Exam Update</h4>
              </div>
            <form id="update_exam" action="{{route('exam_update')}}" method="post" class="smooth-submit">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Type Name :</label>
                  <input type="hidden" id="exam_id" name="id">
                  <select class="form-control" id="exam_typesss" name="type_id" required="true">
                    <option value="">Select Type</option>
                    @foreach($type as $val)
                    <option value="{{$val->id}}">{{$val->type_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Exam Name :</label>
                  <input type="text" id="exam_names" class="form-control" name="exam_name" placeholder="Enter type name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description of Exam :</label>
                  <textarea class="form-control" rows="3" name="exam_des" id="exam_dess" placeholder="Enter Description..."></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">From Date :</label>
                  <input type="date" name="from_date" id="exam_froms" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">To Date :</label>
                  <input type="date" name="to_date" id="exam_tos" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Updation Date :</label>
                  <input type="date" name="update_date" id="exam_currents" class="form-control">
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
   <div class="modal fade" id="view-exam">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Exam Detail :</h4>
              </div>
              <div class="modal-body">
                <table class="table table-striped bordergray col-lg-12">       
                    <tbody>
                        <tr class="row m-0 p-0">
                            <th class="col-lg-3">Type Name:</th>
                            <td class="col-lg-3" id="exam_typess"></td>
                            <th class="col-lg-3">Exam Name:</th>
                            <td class="col-lg-3" id="exam_name"></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped bordergray col-lg-12">       
                    <tbody>
                        <tr class="row m-0 p-0">
                            <th class="col-lg-3">From Date:</th>
                            <td class="col-lg-3" id="exam_from"></td>
                            <th class="col-lg-3">To Date:</th>
                            <td class="col-lg-3" id="exam_to"></td>
                        </tr>
                    </tbody>
                </table>
                <!-- <table class="table table-striped bordergray col-lg-12">       
                    <tbody>
                        <tr class="row m-0 p-0">
                            <th class="col-lg-3">Creation Date:</th>
                            <td class="col-lg-3" id="term_name"></td>
                            <th class="col-lg-3">Type Name:</th>
                            <td class="col-lg-3" id="type_name"></td>
                        </tr>
                    </tbody>
                </table> -->
                <table class="table table-striped bordergray col-lg-12">    
                    <tbody>
                        <tr class="row m-0 p-0">
                            <th class="col-lg-3">Description of Exam:</th> 
                            <td class="col-lg-9" id="exam_des"></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped bordergray col-lg-12">    
                    <tbody>
                        <tr class="row m-0 p-0">
                            <th class="col-lg-3">Creation Date:</th> 
                            <td class="col-lg-9" id="exam_current"></td>
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