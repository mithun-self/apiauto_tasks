<?php header('Access-Control-Allow-Origin: *'); ?>
@extends('layouts.app')

@section('content')
<script type="text/javascript">

$(document).on("click", ".cuscharege", function(e) {
	$(e.target).popover({ html : true,content: function() {
          var getid = $(this).attr("data-id");
          $('#cusid').val(getid);
          return $('#popover-content').html();
        } });
	
	return $('#popover-content').html();
});
function chargepaymenttest(){
	
	
	//var submitdaata='http://payarcmp-lb-1305431901.us-east-1.elb.amazonaws.com:9000/api/v1/charges/';
	var amountdata = $('#mynewcustomamount').val();
	
	var carddetail = $('.cuscur').val();
	var descnew = $('.cusdesc').val();
	var currencytype = $('.cuscurtype').val();
	var cusid = $('.cusid').val();
	var statedesc = $('.cusstatedesc').val();
	console.log(amountdata);console.log(carddetail);console.log(descnew);console.log(currencytype);console.log(cusid);console.log(statedesc);
	
	// $.ajax({

 //        url: 'http://payarcmp-lb-1305431901.us-east-1.elb.amazonaws.com:9000/api/v1/charges/?amount='+amountdata+'&capture=1&card_id='+carddetail+'&charge_description='+descnew+'&currency='+currencytype+'&customer_id='+cusid+'&statement_description='+statedesc,
 //        type: 'POST',
        
        
 //        headers: {
 //            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjA1YzU1NTVlODAxN2I3OTllY2Y1NGU4MGFmM2U2MzhmZTEyODM0M2YxMmZmMjkwNDA1NzA5ZmY2YjcyNmYwYTRmNjhkNjAzNDAyODVmZDRhIn0.eyJhdWQiOiIyIiwianRpIjoiMDVjNTU1NWU4MDE3Yjc5OWVjZjU0ZTgwYWYzZTYzOGZlMTI4MzQzZjEyZmYyOTA0MDU3MDlmZjZiNzI2ZjBhNGY2OGQ2MDM0MDI4NWZkNGEiLCJpYXQiOjE1MjcwNzQ2MzcsIm5iZiI6MTUyNzA3NDYzNywiZXhwIjoxNTI3MjkzNjM3LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.k7mFpF8aT4UWr9BUAQSHDNn8A9P1CrXJ21AGCjW_ngmrPjWJSpT7oLtE5sVCaeTMhL8d7IeCY1KJ7SY6c4PcMo8kf_-txLH4r2En8JljnOXXqCn75SWC00PUFGLeJTidC75xaQ-Mmnv88ai21s2lKbJYD6aDNd6yAW0VLqtM4m_7CvU3sqdv47QvdrM2Gt77JP_RZX4A9jzfzJELtFPtGD7jPiKV32pda7eXl8fkzzl_0yEWbYXeRYYiKLIjiYyPswknlKcOKlqP0UoEXPibSoO87Lhq1enBd0EH-TiHTXqsdIcKc2c6tY8d3LrsjFv5fiAPYeSfqtpfSWIKStru6RCofXADY4LdYvVhY5dhP_lAe55exgaEk3YNCNp_52RXKidXhBBKpo4VadZnbjJzmWf_Rjsxo2qSthm1mfCYmO3BBgouDHWckZyIV2SDiWe2mW_g-T8sbXmorjKqLkuvQsfxy4c5YIiZFynKNej_8u2k1QcORuZHhqpTC_0hMak9NF-A8kG2_hi2kXzRDi4bFh5PL4XDOoXQCDDJI7ejVi8aWGoYsqAp_9qyvnLiCKP2IgCvdh8QKZUAzUmNYmm4HDG3Um9H-qm2PztkokxhQKiHbKWmJ2XzlyYCth41OG8Igxt-B4Yyo-E-PyOx_6vrNXM6kYJbVZ1BWCJD6FvdYx8'
 //        },
 //        accept: 'application/json',
 //        success: function (obj) {
 //        	if(obj){
 //        		window.reload();
 //        	}
 //        }
 //     });
}
function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	  return emailReg.test( $email );
	}
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

