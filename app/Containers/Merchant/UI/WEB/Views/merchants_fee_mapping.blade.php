@extends('layouts.app')

@section('content')
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
div#un_selected_fees {
    width: 250px;
    height: 300px;
    background: #eee;
    text-align: center; 
}
div#selected_fees {
    width: 250px;
    height: 300px;
    background: #eee;
    text-align: center; 
}
.accounts {
    width: 30%;
    margin-left: 15px;
}
.merchants {
    width: 30%;
}
.submit_button {
    padding: 31px;
}





/* The container */
.container {
    display: block;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    height: 25px;
    width: 25px;
    background-color: #eee;
    top: 6px;
    left: 109px;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}

.custom_font_awesome {
    width: 33%;
    float: left;
    text-align: center;
}

div#myDiv {
    position: absolute;
    z-index: 999;
    opacity: 0.5;
    width: 100%;
}
img#loading-image {
    width: 15%;
    margin: 0 auto;
    text-align: center;
    margin-left: 27%;
    margin-top: 12%;
}

.form-group.merchants {
    font-weight: 600;
    font-family: 'Montserrat', sans-serif;
    font-size: 16px;
}
.form-group.accounts {
    font-weight: 600;
    font-family: 'Montserrat', sans-serif;
    font-size: 16px;
}
#selected_fees p {
    font-weight: 600;
    font-family: 'Montserrat', sans-serif;
    font-size: 16px;
    margin-top: 20px;   
}
#un_selected_fees p {
    font-weight: 600;
    font-family: 'Montserrat', sans-serif;
    font-size: 16px;  
    margin-top: 20px;
}
.next {
    background-color: #eee;
    color: white;
}
.checkbox {
    clear: both;
}




</style>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container custom_class">
    <div class="row">

        <div id="myDiv">
            <img id="loading-image" src="/images/loader.gif" style='display: none;'/>
        </div>

        <div class="col-md-4 form-group merchants">
            <label for="type">Select Merchants:</label>
            <select name="merchant_select" id="merchant_select" class="form-control">
                <option value='-1' disabled selected="selected">Select Merchant</option>
                <option value='0'>All</option>
                    @foreach ($merchants as $merchant)
                        <option value="<?= $merchant->id ?>"><?= $merchant->merchant_name ?></option>
                    @endforeach
            </select> 
        </div>

        <div class="col-md-4 form-group accounts">
            <label for="type">Select Accounts:</label>
            <select name="accounts_select" id="accounts_select" class="form-control">
                <option value='-1' disabled selected="selected">Select Accounts</option>
                <option value='0'>All</option>
            </select> 
        </div>


        <div class="col-md-2 submit_button">
        <button id="on_submit_save" type="button" class="btn btn-info disable">Show</button>
        </div>

    </div><!-- first row ends -->

    <div class="row">
        <!--<div class="to_show_all_fees">-->
        <div class="col-md-4" id="selected_fees">
        <p>Applied Fee</p>

        </div>
        <div class="col-md-2" class="custom_font_awesome">
        <button id="left_move" class="next form-control" style="width:33%;margin: 0 auto;position: absolute; top: 38%; left: 37%;"><i class="fa fa-angle-double-left" style="font-size:15px;color:black"></i></button>
        <button id="right_move" class="next form-control" style="width:33%;margin: 0 auto;position: absolute; top: 54%; left: 37%;"><i class="fa fa-angle-double-right" style="font-size:15px;color:black"></i></button>
        </div>
        <div class="col-md-4" id="un_selected_fees">
        <p>Non Applied Fee</p>

        </div>
        <!-- </div> -->
    </div>

</div>

