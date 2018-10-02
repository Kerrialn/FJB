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
                  @auth
                   @if(count($job->bookmarks) == 0)
                   <div class="fixed-action-btn">
                       <a class="btn-floating btn-large waves-effect waves-light red trigger tooltipped" data-position="left" data-tooltip="Bookmark"><i class="material-icons">favorite_border</i></a>
                        <form class="" method="post" action="{{ route('bookmark.job', $job->id) }}">
                          @csrf
                      </form>
                   </div>
                      @else
                    <div class="fixed-action-btn">
                       <a class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="left" data-tooltip="Already Bookmarked"><i class="material-icons">favorite</i></a>
                   </div>                       
                     
                     @endif
                  @endauth        
        
        
      <div class="card-panel">
        @if($job->public == 1)
        <div class="row">
          <div class="col m6 s6">
            <h5 class="m-0">{{ $job->title }}</h5>
            <span class="tooltipped" data-position="bottom" data-tooltip="Company">{{ $job->company_name }}</span>
          </div>
          <div class="col m6 s6 right-align">
            <span class="tooltipped" data-position="bottom" data-tooltip="Date posted">{{ $job->created_at->format('d.m.Y - H:i') }}</span>
          </div>
          <div class="col m12">
           <p class="content bb-1 pb-2">{{ $job->description }}</p> 
           @guest
           @if($job->email)
          <div class="center-align col m12">
             <h5 class="tooltipped flow-text" data-position="bottom" data-tooltip="Application email address">{{ $job->email }}</h5>
          </div>
          @else
         <div class="center-align col m12">
              <a href="{{ url($job->apply_link) }}" target="_BLANK" class="btn blue tooltipped" data-position="bottom" data-tooltip="Apply link">Contiune application</a>
          </div>
          @endif
          @endguest
          @auth
             @if(Auth::user()->cv_path)
             <div class="row">
               <div class="col m6 s12 center-align">
                 <b class="tooltipped" data-position="bottom" data-tooltip="Application email address flow-text">{{ $job->email }}</b>
               </div>
               <div class="col m6 s12 right-align">
                 <form method="post" action="{{ route('apply.job',  $job->id ) }}">
                   @csrf
                   <button type="submit" class="btn-floating btn-large waves-effect waves-light blue tooltipped"  data-position="bottom" data-tooltip="Apply"> <i class="material-icons">send</i></button>
                 </form>
               </div>
             </div>
             @else
             
                   @if($job->email)
                  <div class="center-align">
                     <h5 class="tooltipped" data-position="bottom" data-tooltip="Application email address">{{ $job->email }}</h5>
                     <a href="/home"><small>Please upload a cv to use one-click apply</small></a>
                  </div>
                  @else
                 <div class="center-align">
                     <a href="{{ url($job->apply_link) }}" target="_BLANK" class="btn blue tooltipped" data-position="bottom" data-tooltip="Apply link">Contiune application</a>
                  </div>
                  @endif             

             @endif           
           @endauth
          </div>
        </div>
        @elseif($job->public == 0)
        <h5 class="grey-text center-align">Vacancy Under review</h5>
        @else
        <h5 class="grey-text center-align">Ops... nothing found</h5>
        @endif
      </div>   
    </div>
@endsection

