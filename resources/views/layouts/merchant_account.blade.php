@section('css')
    <style>
        .submit_button {
            padding: 24px;
        }
    </style>
@stop
@section('content')
    <div class="container col-sm-9 offset-sm-3 col-md-10 offset-md-2">
        <div class="row">
            <div class="col-md-4 form-group merchants">
                <label for="type">Select Merchants:</label>
                <select name="merchant_select" id="merchant_select" style='height: 34px !important;' class="form-control">
                    <option value='-1' disabled selected="selected">Select Merchant</option>
                    <option value='0'>All</option>
                        
                </select> 
            </div>
            <div class="col-md-4 form-group accounts">
                <label for="type">Select Accounts:</label>
                <select name="accounts_select" id="accounts_select" style='height: 34px !important;' class="form-control">
                    <option value='-1' disabled selected="selected">Select Accounts</option>
                    <option value='0'>All</option>
                </select> 
            </div>
            <div class="col-md-2 submit_button">
                <button id="on_submit_save" type="button" class="btn btn-info disable">Show</button>
            </div>
        </div>
    </div>


<script type="text/javascript">

    //to make show button disable 
    $('select[name="accounts_select"], select[name="merchant_select"]').change(function(){
        if ($('select[name="accounts_select"]').val() >= "0" && $('select[name="merchant_select"]').val() >= "0"){
            $('#on_submit_save').removeClass('disable');
            $('.checkbox').remove();
        }
    });

    //to get all merchants
    $( window ).on( "load", function() {
            $.ajax
            ({ 
                url: 'merchantfeemaps',
                //data: {"merchantid": merchantid},
                type: 'get',
                success: function(results)
                {
                    //console.log(results);
                    var merchant_select = $('#merchant_select');
                    $.each(results.data, function (key, value) {
                    merchant_select.append($('<option class="appended_options"></option>').val(value.id).html(value.merchant_name));

                    });
                }
            });       
    });

    $('select[name="merchant_select"]').change(function(){
        //if(!$(this).parent().hasClass('Data_Present')) {
            //$('#on_submit_save').removeClass('disable');
            $('.merchant_options').remove();
            var merchantid = $(this).val();
            //var parent_class = $(this).parent().prop('className');
            $.ajax
            ({ 
                url: 'accountfrommerchant/' + merchantid,
                //data: {"merchantid": merchantid},
                type: 'get',
                success: function(results)
                {
                    var accounts_select = $('#accounts_select');
                    $.each(results, function (key, value) {
                    accounts_select.append($('<option class="merchant_options"></option>').val(value.id).html(value.first_name));
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

</script>
