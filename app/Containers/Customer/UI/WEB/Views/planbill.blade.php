@extends('layouts.app')

@section('content')
<script>
$(document).ready(function() {
	  
function getRequests() {
    var s1 = location.search.substring(1, location.search.length).split('&'),
        r = {}, s2, i;
    for (i = 0; i < s1.length; i += 1) {
        s2 = s1[i].split('=');
        r[decodeURIComponent(s2[0]).toLowerCase()] = decodeURIComponent(s2[1]);
    }
    return r;
};

var QueryString = getRequests();
var requestid = '{{$request->id}}';
//datainsert
		$('.customercreate').click(function(){
		var submitdaata='http://payarcmp-lb-1305431901.us-east-1.elb.amazonaws.com:9000/api/v1/customers/'+requestid;
		var email = $('#customemail').val();
		var desc = $('#desc').val();
		var cc_email_address = $('#customccemail').val();
		var country = $('#country').val();
		var address_1 = $('#addressline1').val();
		var address_2 = $('#addressline2').val();
		var city = $('#city').val();
		var state = $('#state').val();
		var zip = $('#zip').val();
		var phn = $('#phone').val();
		
		$.ajax({
	
            url: submitdaata,
            type: 'PATCH',
            data: {'email':email,'desc':desc,'cc_email_address':cc_email_address,'country':country,'address_1':address_1,'address_2':address_2,'city':city,'state':state,'zip':zip,'phn':phn},
            headers: {
                'Authorization': '@include('layouts.token')'
            },
            accept: 'application/json',
            success: function (obj) {
            	if(obj){
            		window.reload();
            	}
            }
         });
	});
//enddatainsert
$.ajax({
            url: 'http://payarcmp-lb-1305431901.us-east-1.elb.amazonaws.com:9000/api/v1/customers/'+requestid,
            type: 'GET',
            dataType: 'json',
            headers: {
                'authorization': '@include('layouts.token')'
            },
            contentType: 'application/json; charset=utf-8',
            success: function (obj) {
            // console.log(obj['data']);
			 $(".cemail").html(obj.data.email);
			 $("#customemail").val(obj.data.email);
			 $("#customtoemail").val(obj.data.send_mail_address);
			 $("#customccemail").val(obj.data.email);
			 $('#desc').val(obj.data.description);
			 $(".csutomerid").html(obj.data.id);
			 $("#customid").val(obj.data.id);
			 $(".cusdesc").html(obj.data.description);
			 $('.cuscards').empty();
			 for(var j=0;j<obj['data'].card.data.length;j++)
			{
						
$('.cuscards').append('<li class="list-inline-item"><img src="{{asset('assets/images/visa.png')}}" alt="" width="35"></li><li class="list-inline-item">'+obj['data'].card.data[j].last4digit+'</li><li class="list-inline-item">'+obj['data'].card.data[j].exp_month+'/'+obj['data'].card.data[j].exp_year+'</li>');
									}
								$('.cuscharges tbody').empty();
								
									for(var c=0;c<obj['data'].charge.data.length;c++){
										//console.log(obj['data']);
								$('.cuscharges tbody').append('<tr><td><a href="paymentdetail.php?id='+obj.data.charge.data[c].id+'"><span class="cusblue">$'+obj.data.charge.data[c].amount+'&nbsp;USD</span></a></td><td>'+obj.data.charge.data[c].id+'</td><td>'+obj.data.charge.data[c].updated_at+'</td><td></td></tr>');
								}
            },
            error: function (error) {
                
            }
        });
//events
$.ajax({
            url: 'http://payarcmp-lb-1305431901.us-east-1.elb.amazonaws.com:9000/api/v1/events/?customer_id='+requestid,
            type: 'GET',
            dataType: 'json',
            headers: {
                'authorization': '@include('layouts.token')'
            },
            contentType: 'application/json; charset=utf-8',
            success: function (obj) {
            
            
			
			 $('.cusnewevents tbody').empty();
			 for(var i=0;i<obj['data'].length;i++)
			{

					//console.log('<a href="{{url('event-details')}}?id='+obj.data[i].id+'">'+obj.data[i].description+'</a>');	
					$('.cusnewevents tbody').append('<tr><td>&nbsp;</td><td><a href=event-details?id='+obj.data[i].id+'">'+obj.data[i].description+'</a></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>'+obj.data[i].created_at.date+'</td></tr>');
									}
            },
            error: function (error) {
                
            }
        });
//card_detail_add
//subscription
$('#addcarddeatil').click(function(){
	$('.addcarddeatil').css('disabled','true');
	var card_num = $('#card_num').val();
	var card_month = $('#card_month').val();
	var card_cvv = $('#card_cvv').val();
	var cardmonth = card_month.split('/');
	var card_exp_month = cardmonth[0];
	var card_exp_year = cardmonth[1];
	var cardholdername = $('#cardholdername').val();
	var card_address_1 = $('#card_address_1').val();
	var card_address_2 = $('#card_address_2').val();
	var card_city = $('#card_city').val();
	var card_zip = $('#card_zip').val();
	var card_state = $('#card_state').val();
	var card_country = $('#card_country').val();
 	var loadicon = '<img src="{{asset('assets/images/loading.gif')}}" width="18px">';
	$('.imgsetcard').html(loadicon);
	$.ajax({
        url: 'http://payarcmp-lb-1305431901.us-east-1.elb.amazonaws.com:9000/api/v1/tokens?address_line1='+card_address_1+'&address_line2='+card_address_2+'&card_number='+card_num+'&city='+card_city+'&country='+card_country+'&customer_id='+requestid+'&cvv='+card_cvv+'&exp_month='+card_exp_month+'&exp_year='+card_exp_year+'&name='+cardholdername+'&state='+card_state+'&zip='+card_zip,
        type: 'POST',
        dataType: 'json',
        headers: {
            'authorization': '@include('layouts.token')'
        },
        contentType: 'application/json; charset=utf-8',
        success: function (obj) {
        
		 	
        },
        error: function (error) {
            
        }
    });
});
//subscritiondetail display
$.ajax({
        url: 'http://payarcmp-lb-1305431901.us-east-1.elb.amazonaws.com:9000/api/v1/subscriptions?customer_id='+requestid,
        type: 'GET',
        dataType: 'json',
        headers: {
            'authorization': '@include('layouts.token')'
        },
        contentType: 'application/json; charset=utf-8',
        success: function (obj) {
        
        
		
		$('.cuspaylistsubscription tbody').empty();
		 	for(var i=0;i<obj['data'].length;i++)
			{

				//console.log('<tr><td><a href="{{url('subscriptiondetail')}}/id='+obj.data[i].id+'"><span class="cusblue">$'+obj.data[i].plan.data.name+'&nbsp;($'+obj.data[i].plan.data.amount+'/day)</span></a></td></tr>');	
				$('.cuspaylistsubscription tbody').append('<tr><td><a href="{{url('subscriptiondetail')}}/id='+obj.data[i].id+'"><span class="cusblue">$'+obj.data[i].plan.data.name+'&nbsp;($'+obj.data[i].plan.data.amount+'/day)</span></a></td></tr>');
			}
        },
        error: function (error) {
            
        }
        });
//subscription
$.ajax({
        url: 'http://payarcmp-lb-1305431901.us-east-1.elb.amazonaws.com:9000/api/v1/subscriptions?customer_id='+requestid,
        type: 'GET',
        dataType: 'json',
        headers: {
            'authorization': '@include('layouts.token')'
        },
        contentType: 'application/json; charset=utf-8',
        success: function (obj) {
        
        
		
		$('.cuspaylistsubscription tbody').empty();
		 	for(var i=0;i<obj['data'].length;i++)
			{

				//console.log('<tr><td><a href="{{url('subscriptiondetail')}}/id='+obj.data[i].id+'"><span class="cusblue">$'+obj.data[i].plan.data.name+'&nbsp;($'+obj.data[i].plan.data.amount+'/day)</span></a></td></tr>');	
				$('.cuspaylistsubscription tbody').append('<tr><td><a href="{{url('subscriptiondetail')}}/id='+obj.data[i].id+'"><span class="cusblue">$'+obj.data[i].plan.data.name+'&nbsp;($'+obj.data[i].plan.data.amount+'/day)</span></a></td></tr>');
			}
        },
        error: function (error) {
            
        }
        });
//delete
$('#delete_customer').click(function(e){
	var customerid = $(this).data('id');
	SwalDelete(customerid);
	e.preventDefault();
});
function SwalDelete(customerid){
  var deleteurl= 'http://payarcmp-lb-1305431901.us-east-1.elb.amazonaws.com:9000/api/v1/customers/'+customerid;
  swal({
   title: 'Are you sure?',
   text: "You won't be able to revert this!",
   type: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: 'Yes, delete it!',
   showLoaderOnConfirm: true,
     
   preConfirm: function() {
     return new Promise(function(resolve) {
          
        $.ajax({
        url: deleteurl,
        type: 'delete'
       	})
        .done(function(response){
         swal('Deleted!', response.message, response.status);
     readProducts();
        })
        .fail(function(){
         swal('Oops...', 'Something went wrong with ajax !', 'error');
        });
     });
      },
   allowOutsideClick: false     
  }); 
  
 }
				
	});
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-5">
    <div class="row pt-5">
    	<div class="col-md-3 col-sm-3 col-xs-3 col-3">
        	<h4 class="antitle cemail"></h4>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3 col-3">
            	<h6 class="cuslisttoken csutomerid"></h6>
        </div>
      	<div class="col-md-6 text-right">
        	<ul>
            	<li class="list-inline-item"><a href="javascript:void(0)" class="expanc" id="delete_customer" data-id="{{$request->id}}" ><i class="fa fa-close" style="font-size:12px;color:red">&nbsp;</i>Delete</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
		<div class="col-md-12">
	    	<div class="cusdetmain p-3">
		 		<div class="row cusdetcnt m-2 pt-3 pb-2 rounded">
		        	<div class="col-md-6 col-sm-6 col-xs-6 col-6">
		            	<h5 class="cusdettitle">Details</h5>
		            </div>
		            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-right">
		            	<h5 class="cusdettitle"><a href="#" class="expanc" data-toggle="modal" data-target="#updatedetail"><i class="fa fa-pencil" style="color:#e68300;"></i> Updated Details</a></h5>
		            </div>
	        	</div>
	            <div class="row p-3 pl-4 ">
	            	<div class="col-md-6 col-ms-6 col-xs-6 col-6">
	                	<h6 class="pb-3 cusaccounthd">Account Information</h6>
	                    <div class="form-group row">
	                    	<div class="col-4 cusaccntcnt">ID</div>
	                        <div class="col-6 cusaccntcnt csutomerid"></div>
	                    </div>
	                    <div class="form-group row">
	                    	<div class="col-4 cusaccntcnt">Created</div>
	                        <div class="col-6 cusaccntcnt">2018/01/17 16:36</div>
	                    </div>
	                    <div class="form-group row">
	                    	<div class="col-4 cusaccntcnt">Email</div>
	                        <div class="col-6 cusaccntcnt cemail"></div>
	                    </div>
	                    <div class="form-group row">
	                    	<div class="col-4 cusaccntcnt">Description</div>
	                        <div class="col-6 cusaccntcnt cusdesc"></div>
	                    </div>
	                </div>
	                <div class="col-md-6 col-ms-6 col-xs-6 col-6">
	                	<h6 class="pb-3 cusaccounthd">Invoicing Settings</h6>
		                <div class="form-group row">
		                    <div class="col-4 cusaccntcnt">Send invoices to</div>
		                    <div class="col-6 cusaccntcnt cemail"></div>
		                </div>
	                </div>
	            </div>
	            <div class="row cusdetcnt m-2 pt-3 pb-2 rounded">
	            	<div class="col-md-6 col-sm-6 col-xs-6 col-6">
	                	<h5 class="cusdettitle">Cards</h5>
	                </div>
	                <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-right">
	                	<a href="" class="cusdettitle"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" style="color:#00c73d;">&nbsp;</i>Add Card</a>
	                </div>
	            </div>
	            <div class="row m-2 pl-1 mt-3 rounded cuspayment">
	            	<div class="col-md-6 col-sm-6 col-xs-6 col-6 pt-3">
	                	<ul class="list-inline cuscards">
	                    	<!-- <li class="list-inline-item"><img src="{{asset('assets/images/visa.png')}}" alt="" width="35"></li>
	                        <li class="list-inline-item">4242</li>
	                        <li class="list-inline-item">12/2018</li> -->
	                    </ul>
	                </div>
	                <div class="col-md-6 col-sm-6 col-xs-6 col-6 pt-3 text-right">
	                	<ul class="list-inline">
	                    	<li class="list-inline-item"><span class="cusdefault">Default</span></li>
	                        <li class="list-inline-item"><i class="fa fa-close" style="font-size:15px;">&nbsp;</i><a href="#"><span class="cusblue">Delete</span></a></li>
	                        <li class="list-inline-item"><i class="fa fa-pencil">&nbsp;</i><span class="cusblue">Edit</span></li>
	                    </ul>
	                </div>
	            </div>
	            <div class="row cusdetcnt m-2 pt-3 pb-2 mt-5 rounded">
	            	<div class="col-md-6 col-sm-6 col-xs-6 col-6">
	                	<h5 class="cusdettitle">Payments</h5>
	                </div>
	                <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-right">
	                	<h5 class="cusdettitle"><a href="#" data-toggle="modal" data-target="#newpayment"><i class="fa fa-plus" style="color:#00c73d;">&nbsp;</i>Create Payments</a></h5>
	                </div>
	            </div>
	            <div class="row">
	            	<div class="col-md-12 table-responsive pl-4">
	                	<table class="table borderless cuspaylist cuscharges">
	                      <tbody>
	                        {{-- <tr>
	                          <td><span class="cusblue">$9.00 USD</span></td>
	                          <td>ch_eduHSDLKcnnnsjLWDKLDIidmwnioda </td>
	                          <td>admin123@gmail.com</td>
	                          <td>2018/01/17  15:16:57 </td>
	                        </tr>
	                        <tr>
	                          <td><span class="cusblue">$9.00 USD</span></td>
	                          <td>ch_eduHSDLKcnnnsjLWDKLDIidmwnioda </td>
	                          <td>admin123@gmail.com</td>
	                          <td>2018/01/17  15:16:57 </td>
	                        </tr> --}}
	                      </tbody>
	                    </table>
	                </div>
	                <div class="col-md-12 text-center">
	                	<a href="#" class="text-center rounded p-2 cuspaybtn">View More Payments</a>
	                </div>
	            </div>
		        <div class="row cusdetcnt m-2 pt-3 pb-2 mt-5 rounded">
		        	<div class="col-md-6 col-sm-6 col-xs-6 col-6">
		            	<h5 class="cusdettitle">Active Subscriptions</h5>
		            </div>
		            <div class="col-md-6 col-sm-6 col-xs-6 col-6 text-right">
		            	<h5 class="cusdettitle"><a href="#" data-toggle="modal" data-target="#newsubscribtion"><i class="fa fa-plus" style="color:#00c73d;">&nbsp;</i>Add Subscription</a></h5>
		            </div>
		        </div>
	            <div class="row">
	            	<div class="col-md-12 table-responsive pl-4">
	            		{{-- mainpay --}}
	                	<table class="table borderless cuspaylistsubscription">
	                      <tbody>
	                       
	                      
	                      </tbody>
	                    </table>
	                </div>
	            </div>
	            <div class="row cusdetcnt m-2 pt-3 pb-2 mt-5 rounded">
	            	<div class="col-md-6 col-sm-6 col-xs-6 col-6">
	                	<h5 class="cusdettitle">Pending invoice items</h5>
	                </div>
	            </div>
	            <div class="row">
	            	<div class="col-md-12 pt-3">
	                	<p class="text-center cusnorecords">no pending invoice items</p>
	                </div>
	            </div>
	            <div class="row cusdetcnt m-2 pt-3 pb-2 mt-5 rounded">
	            	<div class="col-md-6 col-sm-6 col-xs-6 col-6">
	                	<h5 class="cusdettitle">Invoices</h5>
	                </div>
	            </div>
	            <div class="row">
	            	<div class="col-md-12 pt-3">
	                	<p class="text-center cusnorecords">no invoices</p>
	                </div>
	            </div>
	            <div class="row cusdetcnt m-2 pt-3 pb-2 mt-5 rounded">
	            	<div class="col-md-6 col-sm-6 col-xs-6 col-6">
	                	<h5 class="cusdettitle">Discounts</h5>
	                </div>
	            </div>
	            <div class="row">
	            	<div class="col-md-12 pt-3">
	                	<p class="text-center cusnorecords">no discounts</p>
	                </div>
	            </div>
	            <div class="row cusdetcnt m-2 pt-3 pb-2 mt-5 rounded">
	            	<div class="col-md-6 col-sm-6 col-xs-6 col-6">
	                	<h5 class="cusdettitle">Events</h5>
	                </div>
	            </div>
	            <div class="row">
	            	<div class="col-md-12 pt-3">
	            		<table class="cusnewevents">
	            			<thead>                                
								<tr>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
	            			<tbody>
	            			</tbody>
	            		</table>
	                </div>
	            </div>
		  	</div>
	    </div>
	</div>
