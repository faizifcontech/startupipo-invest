@component('mail::message')
# New agent register

##### We have create an agent account for you. Use below details, to login.

Login : {{ $details['mail'] }} <br/>
Password: {{ $details['pass'] }} <br/>
Name: {{ $details['name'] }} <br/>
Company Name: {{ $details['comp_name'] }} <br/>
Referral Agent Name: {{ $details['ref_name'] }} <br/>
Your Referral Link Register: [{{ url('reg',$details['ref_name']) }}]({{ url('reg',$details['ref_name']) }})


@component('mail::button', ['url' => 'http://startupipo.com'])
Login Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
