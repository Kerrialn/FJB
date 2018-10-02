@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
      <div class="col m8 offset-m2">
      <div class="card-panel">
        <h5 class="header">Create vacancy</h5>
        <form method="post" action="{{ route('create.vacancy') }}">
          @csrf

        <div class="row">
          <div class="col m6">
            <div class="input-field">
              <input placeholder="" id="title" name="title" type="text" class="validate">
              <label for="title">Vacancy title</label>
            </div>
          </div>
          <div class="col m6 right-align">
            <div class="input-field">
              <input placeholder="" id="company_name" name="company_name" type="text" class="validate">
              <label for="company_name">Company</label>
            </div>
          </div>
          <div class="col m12">
            <div class="input-field">
              <textarea placeholder="" id="description" name="description" class="materialize-textarea"></textarea>
              <label for="description">Description & Responsibilities</label>
            </div>
          </div>
          <div class="col m6">
            <div class="input-field">
              <input placeholder="" id="application_emailaddress" name="email" type="email" class="validate">
              <label for="application_emailaddress">Email address</label>
              <span class="helper-text">Where should candidates send their CV?</span>
            </div> 
          </div>
          <div class="col m6">
            <div class="input-field">
              <input placeholder="" id="link" name="apply_link" type="text" class="validate">
              <label for="link">Application link (optional)</label>
            </div> 
          </div>

          <div class="col m12 s12 right-align">
            <button type="submit" class="btn grey">Submit</button>
          </div>
        </div>

        </form>
      </div> 
      </div>        
      </div>  
    </div>

@endsection

