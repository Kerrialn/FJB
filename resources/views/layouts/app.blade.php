<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <META NAME="Title" CONTENT="Find Job Baku">
    <META NAME="Keywords" CONTENT="Find job baku, FJB, job, jobsearch, hr, recruitment, employment, vacancy, website in Azerbaijan, IRES, employment agency, поиск работы, вакансии, побор кадров, ires, isheduzeltme, kadrlar, vakansiyalar">
    <META NAME="Description" CONTENT="We offer companies a place to find candidate and candidates a place to apply for jobs.">
    <META NAME="Subject" CONTENT="employment">
    <META NAME="Language" CONTENT="English">

<link rel="shortcut icon" type="image/png" href="imgs/logo.ico"/>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dropzone.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-7870205334974711",
          enable_page_level_ads: true
     });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125787082-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125787082-2');
</script>

</head>
<style type="text/css">
.h-300{
    height:270px;    
}
.fjb-color{background-color: #1e90ff!important;}
.bb-1{border-bottom: 1px solid rgba(160, 160, 160, 0.2);}
.tabs .tab a {
    color: rgba(0, 0, 0, 0.7);
}
.tabs .tab a:focus, .tabs .tab a:focus.active {
    background-color: transparent;
    outline: none;
}
.tabs .tab a:hover, .tabs .tab a.active {
    background-color: transparent;
    color: #1e90ff;
}
.tabs .indicator {
    position: absolute;
    bottom: 0;
    height: 2px;
    background-color: #1e90ff;
    will-change: left, right;
}
.hidden{display: none;}
.bb-1{border-bottom: 1px solid #eee}
.content{white-space:pre-line;}
.p-0{padding:0px!important;}
.p-1{padding:10px;}
.mt-1{margin-top:10px;}
.pb-2{padding-bottom: 20px;}
.m-0{margin: 0px;}
.w-100{width:100%}
    .nav{background-color: #1e90ff}
    .buffer{width:100%;height:80px;background-color:#1e90ff;}
    .header{
    display: block;
    line-height: 32px;
    margin-bottom: 35px;
    }
    .user-inline{font-size:12px;}
    .no-link{text-decoration: none;color:#333;}
    .card-title .title{line-height:1;font-size:15px;margin:0px;font-weight:bold;}
    .card-title i{line-height:1;font-size: 15px;}
.card .card-image .card-title {
    color: #fff;
    position: absolute;
    bottom: 0;
    left: 0;
    max-width: 100%;
    padding: 0 5%;
}
.dropzone {
    border: 2px dashed #0087F7;
    border-radius: 5px;
    background: white;
}
.submitLink {
  background-color: transparent;
  text-decoration: none;
  border: none;
  color: #039be5;
  cursor: pointer;
  padding: 0px;
}
.submitLink:focus {
  outline: none;
  background-color: transparent;
  text-decoration: none;

}
main{min-height:90vh;}
.pagination li.active {
    background-color: #1e90ff;
}

.input-field .prefix.active {
    color: #1e90ff;
}
</style>
<body>
<div id="app">
  <nav class="nav">
    <div class="nav-wrapper container">
      <a href="/" class="brand-logo">FJB</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        @guest
        <li><a href="/" class="tooltipped" data-position="bottom" data-tooltip="Search"><i class="material-icons">search</i></a></li>
        <li><a href="/create" class="tooltipped" data-position="bottom" data-tooltip="Create job"><i class="material-icons">create</i></a></li>
        <li><a href="/login" class="tooltipped" data-position="bottom" data-tooltip="Login"><i class="material-icons">person</i></a></li>
        <li><a href="/register" class="tooltipped" data-position="bottom" data-tooltip="Register"><i class="material-icons">person_add</i></a></li>
        @else
        <li><a href="/home" class="tooltipped" data-position="bottom" data-tooltip="{{ Auth::user()->first_name }}"><i class="material-icons">account_circle</i></a></li>
        <li><a href="/" class="tooltipped" data-position="bottom" data-tooltip="Search"><i class="material-icons">search</i></a></li>
        <li><a href="/create" class="tooltipped" data-position="bottom" data-tooltip="Create job"><i class="material-icons">create</i></a></li>
        <li><a href="/logout" class="tooltipped" data-position="bottom" data-tooltip="Logout"><i class="material-icons">exit_to_app</i></a></li>
         @endguest
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    @guest
    <li><a href="/"><i class="material-icons">search</i>Search</a></li>
    <li><a href="/create"><i class="material-icons">create</i>Create advert</a></li>
    <li><div class="divider"></div></li>
    <li><a href="/login"><i class="material-icons">person</i>Login</a></li>
    <li><a href="/register"><i class="material-icons">person_add</i>Register</a></li>
    @else
    <li><a href="/home"><i class="material-icons">account_circle</i> {{ Auth::user()->first_name }} </a></li>
    <li><a href="/"><i class="material-icons">search</i>Search</a></li>
    <li><a href="/create"><i class="material-icons">create</i>Create advert</a></li>
    <li><div class="divider"></div></li>
    <li><a href="/logout"><i class="material-icons">exit_to_app</i>Logout</a></li>
    @endguest
  </ul>



        <main class="py-4">
            @yield('content')
        </main>
 

        <footer class="page-footer grey">
          <div class="footer-copyright">
            <div class="container center-align">
            © 2018 Copyright findjobbaku.org
            <a class="grey-text text-lighten-4 right" href="#!"></a>
            </div>
          </div>
        </footer>





    </div>

<script type="text/javascript">
  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });    
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>

@if(session()->has('message'))
<script>
$(document).ready(function(){   
M.toast({html: '{{ session()->get('message') }}' })
});
</script>
@endif


@if($errors->any())
   @foreach ($errors->all() as $error)

<script>
$(document).ready(function(){   
M.toast({html: '{{ $error }}' })
});
</script>

  @endforeach
@endif 

<script type="text/javascript">
  $(document).ready(function(){
    $('a.trigger').click(function(evt){
      evt.preventDefault();
      $(this).next('form').submit();
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.tabs').tabs();
  });
</script>
<script>
  $(document).ready(function(){
    $('.fixed-action-btn').floatingActionButton();
  });    
</script>
<script>
  $(document).ready(function(){
    $('select').formSelect();
  });
</script>
<script>
  $(document).ready(function(){
    $('.datepicker').datepicker({
        format: 'yy-m-d', 
    });
  });
</script>

</body>
</html>
