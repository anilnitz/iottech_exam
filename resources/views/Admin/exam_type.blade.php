@extends('Admin.layouts.index')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Examination Type
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examination</a></li>
        <li class="active">Type</li>
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
              <h3 class="box-title">Add Exam Type</h3>
            </div>
            <form id="exam_type" action="{{route('exam_type_add')}}" method="post" class="smooth-submit">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Term :</label>
                  <select class="form-control" name="term_id" required="true">
                    <option value="">Select Terms</option>
                    @foreach($term as $val)
                    <option value="{{$val->id}}">{{$val->term_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Type Name :</label>
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
              <h3 class="box-title">Exam Type List</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover exam_type_list">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Term Name</th>
                  <th>Exam Type</th>
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
  <div class="modal fade" id="edit-type">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Type Update</h4>
              </div>
            <form id="update_type" action="{{route('type_update')}}" method="post" class="smooth-submit">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Term Name :</label>
                  <input type="hidden" id="type_id" name="id">
                  <select class="form-control" id="type_terms" name="term_id" required="true">
                    <option value="">Select Terms</option>
                    @foreach($term as $val)
                    <option value="{{$val->id}}">{{$val->term_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Exam Type Name :</label>
                  <input type="text" id="type_names" class="form-control" name="type_name" placeholder="Enter type name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description :</label>
                  <textarea class="form-control" rows="3" name="type_des" id="type_dess" placeholder="Enter Description..."></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Creation Date :</label>
                  <input type="date" name="type_date" id="type_dates" class="form-control">
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
   <div class="modal fade" id="view-type">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Type Detail</h4>
              </div>
              <div class="modal-body">
                <table class="table table-striped bordergray col-lg-12">       
                    <tbody>
                        <tr class="row m-0 p-0">
                            <th class="col-lg-3">Term Name:</th>
                            <td class="col-lg-3" id="type_term"></td>
                            <th class="col-lg-3">Type Name:</th>
                            <td class="col-lg-3" id="type_name"></td>
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
                            <th class="col-lg-3">Description:</th> 
                            <td class="col-lg-9" id="type_des"></td>
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