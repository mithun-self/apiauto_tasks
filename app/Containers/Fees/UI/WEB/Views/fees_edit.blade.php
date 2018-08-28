@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <style type="text/css">
    .fees_form {
    width: 50% !important;
    margin-top: 74px !important;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
  </style>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>


<div class="container fees_form">
  <h2>Update Fees</h2>
  <form action="/updatefees" method="post">
    {{ csrf_field() }}
  @foreach($fees_details as $fees_detail)
  <input type="hidden" id="fee_id" name="fee_id" value="{{$fees_detail->id}}"/>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" 
      value="{{$fees_detail->name}}" required>
    </div>
    <div class="form-group">
      <label for="type">Type:</label>
      <select id="fee_type" name="type" required class="form-control">
        <option disabled value>Select Type</option>
        <option value="Percentage">Percentage</option>
        <option value="Fixed">Fixed</option>
      </select>
    </div>
    <div class="form-group">
      <label for="value">Value:</label>
      <input type="number" value="{{$fees_detail->value}}" class="form-control" id="value" placeholder="Enter value" name="value" step=".01" required>
    </div>
  @endforeach
    <button type="submit" class="btn btn-default">Update</button>
  </form>
</div>

<script>
$(document).ready(function(){
  var selectec_option = {!! json_encode($fees_detail->type) !!};
$("#fee_type option:selected").text(selectec_option);

});

</script>
</body>
</html>
@stop
