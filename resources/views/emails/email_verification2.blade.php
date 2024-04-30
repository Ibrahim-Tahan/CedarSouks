@component('mail::message')
Hello {{ $user->fullname }},

I hope this email finds you well. 

We would like to inform you that a password reset process has been initiated for your account. To proceed with resetting your password, please click on the button below:

@component('mail::button', ['url' => route('update', $user->id)])
Reset Password
@endcomponent

If you have any questions or need further assistance, please don't hesitate to contact us.

Thank you for your attention to this matter.

Best regards,
{{ config('app.name') }}
@endcomponent