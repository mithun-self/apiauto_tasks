@extends('layouts.app')
@section('css')


@stop

@section('content')

<div class="container col-sm-9 offset-sm-3 col-md-10 offset-md-2">
	<div class="row pt-5">
        <!--<div class="to_show_all_fees">-->
        <div class="col-md-4">
            <div id="selected_fees">
                <p>Applied Fee</p>
            </div>
        </div>
        <div class="col-md-2" class="custom_font_awesome">
        <button id="left_move" class="next form-control" style="width:33%;margin: 0 auto;position: absolute; top: 38%; left: 37%;"><i class="fa fa-angle-double-left" style="font-size:15px;color:black"></i></button>
        <button id="right_move" class="next form-control" style="width:33%;margin: 0 auto;position: absolute; top: 54%; left: 37%;"><i class="fa fa-angle-double-right" style="font-size:15px;color:black"></i></button>
        </div>
        <div class="col-md-4">
            <div id="un_selected_fees">
                <p>Non Applied Fee</p>
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>

@stop

@section('javascript')
<script type="text/javascript">

	$('#on_submit_save').click(function(){
        var account_id = $('#accounts_select').val();
        if(!$(this).hasClass('disable')) {
            $(this).addClass('disable');
            $('.checkbox').remove();
                var merchant_id = $('#merchant_select').val();
                $.ajax
                    ({ 
                        url: 'feebyaccount',
                        data: {"merchant_id": merchant_id,"account_id" : account_id,"_token": "{{ csrf_token() }}"},
                        type: 'POST',
                        success: function(results)
                        {
                            
                            console.log(results);
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
                
                
                }         

    });

</script>
@stop