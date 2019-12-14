@extends('Admin.layouts.index')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Examination Terms
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examination</a></li>
        <li class="active">Terms</li>
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
              <h3 class="box-title">Add Term</h3>
            </div>
            <form id="exam_term" action="{{route('add_term')}}" method="post" class="smooth-submit">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Term Name :</label>
                  <input type="term" class="form-control" name="term_name" placeholder="Enter term name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description :</label>
                  <textarea class="form-control" rows="3" name="term_des" placeholder="Enter Description..."></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Creation Date :</label>
                  <input type="date" name="term_date" class="form-control">
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
              <h3 class="box-title">Term List</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover terms_list">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Term Name</th>
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
  <div class="modal fade" id="edit-term">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Term Update</h4>
              </div>
            <form id="update_term" action="{{route('term_update')}}" method="post" class="smooth-submit">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Term Name :</label>
                  <input type="hidden" id="term_id" name="id">
                  <input type="term" id="term_name" class="form-control" name="term_name" placeholder="Enter term name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description :</label>
                  <textarea class="form-control" rows="3" name="term_des" id="term_des" placeholder="Enter Description..."></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Creation Date :</label>
                  <input type="date" name="term_date" id="term_date" class="form-control">
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
   <div class="modal fade" id="view-term">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Term Detail</h4>
              </div>
              <div class="modal-body">
                <table class="table table-striped bordergray col-lg-12">       
                    <tbody>
                        <tr class="row m-0 p-0">
                            <th class="col-lg-3">Term Name:</th>
                            <td class="col-lg-3" id="term_names"></td>
                            <th class="col-lg-3">Creation Date:</th>
                            <td class="col-lg-3" id="term_dates"></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped bordergray col-lg-12">    
                    <tbody>
                        <tr class="row m-0 p-0">
                            <th class="col-lg-3">Description:</th> 
                            <td class="col-lg-9" id="term_dess"></td>
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