@extends('layouts.app')

@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-5">
    <div class="row pt-5">
    	<div class="col-md-3 col-sm-3 col-xs-3 col-3">
        	<h4 class="antitle">rex.jozf@gmail.com</h4>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3 col-3">
            	<h6 class="cuslisttoken">cus_C9XpeMfNR8KMjj</h6>
        </div>
      	<div class="col-md-6 text-right">
        	<ul>
            	<li class="list-inline-item"><a href="#" class="expanc" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-close" style="font-size:12px;color:red">&nbsp;</i>Delete</a></li>
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
		            	<h5 class="cusdettitle"><i class="fa fa-pencil" style="color:#e68300;"></i> Updated Details</h5>
		            </div>
	        	</div>
	            <div class="row p-3 pl-4 ">
	            	<div class="col-md-6 col-ms-6 col-xs-6 col-6">
	                	<h6 class="pb-3 cusaccounthd">Account Information</h6>
	                    <div class="form-group row">
	                    	<div class="col-4 cusaccntcnt">ID</div>
	                        <div class="col-6 cusaccntcnt">cus_C9XpeMfNR8KMjj</div>
	                    </div>
	                    <div class="form-group row">
	                    	<div class="col-4 cusaccntcnt">Created</div>
	                        <div class="col-6 cusaccntcnt">2018/01/17 16:36</div>
	                    </div>
	                    <div class="form-group row">
	                    	<div class="col-4 cusaccntcnt">Email</div>
	                        <div class="col-6 cusaccntcnt">rex.jozf@gmail.com</div>
	                    </div>
	                    <div class="form-group row">
	                    	<div class="col-4 cusaccntcnt">Description</div>
	                        <div class="col-6 cusaccntcnt">test</div>
	                    </div>
	                </div>
	                <div class="col-md-6 col-ms-6 col-xs-6 col-6">
	                	<h6 class="pb-3 cusaccounthd">Invoicing Settings</h6>
		                <div class="form-group row">
		                    <div class="col-4 cusaccntcnt">Send invoices to</div>
		                    <div class="col-6 cusaccntcnt">rex.jozf@gmail.com</div>
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
	                	<ul class="list-inline">
	                    	<li class="list-inline-item"><img src="{{asset('assets/images/visa.png')}}" alt="" width="35"></li>
	                        <li class="list-inline-item">4242</li>
	                        <li class="list-inline-item">12/2018</li>
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
	                	<table class="table borderless cuspaylist">
	                      <tbody>
	                        <tr>
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
	                        </tr>
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
		            	<h5 class="cusdettitle"><i class="fa fa-plus" style="color:#00c73d;">&nbsp;</i>Add Subscription</h5>
		            </div>
		        </div>
	            <div class="row">
	            	<div class="col-md-12 table-responsive pl-4">
	                	<table class="table borderless cuspaylist">
	                      <tbody>
	                        <tr>
	                          <td><span class="cusblue">Test6 ($9.00/Day)</span></td>
	                          
	                          <td class="text-right"><span class="cusdefault">Active</span></td>
	                        </tr>
	                      
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
	           		<input type="text" class="form-control">
	          	</div>
	           	<div class="col-3">
	           		<input type="text" class="form-control" placeholder="MM/YY">
	          	</div>
	           	<div class="col-2">
	           		<input type="text" class="form-control" placeholder="CCV">
	          	</div>
        	</div>
            <div class="form-group row">
              <label  class="col-3 col-form-label cclabel">Cardholder name: </label>
              <div class="col-8">
               		<input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-3 col-form-label cclabel">Street: </label>
              <div class="col-8">
               		<input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-3 col-form-label cclabel">Street (line2) </label>
              <div class="col-8">
               		<input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-3 col-form-label cclabel">City: </label>
              <div class="col-8">
               		<input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-3 col-form-label cclabel">Zip/Postal: </label>
              <div class="col-8">
               		<input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-3 col-form-label cclabel">State/Province: </label>
              <div class="col-8">
               		<input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-3 col-form-label cclabel">Country: </label>
              <div class="col-8">
               		<input type="text" class="form-control">
              </div>
            </div>
        	<button type="button" class="btn  pdisbtn">Add Card</button>
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
@endsection