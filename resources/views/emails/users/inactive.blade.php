@component('mail::message')
# Hello, {{ $user->fullname() }}
# You joined us on: {{ date("D jS M, Y", strtotime($user->created_at)) }}

@component('mail::panel')

{!! nl2br($request->message)  !!}

@endcomponent

@component('mail::button', ['url' => 'https://crypto2naira.com/login', 'color' => 'blue'])
Login
@endcomponent


Thanks,<br>
David, {{ config('app.name') }}
@endcomponent
