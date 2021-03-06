
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nepali Adsense</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <script src="{{URL::asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Theme CSS -->
    <link href="{{URL::asset('assets/css/agency.min.css')}}" rel="stylesheet">
        <!-- Google web fonts -->
    <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
    <!-- bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified Jasny CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <!-- The main CSS file -->
    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

</head>
<!--   
kharel boko kti pauni dhoko

-->

<body id="page-top" class="index">
        @if(!Auth::check())
		  @include('templates.nav.home')
        @elseif(Auth::check())
          @include('templates.nav.forall')
        @endif
<div class="container">
		@yield('content')
</div>

		@include('templates.footer')
   
   <script src="{{URL::asset('assets/vendor/jquery/jquery.min.js')}}"></script>
   <script src="{{URL::asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>
    <script src="{{URL::asset('assets/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{URL::asset('assets/js/contact_me.js')}}"></script>
    <script src="{{URL::asset('assets/js/agency.min.js')}}"></script>
              <!-- JavaScript Includes -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="{{URL::asset('assets/js/jquery.knob.js')}}"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

        <!-- jQuery File Upload Dependencies -->
        <script src="{{URL::asset('assets/js/jquery.ui.widget.js')}}"></script>
        <script src="{{URL::asset('assets/js/jquery.iframe-transport.js')}}"></script>
        <script src="{{URL::asset('assets/js/jquery.fileupload.js')}}"></script>
        
        <!-- Our main JS file -->
        <script src="{{URL::asset('assets/js/script.js')}}"></script>

        <!-- Only used for the demos. Please ignore and remove. --> 
         <script src="http://cdn.tutorialzine.com/misc/enhance/v1.js" async></script>


</body>

</html>
