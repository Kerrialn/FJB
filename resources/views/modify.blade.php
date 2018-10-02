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
      
       
    
 <div class="card-panel">
    <h5>Edit Vacancy</h5>
        <form method="post" action="{{ route('save.edit.vacancy', $job->id) }}">
          @csrf

        <div class="row">
          <div class="col m6">
            <div class="input-field">
              <input placeholder="" id="title" name="title" type="text" class="validate" value="{{ $job->title }}" >
              <label for="title">Vacancy title</label>
            </div>
          </div>
          <div class="col m6 right-align">
            <div class="input-field">
              <input placeholder="" id="company_name" name="company_name" type="text" class="validate" value="{{ $job->company_name }}">
              <label for="company_name">Company</label>
            </div>
          </div>
          <div class="col m12">
            <div class="input-field">
              <textarea placeholder="" id="description" name="description" class="materialize-textarea">{{ $job->description }}</textarea>
              <label for="description">Description & Responsibilities</label>
            </div>
          </div>
          <div class="col m6">
            <div class="input-field">
              <input placeholder="" id="application_emailaddress" name="email" type="email" class="validate" value="{{ $job->email }}">
              <label for="application_emailaddress">Email address</label>
              <span class="helper-text">Where should candidates send their CV?</span>
            </div> 
          </div>
          <div class="col m6">
            <div class="input-field">
              <input placeholder="" id="link" name="apply_link" type="url" class="validate"  value="{{ $job->apply_link }}">
              <label for="link">Application link (optional)</label>
            </div> 
          </div>

          <div class="col m12 s12 right-align">
            <button type="submit" class="btn grey">save</button>
          </div>
        </div>

        </form>     
  </div>            
    </div>
@endsection

