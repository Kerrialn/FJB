@extends('layouts.app')

@section('content')
<div class="container">
    
@if(Auth::user()->account_type != 'admin')
   <div class="card-panel">
      
      <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#profile">Profile</a></li>
        <li class="tab col s3"><a href="#applications">Applications</a></li>
        <li class="tab col s3"><a href="#vacancies">Vacancies</a></li>
        <li class="tab col s3"><a href="#saved">Saved</a></li>
      </ul>
    </div>
    
<div id="profile" class="col s12">
  
<form method="post" action="{{ route('user.update') }}">
    @csrf
    <div class="input-field col s12">
            <input placeholder="" id="first_name" name="first_name" type="text" class="validate" value="{{ Auth::user()->first_name }}">
            <label for="first_name">First Name</label>
    </div>    
    <div class="input-field col s12">
            <input placeholder="" id="last_name" name="last_name" type="text" class="validate" value="{{ Auth::user()->last_name }}">
            <label for="last_name">Last Name</label>
    </div>  
 
 <div class="input-field col m6 s6">

<select name="industry" id="industry">
@if(Auth::user()->industry)
<option value="" disabled selected>{{ Auth::user()->industry }}</option>
@else
<option value="" disabled selected>Choose an Industry</option>
@endif 

<optgroup label="Aerospace industry">
<option value="Aerospace industry">Aerospace industry</option>
</optgroup>

<optgroup label="Agriculture">
<option value="Agriculture">Agriculture</option>
<option value="Fishing industry">Fishing industry</option>
<option value="Timber industry">Timber industry</option>
<option value="Tobacco industry">Tobacco industry</option>
</optgroup>


<optgroup label="Chemical industry">
<option value="Chemical industry">Chemical industry</option>
<option value="Pharmaceutical industry">Pharmaceutical industry</option>
</optgroup>

<optgroup label="Computer industry">
<option value="Computer industry">Computer industry</option>
<option value="Software industry">Software industry</option>
</optgroup>

<optgroup label="Construction industry">
<option value="Construction industry">Construction industry</option>
</optgroup>

<optgroup label="Defense industry">
<option value="Defense industry">Defense industry</option>
<option value="Arms industry">Arms industry</option>
</optgroup>

<option value="Education industry">Education industry</option>

<optgroup label="Energy industry">
<option value="Energy industry">Energy industry</option>
<option value="Electrical power industry">Electrical power industry</option>
<option value="Petroleum industry">Petroleum industry</option>
</optgroup>

<optgroup label="Entertainment industry">
<option value="Entertainment industry">Entertainment industry</option>
</optgroup>

<optgroup label="Financial services industry">
<option value="Financial services industry">Financial services industry</option>
<option value="Insurance industry">Insurance industry</option>
</optgroup>

<optgroup label="Food industry">
<option value="Food industry">Food industry</option>
<option value="Fruit production">Fruit production</option>
</optgroup>

<optgroup label="Health care industry">
<option value="Health care industry">Health care industry</option>
</optgroup>
<optgroup label="Hospitality industry">
<option value="Hospitality industry">Hospitality industry</option>
</optgroup>
<optgroup label="Information industry">
<option value="Information industry">Information industry</option>
</optgroup>

<optgroup label="Manufacturing">
<option value="Manufacturing">Manufacturing</option>
<option value="Automotive industry">Automotive industry</option>
<option value="Electronics industry">Electronics industry</option>
<option value="Pulp and paper industry">Pulp and paper industry</option>
<option value="Steel industry">Steel industry</option>
<option value="Shipbuilding industry">Shipbuilding industry</option>
</optgroup>

<optgroup label="Mass media">
<option value="Mass media">Mass media</option>
<option value="Broadcasting">Broadcasting</option>
<option value="Film industry">Film industry</option>
<option value="Music industry">Music industry</option>
<option value="News media">News media</option>
<option value="Publishing">Publishing</option>
<option value="World Wide Web">World Wide Web</option>
</optgroup>

