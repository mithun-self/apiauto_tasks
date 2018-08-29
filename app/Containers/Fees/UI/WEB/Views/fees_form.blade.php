@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <style type="text/css">

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

<div class="container col-sm-9 offset-sm-3 col-md-10 offset-md-2 fees_form">

  <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-6 col-6">
       <h4 class="antitle" style="font-family: 'Montserrat', sans-serif;font-weight: 600;">Add Fees</h4>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6 col-6">
       <button type="button" id="back" class="btn btn-default">Back</button>
      </div>
  </div>
  <div class="row">
    <div class="col-sm-9 col-md-5">
      <form action="/savefees" method="post">
      {{ csrf_field() }}
    
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
      </div>
      <div class="form-group">
        <label for="type">Type:</label>
        <select name="type" required class="form-control" style="height: 34px;">
          <option disabled selected value>Select Type</option>
          <option value="Percentage">Percentage</option>
          <option value="Fixed">Fixed</option>
        </select>
      </div>
      <div class="form-group">
        <label for="value">Value:</label>
        <input type="number" class="form-control" id="value" placeholder="Enter value" name="value" step=".01" required>
      </div>

      <button type="submit" class="btn btn-default">Save</button>
    </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('button#back').on('click', function(e){
    e.preventDefault();
    window.history.back();
});
</script>

</body>
</html>
@stop