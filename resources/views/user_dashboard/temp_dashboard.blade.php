
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif

<h1>Welcome To eGarage</h1>
We have sent you a verification mail at {{ Auth::user()->email}}. Check your email to verify your eGarage account.
<button> <a href="{{ route('user.resendVerification') }}">Resend Verification email</a></button>