//datainsert
		// $('.customercreate').click(function(){
		// 	var submitdaata='http://payarcmp-lb-1305431901.us-east-1.elb.amazonaws.com:9000/api/v1/customers';
		// 	var email = $('#email').val();
		// 	var desc = $('#desc').val();
		// 	var cc_email_address = $('#cc_email_address').val();
		// 	var country = $('#country').val();
		// 	var address_1 = $('#addressline1').val();
		// 	var address_2 = $('#addressline2').val();
		// 	var city = $('#city').val();
		// 	var state = $('#state').val();
		// 	var zip = $('#zip').val();
		// 	var phn = $('#phone').val();
		// 	$.ajax({
		// 		url: submitdaata,
	 //            type: 'POST',
	 //            data: {'email':email,'desc':desc,'cc_email_address':cc_email_address,'country':country,'address_1':address_1,'address_2':address_2,'city':city,'state':state,'zip':zip,'phn':phn},
	 //            headers: {
	 //                'Authorization': '@include('layouts.token')'
	 //            },
	 //            accept: 'application/json',
	 //            success: function (obj) {
	 //            	if(obj){
	 //            		window.reload();
	 //            	}
	 //            }
	 //         });
		// });
	//paymentcharge

	


var QueryString = getRequests();
if(QueryString["page"] || QueryString["page"] !=1){
	var url='http://payarcmp-lb-1305431901.us-east-1.elb.amazonaws.com:9000/api/v1/customers?page='+QueryString["page"];
	}
else {
	var url='http://payarcmp-lb-1305431901.us-east-1.elb.amazonaws.com:9000/api/v1/customers';}
	
$.ajax({
	
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'authorization': '@include('layouts.token')'
            },
            contentType: 'application/json; charset=utf-8',
            success: function (obj) {
               // CallBack(result);
			//console.log(obj['data']);
						$( ".cuscnt tbody" ).empty();
								 for(var i=0;i< obj['data'].length;i++)
								 {
								 	if(obj.data[i].description == null || obj.data[i].description == ''){
								 		var descdata = 'N/A';
								 	}else{
								 		var descdata = obj.data[i].description;
								 	}
								 	if(obj.data[i].card.data == null || obj.data[i].card.data == ''){
								 		var setclass = '';
								 		var setid = '#errornew';
								 		var setmodal = 'modal';
								 	}else{
								 		var setclass = 'cuscharege';
								 		var setmodal = 'popover';
								 	}
									//console.log(obj['data'][i].id);
$('.cuscnt tbody').append('<tr><td class="align-middle"><a href="{{url('customerdetail')}}/'+obj.data[i].id+'" class="cuslinks">'+obj.data[i].id+'</a></td><td class="align-middle">'+obj.data[i].email+'</td><td class="align-middle">'+descdata+'</td><td class=""><ul class="list-unstyled pt-2 ccards"></ul></td><td class="align-middle"><a data-placement="bottom" data-toggle="'+setmodal+'" data-title="Create a new payment" data-container="body" data-html="true" href="javaScript:void(0)" class="cuslinks '+setclass+'" data-original-title="" data-id="'+obj.data[i].id+'" data-target="'+setid+'" title="">Charge</a></td></tr>');
								for(var j=0;j<obj.data[i].card.data.length;j++)
									{
										
										
										$('.currecytype').append('<option value="'+obj.data[i].card.data[j].id+'"><img src="{{asset('assets/images/visa.png')}}" class="img-fluid cusimg" alt="">'+obj.data[i].card.data[j].last4digit+'&nbsp;'+obj.data[i].card.data[j].exp_month+'/'+obj.data[i].card.data[j].exp_year+'</option>');
										
										if(obj.data[i].card.data[j].is_default == 1){
											console.log(obj.data[i].card.data[j]);
										$('.ccards').append('<li><img src="{{asset('assets/images/visa.png')}}" class="img-fluid cusimg" alt="">'+obj.data[i].card.data[j].last4digit+'</li>');
										}
									}
									
								 }
								 if(obj.meta.pagination.links.previous)
								 {
									 $(".cpagination").append('<li class="page-item"><a class="page-link" href="?page='+(obj.meta.pagination.current_page-1)+'">Previous</a></li>');
									}
								 for(var p=1;p<=obj.meta.pagination.total_pages;p++)
								 {
									 $(".cpagination").append('<li class="page-item"><a class="page-link" href="?page='+p+'">'+p+'</a></li>');
								 }
								 if(obj.meta.pagination.links.next)
								 {
									 $(".cpagination").append('<li class="page-item"><a class="page-link" href="?page='+(obj.meta.pagination.current_page+1)+'">Next</a></li>');
									}
            },
            error: function (error) {
                
            }
        });

	
	$(".createcus").click(function(){
			var cemail=$("#cemail").val();
			var cdescription=$("#cdescription").val();
				if(cemail == ""){
					$('.cerror').html('Email is mandatory.');
					}
					else if (!validateEmail(cemail)) {
            			$('.cerror').html('Email is not valid.');
			        }
					else { 
					$.ajax({
            url: 'http://payarcmp-lb-1305431901.us-east-1.elb.amazonaws.com:9000/api/v1/customers?email='+cemail+'&description='+cdescription,
            type: 'POST',
			dataType: 'json',
            headers: {
                'authorization': '@include('layouts.token')'
            },
            contentType: 'application/json; charset=utf-8',
            success: function (obj) {
              $('.cerror').empty();
			  console.log(obj.data);
			  if(obj.data.email !="")
			  {
				  $('.csuccess').html('User added successfully.');
				}
            },
            error: function (error) {
                
            }
        });
					}

			});			
	});
