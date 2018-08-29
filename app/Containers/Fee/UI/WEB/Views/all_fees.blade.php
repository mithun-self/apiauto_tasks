@extends('layouts.app')

    @section('content')
    <style>
    table.table {
      font-size: 11px;
      font-weight: 600;
      background-color: #F8F8F8;
      border: 1px solid #CBD2D9;
      border-radius: 5px;
      border-collapse: inherit;
      border-spacing: 0;
      width: 90%;
      margin-left: 5%;
      font-family: Montserrat, sans-serif;
    }
    .table thead {
      padding: 8px 0;
      margin-bottom: 10px;
      color: #000;
      background-color: #D7DCE2;
      border-top-left-radius: 9px;
      border-top-right-radius: 9px;
      border: none;
    }
    .pagination {
      padding-left: 0;
      margin: 0px;
      background-color: #D7DCE2;
  }
  .left_table {
    margin-left: 40px;
  }
  .right_table {
    margin-left: 9%;
}
button {
    border: none;
}
.modal-body {
    text-align: left;
}

    </style>

        <div class="container col-sm-9 offset-sm-3 col-md-10 offset-md-2">
          
          @if(Session::has('success_msg'))
            <div class="alert alert-dismissable alert-sucess">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                {{Session::get('success_msg')}}
            </div>
         @endif
         <h3 id="ajaxResponse"></h3>
          <div class="row">
          <!-- modal form to create-->
            <div id="GSCCModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Create Fee</h4>
                      </div>
                      <div class="modal-body">

                          <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required="">
                          </div>
                          <div class="form-group">
                            <label for="type">Type:</label>
                          <select name="type" id="fee_type" required="" class="form-control" style="height: 34px;">
                              <option disabled="" selected="" value="">Select Type</option>
                              <option value="Percentage">Percentage</option>
                              <option value="Fixed">Fixed</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="value">Value:</label>
                            <input type="number" class="form-control" id="value" placeholder="Enter value" name="value" step=".01" required="">
                          </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="on_submit_save" type="button" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
            </div>
            <!-- modal form to create ends -->
            <!-- edit modal starts -->
            <div id="Edit_Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Fee</h4>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" class="form-control" id="edit_row" value="" name="edit_row">

                          <div class="form-group">
                            <label for="edit_name">Name:</label>
                            <input type="text" class="form-control" id="edit_name" placeholder="Enter Name" name="edit_name" required="">
                          </div>
                          <div class="form-group">
                            <label for="edit_type">Type:</label>
                          <select name="edit_type" id="edit_type" required="" class="form-control" style="height: 34px;">
                              <option disabled="" selected="" value="">Select Type</option>
                              <option value="Percentage">Percentage</option>
                              <option value="Fixed">Fixed</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="edit_value">Value:</label>
                            <input type="number" class="form-control" id="edit_value" placeholder="Enter value" name="edit_value" step=".01" required="">
                          </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="on_edit_save" type="button" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
            </div>
            <!-- edit modal ends -->

            <!-- Delete Modal -->
            <div class="modal fade" id="delete_modal" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Delete Fee</h4>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" class="form-control" id="delete_row" value="" name="delete_row">
                    <p>Are You Sure</p>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button id="on_delete" type="button" class="btn btn-primary">Delete</button>
                    </div>
                </div>
                
              </div>
            </div>
            <!-- Delete Modal Ends -->

            <div class="col-md-5 col-sm-5 col-xs-5 col-5 left_table">
                  <h4 class="antitle" style="font-family: 'Montserrat', sans-serif;font-weight: 600;">Fees Details</h4>
            </div>   

            <div class="col-md-5 text-right right_table">
                  <h1 class="list-inline-item" data-toggle="modal" data-target="#GSCCModal"><a href="#" class="expanc"><i class="fa fa-plus">&nbsp;</i>New</a></h1>
<!--                   <li class="list-inline-item"><a href="#" class="expanc"><img src="http://127.0.0.1:8000/assets/images/export.png" alt="" class="img-fluid expimg">Export</a></li> -->
            </div>

            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Created At</th>
                  <th>Value</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($fees as $fee)
                  <tr>
                    <td>{{$fee->name}}</td>
                    <td>{{$fee->type}}</td>
                    <td>{{$fee->value}}</td>
                    <td>{{$fee->created_at}}</td>
                    <td><button data-toggle="modal" data-target="#Edit_Modal" id="fee_edit" type="button" value="{{$fee->id}}">Edit</button></td>
                    <td><button data-toggle="modal" data-target="#delete_modal" id="fee_delete" type="button" value="{{$fee->id}}">Delete</button></td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                 
  
                   <td colspan="6" style="background-color: #D7DCE2;">
                        <ul class="pagination" style="float: right;">
                          <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                          <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                        </ul>
                   </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
<script type="text/javascript">
  $(document).ready(function(){
      $('#on_submit_save').click(function(){
        var fee_name   = $('#name').val();
        var fee_type   = $("#fee_type option:selected").val();
        var fee_value  = $("#value").val();

                $.ajax
                    ({ 
                        url: '/fee/store',
                        data: {"fee_name": fee_name,"fee_type":fee_type,"fee_value":fee_value,"_token": "{{ csrf_token() }}"},
                        type: 'POST',
                        success: function(results)
                        {
                            location.reload();
                            var msg = "Created Successfully!"
                            //$("#ajaxResponse").append(msg).delay(2000);
                            
                        }
                    });
      }); 

      $(document).on('click', '#fee_edit', function(){ 
        var fee_row_id   = $(this).val();
                $.ajax
                    ({ 
                        url: 'fee/'+ fee_row_id,
                        data: {"id": fee_row_id},
                        type: 'GET',
                        success: function(results)
                        {
                            $('#edit_name').val(results.name);
                            $('#edit_type').val(results.type);
                            $('#edit_value').val(results.value);
                            $('#edit_row').val(results.id);
                        }
                    });
      });

      $(document).on('click', '#on_edit_save', function(){ 
        var edit_name   = $('#edit_name').val();
        var edit_type   = $("#edit_type option:selected").val();
        var edit_value  = $("#edit_value").val();
        var row_value  = $("#edit_row").val();
        

                $.ajax
                    ({ 
                        url: '/fee/'+row_value,
                        data: {"fee_name": edit_name,"fee_type":edit_type,"fee_value":edit_value,"_token": "{{ csrf_token() }}",'id': row_value},
                        type: 'PATCH',
                        success: function(results)
                        {
                            location.reload();
                            
                        }
                    });
      });   
      $(document).on('click', '#fee_delete', function(){
        $('#delete_row').val($(this).val());
      });

      $(document).on('click', '#on_delete', function(){ 
        var row_value  = $('#delete_row').val();
                $.ajax
                    ({ 
                        url: '/fee/'+row_value,
                        data: {"_token": "{{ csrf_token() }}",'id': row_value,"_method": 'delete',},
                        type: 'DELETE',
                        success: function(results)
                        {
                            location.reload();
                            
                        }
                    });
      });  
           
  });
</script>


    @stop