</main>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      	<div class="modal-header">
        	<h5 class="modal-title newcustomer" id="exampleModalLabel">Add a card</h5>
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
      	</div>
      	<div class="modal-body cusaddpop">
			<div class="form-group row pt-3">
          		<label  class="col-3 col-form-label cclabel">Card Number: </label>
	          	<div class="col-4">
	           		<input type="text" class="form-control" id="card_num">
	          	</div>
	           	<div class="col-3">
	           		<input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year"placeholder="MM / YY" id="card_month">
	          	</div>
	           	<div class="col-2">
	           		<input type="text" class="form-control" id="card_cvv" placeholder="CCV">
	          	</div>
        	</div>
            <div class="form-group row">
              <label  class="col-3 col-form-label cclabel">Cardholder name: </label>
              <div class="col-8">
               		<input type="text" class="form-control" id="cardholdername">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-3 col-form-label cclabel">Street: </label>
              <div class="col-8">
               		<input type="text" class="form-control" id="card_address_1">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-3 col-form-label cclabel">Street (line2) </label>
              <div class="col-8">
               		<input type="text" class="form-control" id="card_address_2">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-3 col-form-label cclabel">City: </label>
              <div class="col-8">
               		<input type="text" class="form-control" id="card_city">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-3 col-form-label cclabel">Zip/Postal: </label>
              <div class="col-8">
               		<input type="text" class="form-control" id="card_zip">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-3 col-form-label cclabel">State/Province: </label>
              <div class="col-8">
               		<input type="text" class="form-control" id="card_state">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-3 col-form-label cclabel">Country: </label>
              <div class="col-8">
               		<input type="text" class="form-control" id="card_country">
              </div>
            </div>
        	<button type="button" class="btn  pdisbtn addcarddeatil imgsetcard" id="addcarddeatil">Add Card</button>
        	<button type="button" class="btn  pdisbtn" data-dismiss="modal">Cancel</button>
      	</div>
    </div>
  </div>
