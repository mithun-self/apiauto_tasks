@extends('layouts.app')

<style type="text/css">
    
    .custom_class .row p {
    float: left;
    width: 100%;
}
.container.custom_class {
    top: 110px;
    left: 171px;
}

</style>
@section('content')

<div class="container custom_class">
  <div class="row">
<?php //var_dump($merchant_details); ?>
<?php echo "<table border='1' style='border-collapse: 
    collapse;border-color: silver;'>";  
    echo "<tr style='font-weight: bold;'>";  
    echo "<td width='150' align='center'>Email</td>";  
    echo "<td width='150' align='center'>First Name</td>";
    echo "<td width='150' align='center'>Last Name</td>";
    echo "</tr>";

    foreach ($merchant_details as $merchant_detail) 
     { 
      echo '<td width="150" align=center>' . $merchant_detail['email'] .'</td>';
      echo '<td width="150" align=center>' . $merchant_detail['first_name'] .'</td>';
      echo '<td width="150" align=center>' . $merchant_detail['last_name'] .'</td>';
      echo '</tr>';
     } ?>
</div>
</div>


  
@stop

@push('scripts')
<!-- jQuery -->

<script type="text/javascript">
      jQuery(document).ready(function() { 
alert('test');
});
</script>
@endpush
