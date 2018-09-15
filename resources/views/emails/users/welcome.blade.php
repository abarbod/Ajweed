@component('mail::message')
مرحباً {{$user->first_name}}

نرحب بانضمامك لنا

يمكنك الدخول لحسابكم من خلال النقر على الزر التالي

@component('mail::button', ['url' => route('users.account.index')])
    الدخول للحساب
@endcomponent

شكراً لشغفك بخدمة المجتمع,<br>
{{ config('app.name') }}
@endcomponent