</div>
<div class="modal fade" id="newpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      	<div class="modal-header">
        	<h5 class="modal-title newcustomer" id="newpaymentLabel">Add a card</h5>
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
      	</div>
      	<div class="modal-body cusaddpop">
			<div class="form-group row pt-3">
	          	<label  class="col-4 col-form-label cclabel">Currency; </label>
	          	<div class="col-8">
	           		<input type="text" class="form-control">
	          	</div>
        	</div>
	        <div class="form-group row">
	          	<label  class="col-4 col-form-label cclabel">Amount: </label>
	          	<div class="col-8">
	           		<input type="text" class="form-control">
	          	</div>
	        </div>
            <div class="form-group row">
              	<label  class="col-4 col-form-label cclabel">Statement desc: </label>
              	<div class="col-8">
               		<input type="text" class="form-control">
              	</div>
            </div>
            <div class="form-group row">
              	<label  class="col-4 col-form-label cclabel">Description: </label>
              	<div class="col-8">
               		<input type="text" class="form-control">
              	</div>
            </div>
            <div class="form-group row">
              	<label  class="col-4 col-form-label cclabel">Source: </label>
              	<div class="col-8">
               		<select class="form-control">
                    </select>
              	</div>
            </div>
            <div class="form-group row">
              	<label  class="col-4 col-form-label cclabel">Capture charge: </label>
              	<div class="col-8 text-left">
               		<div class="radio">
                      <label class="cusradio"><input type="radio" name="optradio ">&nbsp; Yes</label>
                       <label class="cusradio"><input type="radio" name="optradio ">&nbsp; No</label>
                    </div>
                    <div class="radio">
                     
                    </div>
              	</div>
            </div>
        	<button type="button" class="btn  pdisbtn">Charge Customer</button>
        	<button type="button" class="btn  pdisbtn" data-dismiss="modal">Cancel</button>
      	</div>
    </div>
  </div>
