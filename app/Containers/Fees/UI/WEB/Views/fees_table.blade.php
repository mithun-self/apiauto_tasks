@extends('layouts.app')

@section('content')
<style type="text/css">
.fees_table {
    width: 63% !important;
    top: 74px !important;
}
</style>
         <div class="container fees_table">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          <button type="button" class="btn btn-success"><a href="/create_fees">Add Fees</a></button>
               <h2>Fees Details</h2>
            <table class="table table-bordered" id="table">
               <thead>
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
               $('#table').DataTable({
               processing: true,
               serverSide: true,
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