<script type="text/javascript">

    $('select[name="accounts_select"], select[name="merchant_select"]').change(function(){
        if ($('select[name="accounts_select"]').val() >= "0" && $('select[name="merchant_select"]').val() >= "0"){
            $('#on_submit_save').removeClass('disable');
            $('.checkbox').remove();
        }
    });
    
    $('select[name="merchant_select"]').change(function(){
        //if(!$(this).parent().hasClass('Data_Present')) {
            //$('#on_submit_save').removeClass('disable');
            $('.appended_options').remove();
            $(".old").remove()
            var merchantid = $(this).val();
            //var parent_class = $(this).parent().prop('className');
            $.ajax
            ({ 
                url: 'specific_merchant/' + merchantid,
                //data: {"merchantid": merchantid},
                type: 'get',
                success: function(results)
                {
                    var accounts_select = $('#accounts_select');
                    $.each(results, function (key, value) {
                    accounts_select.append($('<option class="appended_options"></option>').val(value.id).html(value.first_name));
                    });
                }
            });
            //$(this).parent().addClass('Data_Present');
        //}else{
            //$(this).children().removeClass().addClass('fa fa-plus');
            //$(this).parent().removeClass('Data_Present'); 
            //$(this).parent().children(".merchant_accounts, .check_child").slideUp("slow", function() { $(this).remove();});
            //alert($(this).parent().children(".merchant_accounts").length); 
        //}
        
    });

    $('#on_submit_save').click(function(){
        var account_id = $('#accounts_select').val();
        if(!$(this).hasClass('disable')) {
            $(this).addClass('disable');
            $('.checkbox').remove();
            if(account_id == 0){
                var merchant_id = $('#merchant_select').val();
                $.ajax
                    ({ 
                        url: 'detailsforaccount/' + account_id,
                        data: {"merchant_id": merchant_id},
                        type: 'get',
                        success: function(results)
                        {
                            
                            //console.log(results);
                            var selected_fees = $('#selected_fees');
                            $.each(results['selectd_fee'], function (key, value) {
                            selected_html = '<div class="checkbox"><label class="left_checkbox container"><input type="checkbox" value="'+value.id+'">'+value.name+'<span class="checkmark"></span></label></div>';
                                    selected_fees.append(selected_html);
                            });

                            var un_selected_fee = $('#un_selected_fees');
                            $.each(results['unselected_fee'], function (key, value) {
                            un_selected_html = '<div class="checkbox"><label class="right_checkbox container"><input type="checkbox" value="'+value.id+'">'+value.name+'<span class="checkmark"></span></label></div>';
                                    un_selected_fee.append(un_selected_html);
                            });
                        }
                    });
                
                
                }//if accountid = 0
            else{
                    $.ajax
                    ({ 
                        url: 'detailsforaccount/' + account_id,
                        //data: {"merchantid": merchantid},
                        type: 'get',
                        success: function(results)
                        {
                            
                            //console.log(results);
                            var selected_fees = $('#selected_fees');
                            $.each(results['selectd_fee'], function (key, value) {
                            selected_html = '<div class="checkbox"><label class=" left_checkbox container"><input type="checkbox" value="'+value.id+'">'+value.name+'<span class="checkmark"></span></label></div>';
                                    selected_fees.append(selected_html);
                            });

                            var un_selected_fee = $('#un_selected_fees');
                            $.each(results['unselected_fee'], function (key, value) {
                            un_selected_html = '<div class="checkbox"><label class="right_checkbox container"><input type="checkbox" value="'+value.id+'">'+value.name+'<span class="checkmark"></span></label></div>';
                                    un_selected_fee.append(un_selected_html);
                            });
                        }
                    });
            }//else accountid is not  0
        }//if has class disable
            

    });


    $('#left_move').click(function(){
    var fees_list = [];
    $.each($("#un_selected_fees input[type='checkbox']:checked"), function(){            
                fees_list.push($(this).val());
    });
    var selected_account = $("#accounts_select option:selected").val();
    var merchant_id = $('#merchant_select').val();

    /*if(accounts_list == '' && selected_fees == '0'){
        $('#msg').html("Please select some values").fadeIn('slow');
        return false;
    }*/
    if (fees_list.length !== 0) {
    if(selected_account == 0){

         $.ajax
        ({ 
                    url: 'accountfeemap',
                    data: {"accounts": selected_account,"fees":fees_list,"merchant_id":merchant_id,"_token": "{{ csrf_token() }}"},
                    type: 'POST',
                    beforeSend: function() {
                        $("#loading-image").show();
                    },
                    success: function(results)
                    { 
                        $('.checkbox').remove();
                        console.log(results);
                        var selected_fees = $('#selected_fees');
                        $.each(results['applied_fee_details'], function (key, value) {
                        selected_html = '<div class="checkbox"><label class="left_checkbox container"><input type="checkbox" value="'+value.id+'">'+value.name+'<span class="checkmark"></span></label></div>';
                                selected_fees.append(selected_html);
                        });

                        var un_selected_fee = $('#un_selected_fees');
                        $.each(results['un_applied_details'], function (key, value) {
                        un_selected_html = '<div class="checkbox"><label class="right_checkbox container"><input type="checkbox" value="'+value.id+'">'+value.name+'<span class="checkmark"></span></label></div>';
                                un_selected_fee.append(un_selected_html);
                        });
                        $("#loading-image").hide();
                    }
                    ,error: function(XMLHttpRequest, textStatus, errorThrown) {
                        
                        /* $('#msg').html("Something happend,Please try again after sometime").fadeIn('slow');
                         location.reload(2000);*/
                         
                    }
        });//ajax for selected account is equal to 0

    }else{
        $.ajax
        ({ 
                    url: 'accountfeemap',
                    data: {"accounts": selected_account,"fees":fees_list,"_token": "{{ csrf_token() }}"},
                    type: 'POST',
                    beforeSend: function() {
                        $("#loading-image").show();
                    },
                    success: function(results)
                    { 
                        $('.checkbox').remove();
                        //console.log(results);
                        var selected_fees = $('#selected_fees');
                        $.each(results['applied_fee_details'], function (key, value) {
                        selected_html = '<div class="checkbox"><label class="left_checkbox container"><input type="checkbox" value="'+value.id+'">'+value.name+'<span class="checkmark"></span></label></div>';
                                selected_fees.append(selected_html);
                        });

                        var un_selected_fee = $('#un_selected_fees');
                        $.each(results['un_applied_details'], function (key, value) {
                        un_selected_html = '<div class="checkbox"><label class="right_checkbox container"><input type="checkbox" value="'+value.id+'">'+value.name+'<span class="checkmark"></span></label></div>';
                                un_selected_fee.append(un_selected_html);
                        });
                        $("#loading-image").hide();

                    }
                    ,error: function(XMLHttpRequest, textStatus, errorThrown) {
                        
                        /* $('#msg').html("Something happend,Please try again after sometime").fadeIn('slow');
                         location.reload(2000);*/
                         
                    }
        });//ajax for selected account greater than 0
    }//else loop greater than 0 ends
    }//if atlest one fees is not selected      

   });


    $('#right_move').click(function(){
    var fees_list = [];
    $.each($("#selected_fees input[type='checkbox']:checked"), function(){            
                fees_list.push($(this).val());
    });
    var selected_account = $("#accounts_select option:selected").val();
    var merchant_id = $('#merchant_select').val();

    /*if(accounts_list == '' && selected_fees == '0'){
        $('#msg').html("Please select some values").fadeIn('slow');
        return false;
    }*/
    if (fees_list.length !== 0) {
    if(selected_account == 0){
        $.ajax
        ({ 
                    url: 'removeaccountfeemap',
                    data: {"accounts": selected_account,"fees":fees_list,"merchant_id":merchant_id,"_token": "{{ csrf_token() }}"},
                    type: 'POST',
                    beforeSend: function() {
                        $("#loading-image").show();
                    },
                    success: function(results)
                    { 
                        $('.checkbox').remove();
                        console.log(results);
                        if(results['remaining_fees_after_delete'] != '0'){
                            var selected_fees = $('#selected_fees');
                            $.each(results['remaining_fees_after_delete'], function () {
                                $.each(this, function (key, value) {
                                    selected_html = '<div class="checkbox"><label class="left_checkbox container"><input type="checkbox" value="'+value.id+'">'+value.name+'<span class="checkmark"></span></label></div>';
                                            selected_fees.append(selected_html);
                                });
                            });
                        }

                        var un_selected_fee = $('#un_selected_fees');
                        $.each(results['deleted_fees'], function (key, value) {
                                un_selected_html = '<div class="checkbox"><label class="right_checkbox container"><input type="checkbox" value="'+value.id+'">'+value.name+'<span class="checkmark"></span></label></div>';
                                        un_selected_fee.append(un_selected_html);
                        });
                        $("#loading-image").hide();
                    }
                    ,error: function(XMLHttpRequest, textStatus, errorThrown) {
                        
                        /* $('#msg').html("Something happend,Please try again after sometime").fadeIn('slow');
                         location.reload(2000);*/
                         
                    }
        });

    }else{
        $.ajax
        ({ 
                    url: 'removeaccountfeemap',
                    data: {"accounts": selected_account,"fees":fees_list,"_token": "{{ csrf_token() }}"},
                    type: 'POST',
                    beforeSend: function() {
                        $("#loading-image").show();
                    },
                    success: function(results)
                    { 
                        $('.checkbox').remove();
                        if(results['remaining_fees_after_delete'] != '0'){
                            var selected_fees = $('#selected_fees');
                            $.each(results['remaining_fees_after_delete'], function () {
                                $.each(this, function (key, value) {
                                    selected_html = '<div class="checkbox"><label class="left_checkbox container"><input type="checkbox" value="'+value.id+'">'+value.name+'<span class="checkmark"></span></label></div>';
                                            selected_fees.append(selected_html);
                                });
                            });
                        }

                        var un_selected_fee = $('#un_selected_fees');
                        $.each(results['deleted_fees'], function (key, value) {
                                un_selected_html = '<div class="checkbox"><label class="right_checkbox container"><input type="checkbox" value="'+value.id+'">'+value.name+'<span class="checkmark"></span></label></div>';
                                        un_selected_fee.append(un_selected_html);
                        });
                        $("#loading-image").hide();
                        /*$('#msg').html("data insert successfully").fadeIn('slow');
                        location.reload(2000);*/
                    }
                    ,error: function(XMLHttpRequest, textStatus, errorThrown) {
                        
                        /* $('#msg').html("Something happend,Please try again after sometime").fadeIn('slow');
                         location.reload(2000);*/
                         
                    }
        });
    }//else selected account is greater than 0
    }//if atleast single fees is not selected

   });


</script>

@stop

@push('scripts')
<!-- jQuery -->

@endpush