</div>
<div class="modal fade" id="updatedetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title newcustomer" id="exampleModalLabel">Create new customer</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
      		</div>
      		<div class="modal-body">
      			<h5 class="informationheader">Account Information</h5>
      			<div class="form-group row">
	          		<label  class="col-2 col-form-label nclabel">Email: </label>
		          	<div class="col-10">
		          		<input type="hidden" name="customid" id="customid" class="form-control" value="">
		           		<input type="email" name="email" id="customemail" class="form-control" value="">
		          	</div>
	        	</div>
		        <div class="form-group row">
		          	<label  class="col-2 col-form-label nclabel">Description: </label>
		          	<div class="col-10">
		           		<input type="text" name="desc" id="desc" class="form-control" value="">
		          	</div>
		        </div>
		        <div class="form-group row">
		          	<label  class="col-2 col-form-label nclabel">Account Balance: </label>
		          	<div class="col-10">
		           		<input class="form-control" id="account_balance" min="0" name="account_balance" type="number" value="">
		          	</div>
		        </div>
		        <h5 class="informationheader2">Contact Preferences</h5>
		        <p id="inform">If you opt to email receipts or invoices to this customer they'll be sent to the following email addresses.</p>
		        <div class="form-group row">
	          		<label  class="col-2 col-form-label nclabel">Send Email To: </label>
		          	<div class="col-10">
		           		<input type="email" name="to_email" id="customtoemail" class="form-control" value="">
		          	</div>
	        	</div>
				<div class="form-group row">
	          		<label  class="col-2 col-form-label nclabel">CC: </label>
		          	<div class="col-10">
		           		<input type="email" name="cc" id="customccemail" class="form-control" value="">
		          	</div>
	        	</div>
	        	<div class="form-group row">
	          		<label  class="col-2 col-form-label nclabel">Country: </label>
		          	<div class="col-10">
		           		<select name="country" id="country" class="form-control">
		           			<option value="United States">United States</option>
		           		</select>
		          	</div>
	        	</div>
		        <div class="form-group row">
		          	<label  class="col-2 col-form-label nclabel">Billing Address: </label>
		          	<div class="col-10">
		           		<input class="form-control" id="addressline1" name="addressline1" placeholder="Address 1" type="text" value="">
		           	</div>
		        </div>
		        <div class="form-group row">
		          	<label  class="col-2 col-form-label nclabel"></label>
		          	<div class="col-10">
		           		<input class="form-control" id="addressline2" name="addressline2" placeholder="Address 2" type="text" value="">
		           	</div>
		        </div>
		        <div class="form-group row">
		          	<label  class="col-2 col-form-label nclabel"></label>
		          	<div class="col-10">
		           		<input class="form-control" id="city" name="city" placeholder="City" type="text" value="">
		           	</div>
		        </div>
		        <div class="form-group row">
		          	<label  class="col-2 col-form-label nclabel"></label>
		          	<div class="col-10">
		           		<select class="form-control" id="state" name="state">
				            <option disabled="" selected="" value="null">Choose a state</option>
				            <!----><option value="Alabama" class="" style="">Alabama</option><option value="Alaska" class="" style="">Alaska</option><option value="Arizona" class="" style="">Arizona</option><option value="Arkansas" class="" style="">Arkansas</option><option value="California" class="" style="">California</option><option value="Colorado" class="" style="">Colorado</option><option value="Connecticut" class="" style="">Connecticut</option><option value="Delaware" class="" style="">Delaware</option><option value="District of Columbia" class="" style="">District of Columbia</option><option value="Florida" class="" style="">Florida</option><option value="Georgia" class="" style="">Georgia</option><option value="Hawaii" class="" style="">Hawaii</option><option value="Idaho" class="" style="">Idaho</option><option value="Illinois" class="" style="">Illinois</option><option value="Indiana" class="" style="">Indiana</option><option value="Iowa" class="" style="">Iowa</option><option value="Kansas" class="" style="">Kansas</option><option value="Kentucky" class="" style="">Kentucky</option><option value="Louisiana" class="" style="">Louisiana</option><option value="Maine" class="" style="">Maine</option><option value="Maryland" class="" style="">Maryland</option><option value="Massachusetts" class="" style="">Massachusetts</option><option value="Michigan" class="" style="">Michigan</option><option value="Minnesota" class="" style="">Minnesota</option><option value="Mississippi" class="" style="">Mississippi</option><option value="Missouri" class="" style="">Missouri</option><option value="Montana" class="" style="">Montana</option><option value="Nebraska" class="" style="">Nebraska</option><option value="Nevada" class="" style="">Nevada</option><option value="New Hampshire" class="" style="">New Hampshire</option><option value="New Jersey" class="" style="">New Jersey</option><option value="New Mexico" class="" style="">New Mexico</option><option value="New York" class="" style="">New York</option><option value="North Carolina" class="" style="">North Carolina</option><option value="North Dakota" class="" style="">North Dakota</option><option value="Ohio" class="" style="">Ohio</option><option value="Oklahoma" class="" style="">Oklahoma</option><option value="Oregon" class="" style="">Oregon</option><option value="Pennsylvania" class="" style="">Pennsylvania</option><option value="Puerto Rico" class="" style="">Puerto Rico</option><option value="Rhode Island" class="" style="">Rhode Island</option><option value="South Carolina" class="" style="">South Carolina</option><option value="South Dakota" class="" style="">South Dakota</option><option value="Tennessee" class="" style="">Tennessee</option><option value="Texas" class="" style="">Texas</option><option value="Utah" class="" style="">Utah</option><option value="Vermont" class="" style="">Vermont</option><option value="Virginia" class="" style="">Virginia</option><option value="Washington" class="" style="">Washington</option><option value="West Virginia" class="" style="">West Virginia</option><option value="Wisconsin" class="" style="">Wisconsin</option><option value="Wyoming" class="" style="">Wyoming</option>
          				</select>
          			</div>
          		</div>
          		<div class="form-group row">
		          	<label  class="col-2 col-form-label nclabel"></label>
		          	<div class="col-10">
          				<input class="form-control ng-pristine ng-valid ng-touched" id="zip" name="zip" pattern="^[0-9]{5}(?:-[0-9]{4})?$" placeholder="Zip" type="text" value="">
					</div>
		        </div>
		        <div class="form-group row">
		          	<label  class="col-2 col-form-label nclabel">Phone: </label>
		          	<div class="col-10">
		           		<input class="form-control" id="phone" name="phone" type="tel" value="">
		          	</div>
		        </div>
		        <button type="button" class="btn  pdisbtn customercreate">Update Customer</button>
		        <button type="button" class="btn  pdisbtn" data-dismiss="modal">Cancel</button>
      		</div>
    	</div>
  	</div>
