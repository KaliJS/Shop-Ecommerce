@extends('layouts.index')

@section('content')

<div class="tt-breadcrumb">
	<div class="container">
		<ul>
			<li><a href="{{url('/')}}">Home</a></li>
			<li>Login</li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder">ALREADY REGISTERED?</h1>
			<div class="tt-login-form">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="tt-item">
							<h2 class="tt-title">NEW CUSTOMER</h2>
							<p>
								By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.
							</p>
							<div class="form-group">
								<a href="{{ url('register')}}" class="btn btn-top btn-border">CREATE AN ACCOUNT</a>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="tt-item">
							<h2 class="tt-title">LOGIN</h2>
							If you have an account with us, please log in.
							<div class="form-default form-top">
								<form id="customer_login" method="POST" action="{{ route('login') }}" novalidate="novalidate">                     
                                     @csrf
									<div class="form-group">
										<label for="loginInputName">E-MAIL *</label>
										<div class="tt-required">* Required Fields</div>
										
                                        <input id="email" type="email" id="loginInputName" placeholder="Enter E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
									<div class="form-group">
										<label for="loginInputEmail">PASSWORD *</label>
										
                                        <input id="password" type="password" id="loginInputEmail" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
									<div class="row">
										<div class="col-auto mr-auto">
											<div class="form-group">
                                            <button type="submit" class="btn btn-border">
                                                LOGIN
                                            </button>
											</div>
                    

                                            

										</div>
										<div class="col-auto align-self-end">
											<div class="form-group">
												<ul class="additional-links">
													<li>
                                                    @if (Route::has('password.request'))
                                                        <a class="btn-link" href="{{ route('password.request') }}">
                                                        Forget your password?
                                                        </a>
                                                    @endif
                                                    </li>
												</ul>
											</div>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
