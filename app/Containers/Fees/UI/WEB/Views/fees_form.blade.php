@extends('layouts.app')
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
  <h2>Add Fees</h2>
  <form action="/savefees" method="post">
    {{ csrf_field() }}
  
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
    </div>
    <div class="form-group">
      <label for="type">Type:</label>
      <select name="type" required class="form-control">
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

</body>
</html>
