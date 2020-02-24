<style>
 .dropdown-menu li {width:100% !important;padding-right: 0px !important;}
 
 </style>
 <style>*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

label {
  display: block;
  margin-top: 2em;
  margin-bottom: 0.5em;
  color: #999999;
}


button {
  display: inline-block;
  border-radius: 3px;
  border: none;
  font-size: 0.9rem;
  padding: 0.5rem 0.8em;
  background: #69c773;
  border-bottom: 1px solid #498b50;
  color: white;
  -webkit-font-smoothing: antialiased;
  font-weight: bold;
  margin: 0;
  width: 100%;
  text-align: center;
}

button:hover, button:focus {
  opacity: 0.75;
  cursor: pointer;
}

button:active {
  opacity: 1;
  box-shadow: 0 -3px 10px rgba(0, 0, 0, 0.1) inset;
}
</style>
<script>// Get the <datalist> and <input> elements.
var dataList = document.getElementById('json-datalist');
var input = document.getElementById('ajax');

// Create a new XMLHttpRequest.
var request = new XMLHttpRequest();

// Handle state changes for the request.
request.onreadystatechange = function(response) {
  if (request.readyState === 4) {
    if (request.status === 200) {
      // Parse the JSON
      var jsonOptions = JSON.parse(request.responseText);
  
 // alert(request.responseText);
      // Loop over the JSON array.
      jsonOptions.forEach(function(item) {
        // Create a new <option> element.
        var option = document.createElement('option');
        // Set the value using the item in the JSON array.
        option.value = item;
        // Add the <option> element to the <datalist>.
		document.getElementById("json-datalist").appendChild(option);
       // dataList.appendChild(option);
      });
      
      // Update the placeholder text.
      //input.placeholder = "e.g. datalist";
    } else {
      // An error occured :(
     // input.placeholder = "Couldn't load datalist options :(";
    }
  }
};

// Update the placeholder text.
//input.placeholder = "Loading options...";

// Set up and make the request.
request.open('GET', '{{url("/get-all-category")}}', true);
request.send();
</script>
<div class="container">
     <div class="row">
     <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
	  <div class="row mt-30 header-inner">
        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-6 logo">
        <a href="{{ route('public.home')  }}"><img src="{{ asset('assets/images/logo.png') }}"></a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-6 menu">
        <ul class="pull-right ">            
      @if(!Auth::check())
			 <li><a href="{{ url('ask-a-venue-expert') }}">Ask a Venue Expert</a></li>	
                    <li >
                        <a  href="{{ url('login') }}">List Your Venue</a>
                    </li>                   
                    @else
                   <?php /*
						{{ Auth::user()->first_name }} */?>
						 <li  class="dropdown" >
                        <a  href="" class="dropdown-toggle" data-toggle="dropdown">Venues<span class="glyphicon caret"></span></a>
						<ul class="dropdown-menu">
						<li >
                        <a  href="{{ Auth::user()->homeUrl() }}"> My Venue Space</a>
                    </li>
						<li><a  href="{{ url('merchant/add-space') }}">Add Space </a></li>
						<li><a  href="{{ url('merchant/edit-space') }}">Edit Space </a></li>
						<li><a  href="{{ url('merchant/edit-venue') }}">Edit Venue </a></li>
						
						</ul>
						
                    </li>
						 <li >
                        <a  href="{{ url('merchant/enquiry') }}"> Enquiries</a>
                    </li>
					 <li  class="dropdown" >
                        <a  href="" class="dropdown-toggle" data-toggle="dropdown"> Settings <span class="glyphicon caret"></span></a>
						<ul class="dropdown-menu">
						<li><a  href="{{ url('merchant/payment-plan') }}">Payment Plan </a></li>
                        <li><a  href="{{ url('merchant/orders') }}">My Orders</a></li>							
						<li><a  href="{{ url('merchant/edit-profile') }}">Edit Profile </a></li>
						<li><a  href="{{ url('merchant/update-password') }}">Update Password </a></li>
						<li >
                        <a  href="{{ url('logout') }}"> Logout</a>
                    </li>
						</ul>
						
                    </li>
					 
                   
                    
                    @endif
        </ul>
        </div>
       </div>
       <div class="row mt-30 search">
       <div class="col-lg-12">
       <div class="row">
         <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 no_pr">
		 <input type="text" name="" placeholder="Occassion / type" id="ajax" list="json-datalist">
		 <datalist id="json-datalist">
								@foreach ($dmenu as $dmenu)	 
										<option value="{{ $dmenu->c_title }}"></option>
								@endforeach
									
								</datalist>
		 
		 </div> 
		 <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 no_pl no_pr"><input type="text" name="" placeholder="London"></div>
		 <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 no_pl no_pr"><button type="button" class="btn btn-primary">REFINE SEARCH</button></div>
		 <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2"><button type="button" class="btn btn-primary more_fl">More Filters</button></div>
		 
		 <script>$(document).ready(function(){
    $(".more_fl").click(function(){
        $("#filter_venue").fadeToggle("slow");
    });
});</script>
         </div>
		
		 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 filter_venue pt-10" id="filter_venue" >
		 <div class="row">
			 <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 " >
			 <h4>Capacity</h4>
			 
				<ul>
					<li>Banquet</li>
					<li>U-Shape</li>
					<li>Theatre</li>
					<li>Hollow</li>
					<li>Classroom</li>
					<li>Boardroom</li>
					<li>Reception</li>
				</ul>
			 </div>
			 
			 <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 " >
			 <h4>Features</h4>
			 <ul>
					<li>Banquet</li>
					<li>U-Shape</li>
					<li>Theatre</li>
					<li>Hollow</li>
					<li>Classroom</li>
					<li>Boardroom</li>
					<li>Reception</li>
				</ul>
			 </div>
			 
			 <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 " >
			 <h4>Food & Drink</h4>
			 <ul>
					<li>Banquet</li>
					<li>U-Shape</li>
					<li>Theatre</li>
					<li>Hollow</li>
					<li>Classroom</li>
					<li>Boardroom</li>
					<li>Reception</li>
				</ul>
			 </div>
			 
			 <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 " >
			 <h4>Licensing</h4>
			 <ul>
					<li>Banquet</li>
					<li>U-Shape</li>
					<li>Theatre</li>
					<li>Hollow</li>
					<li>Classroom</li>
					<li>Boardroom</li>
					<li>Reception</li>
				</ul>
			 </div>
			 <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 " >
			 <h4>Restrictions</h4>
			 <ul>
					<li>Banquet</li>
					<li>U-Shape</li>
					<li>Theatre</li>
					<li>Hollow</li>
					<li>Classroom</li>
					<li>Boardroom</li>
					<li>Reception</li>
				</ul>
			 </div>
			 <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 " > 
			 &nbsp;<br />
			 &nbsp;<br />
			 &nbsp;<br />
			 &nbsp;<br />
			 &nbsp;<br />
			 &nbsp;<br />
			 &nbsp;<br />
			 &nbsp;<br />
			 &nbsp;<br />
			 <button type="button" class="btn btn-primary more_fl">Search</button></div>
		  </div>
<!--		 
Wi-Fi
Free Parking
Disabled Access
Natural Daylight -->
		 </div>
		 
        </div>        
       </div>
	 </div>
        </div>        
       </div>