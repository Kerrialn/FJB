@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row mt-1">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- fjb-search -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-7870205334974711"
             data-ad-slot="3542344052"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>                
            </div>        
        <div class="row">
            <div class="col m6 s12 offset-m3">
                <div class="input-field">
                  <i class="material-icons prefix">search</i>
                  <input placeholder="Search vacancies" id="search-input" name="search" type="search" class="" autocomplete="off">
                  <label for="search-input"></label>
                </div>          
            </div>
        </div>

        <div class="row">
        <div class="col s12 cards-container" id="search_results">
  

      <div class="card">
        <div class="card-image">
          <img src="imgs/login_banner.png">
          <a href="/register" class="btn-floating btn-large halfway-fab waves-effect waves-light blue tooltipped" data-position="top" data-tooltip="Sign up now"><i class="material-icons">person_add</i></a>
          <span class="card-title">Register now!</span>
        </div>
        <div class="card-content">
          <p>Register and gain access to a bunch of free features. such as one-click apply, bookmarking and more..</p>
        </div>
      </div>

  
 
        @foreach($jobs as $job)
        
        <a class="no-link" href="{{ route('job', $job->id) }}">
          <div class="card">
              <div class="card-action bb-1 fjb-color white-text">
                <span class="card-title">
                    <div class="title">{{ $job->title }}</div>
                    <i>{{ $job->company_name }}</i>
                </span>
              </div>
            <div class="card-content">
              <p class="content">{{ str_limit($job->description, 200) }}</p>
            </div>
            <div class="card-action">
              <div class="row m-0">
                  <div class="col m6 s6">
                  @if(strtotime($job->created_at) > strtotime('-1 day'))
                  <div class="chip teal white-text">new vacancy</div>
                  @endif                    
                  </div>
                  <div class="col m6 s6 right-align">
                     <div class="chip tooltipped" data-position="bottom" data-tooltip="Created"> {{ $job->created_at->diffForHumans() }}</div>
                  </div>
              </div>
            </div>
          </div>
        </a>
        @endforeach
    
        </div>     
        </div>     
    </div>

<script type="text/javascript">
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#search-input").keyup(function(){
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/search',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, search: $("#search-input").val(), },
                    
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                         
                             $('#search_results').html(data);

                    }
                }); 
            });
       });    
</script>

@endsection