<optgroup label="Mining">
<option value="Mining">Mining</option>
</optgroup>

<optgroup label="Telecommunications industry">
<option value="Telecommunications industry">Telecommunications industry</option>
<option value="Internet">Internet</option>
</optgroup>

<optgroup label="Transport industry">
<option value="Transport industry">Transport industry</option>
</optgroup>
<optgroup label="Water industry">
<option value="Water industry">Water industry</option>
</optgroup>
<optgroup label="Direct Selling industry">
<option value="Direct Selling industry ">Direct Selling industry </option>
</optgroup>
</select>
<label>Indutry</label>
 </div>

    
  
    
     <div class="input-field col m6 s12">
            <input placeholder="" id="profession" type="text" name="profession" class="validate" value="{{ Auth::user()->profession }}">
            <label for="profession">Profession</label>
    </div>    
    <div class="input-field col s12">
            <input placeholder="" id="phone" type="text" name="phone" class="validate" value="{{ Auth::user()->phone }}">
            <label for="phone">Phone</label>
    </div>  
    <div class="input-field col s12">
            <input placeholder="" id="email" type="email" name="email" class="validate" value="{{ Auth::user()->email }}">
            <label for="phone">Email</label>
    </div>  
    <div class="right-align">
        <button class="btn grey" type="submit">Save</button>
    </div>
</form>

@if(empty(Auth::user()->cv_path))

    <b>Upload your resume (PDF)</b>
    <form action="{{ route('upload.cv') }}" class="dropzone" enctype="multipart/form-data">
            @csrf
    </form>
@endif      
 </div>
 
@if(!empty(Auth::user()->cv_path)) 
  <div class="fixed-action-btn">
      <a class="btn-floating btn-large red">
        <i class="large material-icons">account_circle</i>
      </a>
      <ul>
        <li><a class="btn-floating blue tooltipped" data-position="left" data-tooltip="Open resume" target="_BLANK" href="resumes/{{ Auth::user()->cv_path }}"><i class="material-icons">open_in_new</i></a></li>
        
        
        <li><a class="btn-floating red trigger tooltipped" data-position="left" data-tooltip="Delete resume"><i class="material-icons">delete</i></a>
                  <form class="m-0 hidden" method="post" action="{{ route('delete.cv') }}">
              @csrf
             </form> 
        </li>
        
      </ul>
    </div>
  @endif
  
    <div id="applications" class="col s12">
      @if($applications)  
      <table>
        <thead>
          <tr>
              <th>Title</th>
              <th>Company</th>
              <th>Created</th>
          </tr>
        </thead>

        <tbody>
        @forelse($applications as $application) 
          <tr>
            <td>{{ $application->job->title }}</td>
            <td>{{ $application->job->company_name }}</td>
            <td>{{ $application->created_at->diffForHumans() }}</td>
          </tr>
        @empty
        <tr>
            <td></td>
            <td class="grey-text"> No application found... </td>
            <td></td>
        </tr>
        @endforelse  
        </tbody>
      </table>
    @endif
        
    </div>
    
    <div id="vacancies" class="col s12">
      
           <table>
        <thead>
          <tr>
              <th>Title</th>
              <th>Company</th>
              <th>Status</th>
              <th>Created</th>
          </tr>
        </thead>

        <tbody>
        @forelse($jobs_created as $job_created) 
          <tr>
            <td>{{ $job_created->title }}</td>
            <td>{{  $job_created->company_name }}</td>
            <td>
            @if($job_created->public == 0)
            <i class="material-icons tooltipped" data-position="top" data-tooltip="Pending review" >access_time</i>
            @elseif($job_created->public == 1)
            
            <i class="material-icons tooltipped"data-position="top" data-tooltip="Vacancy active" >check</i>
            @else
            <i class="material-icons tooltipped"data-position="top" data-tooltip="Vacancy rejected" >close</i>
            @endif
            </td>
            <td>{{ $job_created->created_at->diffForHumans() }}</td>
          </tr>
        @empty
        <tr>
            <td></td>
            <td></td>
            <td class="grey-text"> No vacancies posted yet... </td>
            <td></td>
        </tr>
        @endforelse  
        </tbody>
      </table>


    {{ $jobs_created->links() }}    
        
    </div>
    <div id="saved" class="col s12">
      @if($applications)  
      <table>
        <thead>
          <tr>
              <th>Title</th>
              <th>Company</th>
              <th>Created</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
        @forelse($bookmarks as $bookmark) 
          <tr>
            <td><a href="{{ url('job/'.$bookmark->job->id) }}">{{ $bookmark->job->title }}</a></td>
            <td>{{ $bookmark->job->company_name }}</td>
            <td>{{ $bookmark->created_at->diffForHumans() }}</td>
            <td>
            <a href="#!" class="trigger tooltipped"data-position="left" data-tooltip="Remove bookmark"><i class="material-icons">delete</i></a>
            <form method="post" action="{{ route('remove.bookmark', $bookmark->id) }}">
                @csrf
            </form>
            </td>
          </tr>
        @empty
        <tr>
            <td></td>
            <td class="grey-text"> No vacancies bookmarked yet... </td>
            <td></td>
        </tr>
        @endforelse  
        </tbody>
      </table>
    @endif        
    </div>
    
    
  </div>   
       
       
    </div>

