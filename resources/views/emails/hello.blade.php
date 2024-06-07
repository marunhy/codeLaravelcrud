<p>{{ $details['test'] }}</p>
<div>
    <p>Thank you for registering to create an account</p>
    <a href="{{ $details['url'] }}">Click here to receive reward</a>
</div>
<div>
    <span>
        The validity period of the official registration link for provisional users is within one hour after receiving this email. If more than one hour has passed, please register as a new member again using the link below.
    </span>
    <a href="{{ route('signUp') }}">Please click this URL link to re-enter your email</a>
</div>



