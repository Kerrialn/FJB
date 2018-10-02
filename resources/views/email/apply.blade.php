
<!DOCTYPE html>
<html>
<head>
    <title>Job Application Email</title>
</head>
 
<body>
<div class="">
	    <h4>Dear {{ $job->company_name }},</h4> 

	    <p>Please see attached the resume of <b>{{ $user->first_name }} {{ $user->last_name }}</b> in application for the position of <b>{{ $job->title }}</b></p>

	    <p>Kind regards,</p>
	    <p>FJB Team</p>

	<div>
	<br>
	<hr>	
	<small>Please note: this is an automaticly genertate email, created when the user applied for a job using this email address ({{$job->email}}) as the application point. If this is incorrect no futher action is required and you can delete this email. 
	</small>	
	</div>
</div>
</body>
 
</html>


