<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
	<title>Wokiee - Responsive HTML5 Template</title>
	<meta name="keywords" content="HTML5 Template">
	<meta name="description" content="Wokiee - Responsive HTML5 Template">
	<meta name="author" content="wokiee">
	<link rel="shortcut icon" href="favicon.ico">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="{{asset('/shopping/css/style.css')}}">

  <link rel="stylesheet" href="{{asset('/slider/css/main.css')}}">

  @yield('css')

  </head>
  <body class="goto-here">
    <div id="loader-wrapper">
      <div id="loader">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
      </div>
    </div>

        @include('includes.shopping.header')

    
        
          

            <div class="my-3">
              @if ($message = Session::get('success'))
                  <div class="modal  show" style="display: block;"  id="ModalShowSuccess" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-s">
                      <div class="modal-content ">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                        </div>
                        <div class="modal-body">
                          <div class="tt-modal-subsribe-good">
                            <i class="icon-f-68"></i> {{ $message }} !
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              @endif
              @if ($message = Session::get('error'))
                <div class="modal  show" style="display: block;"  id="ModalShowError" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-s">
                      <div class="modal-content ">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                        </div>
                        <div class="modal-body">
                          <div class="tt-modal-subsribe-good">
                            <i class="icon-f-67" style="color:#f44336;"></i> {{ $message }} !
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              @endif


              @if($errors->any())
                {!! implode('', $errors->all('
                  <div class="modal  show" style="display: block;"  id="ModalShowErrors" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xs">
                      <div class="modal-content ">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
                        </div>
                        <div class="modal-body">
                          <div class="tt-modal-subsribe-good">
                            <i class="icon-f-67" style="color:#f44336"></i> :message !
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                ')) !!}
              @endif
            </div>



            @yield('content')
          

        <!--Footer-->

        @include('includes.shopping.footer')


      <!-- End Footer-->

  <div class="modal  fade" id="dispayErrorMessage" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-s">
      <div class="modal-content ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
        </div>
        <div class="modal-body">
          <div class="tt-modal-subsribe-good">
            <i class="icon-f-67" style="color:#f44336;"></i> Oops... Something bad happened, Please Try again later!
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal  fade" id="dispaySuccessMessage" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-s">
      <div class="modal-content ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
        </div>
        <div class="modal-body">
          <div class="tt-modal-subsribe-good">
            <i class="icon-f-68"></i> Your are Good to go...!
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="{{asset('/shopping/js/2.2.4/jquery.min.js')}}"></script>
  <script>window.jQuery || document.write('<script src="{{asset(`/shopping/external/jquery/jquery.min.js`)}}"><\/script>')</script>
  <script defer src="{{asset('/shopping/js/bundle.js')}}"></script>
  <script>

    $(document).on('click','.close', function(){
      $('#ModalShowError').fadeOut('slow');
      $('#ModalShowSuccess').fadeOut('slow');
      $('#ModalShowErrors').fadeOut('slow');
      $('#displayErrorMessage').fadeOut('slow');
      $('#displaySuccessMessage').fadeOut('slow');
    })

  </script>

  @yield('js')
  
  <a href="#" class="tt-back-to-top" id="js-back-to-top">BACK TO TOP</a>
    
  </body>
</html>