</div>
<div class="modal fade" id="newsubscribtion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content subscribe">
      	<div class="modal-header ">
        	<h5 class="modal-title newcustomer" id="exampleModalLabel">Add Subscription</h5>
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
      	</div>
      	<div class="modal-body cusaddpop">
      		<div class="form-group row pt-3">
              	<label  class="col-md-2 col-form-label cclabel sublabel">Select Customer:</label>
              	<div class="col-md-4">
               		<input type="text" class="form-control">
              	</div>
               	<div class="col-md-6 data-display">
	               	<div class="col-md-3">
	               		<label  class="col-md-3 col-form-label cclabel">CustomerID:</label>
	              	</div>
	               	<div class="col-md-3">
	               		<label  class="col-md-3 col-form-label cclabel">Email:</label>
	              	</div>
              	</div>
            </div>
            <div class="form-group row pt-3">
              	<label  class="col-md-2 col-form-label cclabel sublabel">Add Plan:</label>
              	<div class="col-md-4">
               		<input type="text" class="form-control">
              	</div>
               	<div class="col-md-6 data-display">
	               	<div class="col-md-3">
	               		<label  class="col-md-3 col-form-label cclabel">PlanID:</label>
	              	</div>
	               	<div class="col-md-3">
	               		<label  class="col-md-3 col-form-label cclabel">Amount:</label>
	              	</div>
              	</div>
            </div>
            <div class="form-group row pt-3">
              	<label  class="col-md-2 col-form-label cclabel sublabel">Add Coupon:</label>
              	<div class="col-md-4">
               		<input type="text" class="form-control">
              	</div>
               	<div class="col-md-6 data-display">
	               	<div class="col-md-3">
	               		<label  class="col-3 col-form-label cclabel">CouponID:</label>
	              	</div>
	               	<div class="col-md-3">
	               		<label  class="col-3 col-form-label cclabel">Redeemed:</label>
	              	</div>
              	</div>
            </div>
            <div class="form-group row">
              <label  class="col-md-2 col-form-label cclabel sublabel">Tax </label>
              <div class="col-4">
               		<input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
            	<div class="col-6">
              		<p id="trialdata">Trial Ends</p>
              	</div>
            </div>
            <div class="form-group row">
              <label  class="col-2 col-form-label cclabel sublabel">Memo </label>
              <div class="col-4">
               		<textarea name="memo" class="form-control"></textarea>
              </div>
            </div>
            <button type="button" class="btn  pdisbtn">Start Subscribtion</button>
        	<button type="button" class="btn  pdisbtn" data-dismiss="modal">Cancel</button>
      	</div>
    </div>
  </div>
</div>
@endsection