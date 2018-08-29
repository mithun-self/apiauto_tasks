@extends('layouts.app')

@section('content')
<style type="text/css">
td {
    border: none !important;
}
table.dataTable thead .sorting:after{
  display: none !important;
}
</style>
         <div class="container col-sm-9 offset-sm-3 col-md-10 offset-md-2">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          <div class="row">
              <!-- <button type="button" class="btn btn-success"><a href="/create_fees">Add Fees</a></button> -->
              <div class="col-md-6 col-sm-6 col-xs-6 col-6">
                  <h4 class="antitle" style="font-family: 'Montserrat', sans-serif;font-weight: 600;">Fees Details</h4>
              </div>

              <div class="col-md-6 text-right">
                <ul>
                  <li class="list-inline-item"><a href="/create_fees" class="expanc"><i class="fa fa-plus">&nbsp;</i>New</a></li>
<!--                   <li class="list-inline-item"><a href="#" class="expanc"><img src="http://127.0.0.1:8000/assets/images/export.png" alt="" class="img-fluid expimg">Export</a></li> -->
                </ul>
              </div>
          </div>
            <table class="table" id="example">
               <thead style="background-color: #d7dce2;">
                  <tr>
                     <th>Name</th>
                     <th>Type</th>
                     <th>Value</th>
                     <th>Actions</th>
                  </tr>
               </thead>
            </table>
         </div>
       <script>
         $(function() {
               $('#example').DataTable({
               processing: true,
               serverSide: true,
              "order": [],
                "columnDefs": [ {
                  "targets"  : 'no-sort',
                  "orderable": false,
                }],
               ajax: '{{ url('getfeestotable') }}',
               columns: [
                        { data: 'name', name: 'name' },
                        { data: 'type', name: 'type' },
                        { data: 'value', name: 'value' },
                        { data: 'edit', "mRender": function(data, type, row) {
                              return '<a style="margin-left: 39px;"class="btn btn-info btn-sm" href=feesedit/'+row.id+'>' + 'Edit' + '</a>'+
                              '<a style="margin-left: 39px;" class="btn btn-info btn-sm" href=feesdelete/'+row.id+'>' + 'Delete' + '</a>';
                              }
                        }
                     ]  
            });
         });
         </script>
@stop