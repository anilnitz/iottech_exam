<!doctype html>
<html >
    <head>
@include('Admin.partials.header')        
    </head> 
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">    
@include('Admin.partials.navbar')     

@yield('content')

@include('Admin.partials.footer') 
 
	</body>
</html> 