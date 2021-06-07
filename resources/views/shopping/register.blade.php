@extends('layouts.index')

@section('content')

<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="{{url('/')}}">Home</a></li>
			<li>Register</li>
		</ul>
	</div>
</div>

<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder">CREATE AN ACCOUNT</h1>
			<div class="tt-login-form">
				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-6">
						<div class="tt-item">
							<h2 class="tt-title">PERSONAL INFORMATION</h2>
              
              <div class="tt-required">* Required Fields</div>
            
							<div class="form-default">

                <form class="billing-form" action="{{route('register.store')}}" method="POST" id="contactform" novalidate="novalidate">
                @csrf
                
                  <div class="row align-items-end">
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                      </div>
                    </div>

                    <div class="w-100"></div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastname">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                    </div>
                  
                    <div class="w-100"></div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="streetaddress">Street Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Address" required>
                      </div>
                    </div>
                    
                    <div class="w-100"></div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="towncity">Town / City</label>
                        <input type="text" name="city" class="form-control" placeholder="Town / City" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="postcodezip">Postcode / ZIP *</label>
                        <input type="number" name="pincode" class="form-control" placeholder="Postcode" required>
                      </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control" placeholder="Phone" required>
                      </div>
                    </div>
                    
                    <div class="w-100"></div>
                    <button type="submit" class="btn btn-border">
                        Register
                    </button>
                  </div>
                </form><!-- END -->
              </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@stop


@section('js')

        <script type="text/javascript">


            
        </script>

@stop