@else
  

  <div class="row mt-1">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#create">Create vacancy</a></li>
        <li class="tab col s3"><a href="#review">Review vacancies</a></li>
        <li class="tab col s3"><a href="#vacancies">Vacancies</a></li>
        <li class="tab col s3"><a href="#users">Users</a></li>
      </ul>
    </div>
    <div id="create" class="col s12">
  <div class="card-panel">
    <h5>Create Vacancy</h5>
        <form method="post" action="{{ route('create.vacancy') }}">
          @csrf

        <div class="row">
          <div class="col m6">
            <div class="input-field">
              <input placeholder="" id="title" name="title" type="text" class="validate vac_titles" autocomplete="off">
              <label for="title">Vacancy title</label>
            </div>
<script>
  $(document).ready(function(){
    $('input.vac_titles').autocomplete({
      data: {  

    @if ($job_titles)
       @foreach($job_titles as $title)
         '{{ $title }}': null,
       @endforeach
    @endif          
          
      }
    });
  });
</script>            

          </div>
          <div class="col m6 right-align">
            <div class="input-field">
              <input placeholder="" id="company_name" name="company_name" type="text" class="validate company_name" autocomplete="off">
              <label for="company_name">Company</label>
            </div>
<script>
  $(document).ready(function(){
    $('input.company_name').autocomplete({
      data: {  

    @if ($company_names)
       @foreach($company_names as $company_name)
         '{{ $company_name }}': null,
       @endforeach
    @endif          
          
      }
    });
  });
</script>     
        
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
              <input placeholder="" id="link" name="apply_link" type="url" class="validate">
              <label for="link">Application link (optional)</label>
            </div> 
          </div>
          <div class="col m6">
               <input type="text" class="datepicker" name="expires" placeholder="expire date">
          </div>
          <div class="col m12 s12">
            <p>
              <label>
                <input type="checkbox" name="facebook_post" />
                <span>Post on Facebook page</span>
              </label>
            </p>
          </div>
          <div class="col m12 s12 right-align">
            <button type="submit" class="btn grey">Submit</button>
          </div>
        </div>

        </form>     
  </div>          
    </div>
    




    <div id="review" class="col s12">
        
        <div class="card-panel">
