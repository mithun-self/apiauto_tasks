@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container custom_class">
    <div id="msg"></div>
  <div class="row">
<?php $i = 0; ?>
@foreach ($merchants as $merchant) 
<!--<p><a href="specific_merchant/{{$merchant['id']}}">{{$merchant['merchant_name']}}</a></p>-->
<input class="parent_check" type="checkbox" value="">
<p class="parent<?php echo $i; ?>">{{$merchant['merchant_name']}}<button value="{{$merchant['id']}}" class="reserve-button" type="button"><i class="fas fa-plus"></i></button></a></p></input>
<?php $i++; ?>
@endforeach
<div class="fees">
    <label for="type">Select Fees:</label>
    <select name="fees_select" id="fees_select">
        <option value='0' disabled selected="selected">Select Fees</option>
            <?php
            foreach($fees as $fee) { ?>
                <option value="<?= $fee->id ?>"><?= $fee->value ?></option>
            <?php
            } ?>
    </select> 
</div>
<div class="submit_button">
<button id="on_submit_save" type="button" class="btn btn-info">Submit</button>
</div>

<style type="text/css">
    
    .custom_class .row p {
    float: left;
    width: 100%;
}
.container.custom_class {
    top: 110px;
    left: 171px;
}
.reserve-button {
    font-size: 11px;
    border-radius: 50%;
}

</style>
<script type="text/javascript">

    $('.reserve-button').click(function(){
        if(!$(this).parent().hasClass('Data_Present')) {
            var merchantid = $(this).val();
            var parent_class = $(this).parent().prop('className');
            $.ajax
            ({ 
                url: 'specific_merchant/' + merchantid,
                //data: {"merchantid": merchantid},
                type: 'get',
                success: function(results)
                {
                    $.each(results, function (index, value) {
                    $( "<input class='check_child' type='checkbox' value="+value.id+"></input><p class='merchant_accounts' style='display:none'>"+value.first_name+"</p>" ).appendTo( '.'+parent_class );
                        //console.log(value.email);
                    });
                    $('.'+parent_class).children().children().removeClass().addClass('fa fa-minus');
                    $(".merchant_accounts").slideDown("slow");
                    //console.log(result);
                }
            });
            $(this).parent().addClass('Data_Present');
        }else{
            $(this).children().removeClass().addClass('fa fa-plus');
            $(this).parent().removeClass('Data_Present'); 
            $(this).parent().children(".merchant_accounts, .check_child").slideUp("slow", function() { $(this).remove();});
            //alert($(this).parent().children(".merchant_accounts").length); 
        }
        
    });

    $('.parent_check').click(function(){
        if($(this). prop("checked") == true){
            $(this).next().children(".check_child").prop('checked', true);
        }else{
            $(this).next().children(".check_child").prop('checked', false);
        }

    });

    $('body').on('click', '.check_child', function() {
        if($(this). prop("checked") == false){
            $('.parent_check').prop('checked', false);
        }
    });

   $('#on_submit_save').click(function(){
    var accounts_list = [];
    $.each($(".check_child:checked"), function(){            
                accounts_list.push($(this).val());
    });
    var selected_fees = $("#fees_select option:selected").val();

    if(accounts_list == '' && selected_fees == '0'){
        $('#msg').html("Please select some values").fadeIn('slow');
        return false;
    }
        $.ajax
        ({ 
                    url: 'saveaccountfees',
                    data: {"accounts": accounts_list,"fee":selected_fees,"_token": "{{ csrf_token() }}"},
                    type: 'POST',
                    success: function(results)
                    { 
                        
                        $('#msg').html("data insert successfully").fadeIn('slow');
                        location.reload(2000);
                    }
                    ,error: function(XMLHttpRequest, textStatus, errorThrown) {
                        
                         $('#msg').html("Something happend,Please try again after sometime").fadeIn('slow');
                         location.reload(2000);
                         
                    }
        });

   }); 


</script> 
</div>
</div>

    {{--<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>id</th>
                <th>merchant_name</th>
                <th>merchant_code</th>
                <th>created_at</th>
                <th>updated_at</th>
            </tr>
        </thead>
    </table>--}}

  
@stop

@push('scripts')
<!-- jQuery -->

@endpush