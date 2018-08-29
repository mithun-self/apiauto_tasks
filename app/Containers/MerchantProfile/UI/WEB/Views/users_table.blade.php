@extends('layouts.app')

@section('content')
<style type="text/css">
td {
    border: none !important;
}
table.dataTable thead .sorting:after{
  display: none !important;
}
#example tr th {
      padding: 14px !important;
}
#example tr th {
    padding: 14px !important;
    font-size: 10px !important;
    font-family: Montserrat, sans-serif !important;
    font-weight: 800 !important;
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
                  <h4 class="antitle" style="font-family: 'Montserrat', sans-serif;font-weight: 600;">Users</h4>
              </div>

              <div class="col-md-6 text-right">
                <ul>
                  <li class="list-inline-item"><a href="/create_fees" class="expanc"><i class="fa fa-plus">&nbsp;</i>New</a></li>
<!--                   <li class="list-inline-item"><a href="#" class="expanc"><img src="http://127.0.0.1:8000/assets/images/export.png" alt="" class="img-fluid expimg">Export</a></li> -->
                </ul>
              </div>
          </div>
            <table class="table" style="width: 100%;" id="example">
               <thead style="background-color: #d7dce2; border-radius: 55px;">
                  <tr>
                     <th>USER</th>
                     <th>ROLES</th>
                     <th>CREATED AT</th>
                     <th>VIEW DETAILS</th>
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
               ajax: '{{ url('getuserslist') }}',
               columns: [
                        { data: 'name', name: 'name' },
                        { data: 'type', name: 'type' },
                        { data: 'value', name: 'value' },
                       
                     ]  
            });
         });
         </script>
@stop