<h5 class="header">Review vacancies</h5>
    @forelse($pending as $proccessing) 

          <div class="card">
            <div class="card-content">
            <span class="card-title">
                <h5>{{ $proccessing->title }}</h5>
                <i>{{ $proccessing->company_name }}</i>
            </span>
              <p class="content">{{ $proccessing->description }}</p>
            </div>
             @if($proccessing->apply_link)
            <div class="card-action tooltipped" data-position="bottom" data-tooltip="Apply link">
                <p>{{ $proccessing->apply_link }}</p>
            </div>       
            @endif
            
            @if($proccessing->email)
            <div class="card-action tooltipped" data-position="bottom" data-tooltip="Application email">
                <p>{{ $proccessing->email }}</p>
            </div> 
             @endif
            <div class="card-action">
              <div class="row m-0">
                  <div class="col m6 s6">
                     <span class="tooltipped" data-position="bottom" data-tooltip="Publisher"> {{ $proccessing->jobCreator->first_name }} {{ $proccessing->jobCreator->last_name }}</span>
                  </div>
                  <div class="col m6 s6 right-align">
                     <span class="tooltipped" data-position="bottom" data-tooltip="Created"> {{ $proccessing->created_at->diffForHumans() }}</span>
                  </div>
              </div>
            </div>
            <div class="card-action">
              <div class="row">
                <div class="col m6 s6 center-align">
                  <form method="post" action="{{ route('allow.job', $proccessing->id) }}">
                    @csrf
                    <button class="btn green tooltipped" data-position="top" data-tooltip="Allow vacancy" type="submit"><i class="material-icons">check</i></button>
                  </form>
                </div>
                <div class="col m6 s6 center-align">
                 <form method="post" action="{{ route('reject.job', $proccessing->id) }}">
                    @csrf
                  <button class="btn red tooltipped" data-position="top" data-tooltip="Reject vacancy" type="submit"><i class="material-icons">close</i></button>
                  </form>
                </div>
              </div>
            </div>
          </div>

    @empty

    @endforelse
        </div>
        
    </div>
    
    
    <div id="vacancies" class="col s12">

    <div class="card-panel">
      <table>
        <thead>
          <tr>
              <th>#</th>
              <th>Title</th>
              <th>Company</th>
              <th>Created</th>
              <th>Expires</th>
              <th></th>
              <th></th>
          </tr>
        </thead>

        <tbody>
        @forelse($vacancies as $vacancy) 
          <tr>
            <td>{{ $vacancy->id }}</td>
            <td><a href="job/{{ $vacancy->id }}" target="_BLANK">{{ $vacancy->title }}</a> </td>
            <td>{{ $vacancy->company_name }}</td>
            <td>{{ $vacancy->created_at->diffForHumans() }}</td>
            <td>
                {{ $vacancy->created_at->addDays(30)->diffForHumans() }}
                </td>
            <td>
            <a href="{{ route('edit.vacancy', $vacancy->id )}}" class="btn-floating btn-small grey  tooltipped" data-position="left" data-tooltip="Edit vacancy"><i class="material-icons">edit</i></a>
            </td>
            <td>
                <a class="btn-floating btn-small red trigger tooltipped" data-position="left" data-tooltip="Delete vacancy"><i class="material-icons">delete</i></a>
                  <form class="m-0 hidden" method="post" action="{{ route('delete.vacancy', $vacancy->id) }}">
              @csrf
             </form>                 
            </td>
          </tr>
        @empty
        <tr>
            <td></td>
            <td></td>
            <td class="grey-text"> Nothing found </td>
            <td></td>
        </tr>
        @endforelse  
        </tbody>
      </table>

      </div>      
        
    </div>




    <div id="users" class="col s12">

    <div class="card-panel">
      <table>
        <thead>
          <tr>
              <th>Name</th>
              <th>Resume</th>
              <th>Account</th>
              <th>Created</th>
          </tr>
        </thead>

        <tbody>
        @forelse($users as $user) 
          <tr>
            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
            <td>
                @if($user->cv_path)
                <a href="resumes/{{ $user->cv_path }}">resume</a>
                @else
                None
                @endif
                </td>
            <td>{{ $user->account_type }}</td>
            <td>{{ $user->created_at->diffForHumans() }}</td>
          </tr>
        @empty
        <tr>
            <td></td>
            <td></td>
            <td class="grey-text"> Nothing found </td>
            <td></td>
        </tr>
        @endforelse  
        </tbody>
      </table>
      </div>
        
    </div>

  </div>

@endif

</div>


@endsection