</script>
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-5">
	<div class="row pt-5">
		<div class="col-md-6 col-sm-6 col-xs-6 col-6">
			<h4 class="antitle">Customers</h4>
		</div>
		<div class="col-md-6 text-right">
			<ul>
				<li class="list-inline-item"><a href="#" class="expanc" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus">&nbsp;</i>New</a></li>
				<li class="list-inline-item"><a href="#" class="expanc"><img src="{{asset('assets/images/export.png')}}" alt="" class="img-fluid expimg">Export</a></li>
			</ul>
		</div>
	</div>
    <div class="row">
		<div class="col-md-12">
			<div class="custable">
				<table class="table cuscnt">
					<thead>                                
						<tr>
							<th>ID </th>
							<th>Email </th>
							<th>Description</th>
							<th>Payment Method</th>
							<th>Token</th>
							<th></th>
						</tr>
					</thead>
					<tbody>                                                                                        
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
<div id="popover-content" class="hide" style="display:none">
	<form action="#">
	<div class="form-group row pt-3">
		<label  class="col-3 col-form-label cclabel">Currency: </label>
		<div class="col-8">
			<input type="hidden" id="cusid" class="cusid" value="">
			<select class="form-control ccdrop cuscurtype">
    			<option value="USD">USD - US Dollar</option>
    		</select>
		</div>
	</div>
    <div class="form-group row">
    	<label  class="col-3 col-form-label cclabel">Amount: </label>
    	<div class="col-8">
       		<input type="text" class="form-control" id="mynewcustomamount" value="">
      	</div>
    </div>
    <div class="form-group row">
    	<label  class="col-3 col-form-label cclabel">Description: </label>
  		<div class="col-8">
   			<input type="text" class="form-control cusdesc">
  		</div>
    </div>
    <div class="form-group row">
    	<label  class="col-3 col-form-label cclabel">Statement desc: </label>
      	<div class="col-8">
       		<input type="text" class="form-control cusstatedesc" value="">
      	</div>
    </div>
    <div class="form-group row">
      	<label  class="col-3 col-form-label cclabel">Source: </label>
      	<div class="col-8">
       		<select class="form-control ccdrop currecytype cuscur" value="">
            </select>
      </div>
    </div>
    <div class="text-right-button">
    	<button type="button" class="btn  pdisbtn" id="chargepaymentnew" onclick="chargepaymenttest()">Charge Payment</button>
		<button type="button" class="btn  pdisbtn" data-dismiss="modal">Cancel</button>
	</div>
   
</form>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
	          		<label  class="col-2 col-form-label nclabel">Name: </label>
		          	<div class="col-10">
		           		<input type="text" name="name" id="name" class="form-control">
		          	</div>
	        	</div>
				<div class="form-group row">
	          		<label  class="col-2 col-form-label nclabel">Email: </label>
		          	<div class="col-10">
		           		<input type="email" name="email" id="email" class="form-control">
		          	</div>
	        	</div>
		        <div class="form-group row">
		          	<label  class="col-2 col-form-label nclabel">Description: </label>
		          	<div class="col-10">
		           		<input type="text" name="desc" id="desc" class="form-control">
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
		           		<input type="email" name="to_email" class="form-control">
		          	</div>
	        	</div>
				<div class="form-group row">
	          		<label  class="col-2 col-form-label nclabel">CC: </label>
		          	<div class="col-10">
		           		<input type="email" name="cc" id="cc_email_address" class="form-control">
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
		        <button type="button" class="btn  pdisbtn customercreate">Creat Customer</button>
		        <button type="button" class="btn  pdisbtn" data-dismiss="modal">Cancel</button>
      		</div>
    	</div>
  	</div>
</div>
<div class="modal fade" id="errornew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title newcustomer" id="exampleModalLabel">Alert</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
      		</div>
      		<div class="modal-body">
      			<h5 id="inform">This customer doesn't have any Cards to charge on</h5>
      		</div>
      		<button type="button" class="btn  pdisbtn" data-dismiss="modal">OK</button>
    	</div>
  	</div>
</div>
<script type="text/javascript">

</script>
@endsection