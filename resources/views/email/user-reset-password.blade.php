@component('mail::message')
# Hi {{ $user->first_name ." ". $user->last_name}}

You recently requested to reset your password for your account, use the button below to reset it.

@component('mail::button', ['url' => $url])
Reset Password
@endcomponent

<strong>Thanks,<br>
{{ config('app.name') }}</strong><br>
@endcomponent