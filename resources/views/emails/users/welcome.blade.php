@component('mail::message')
مرحباً {{$user->first_name}}

نرحب بانضمامك لنا

يمكنك الدخول لحسابكم من خلال النقر على الزر التالي

@component('mail::button', ['url' => 'http://127.0.0.1:8000/account'])
    الدخول للحساب
@endcomponent

شكراً لشغفك بخدمة المجتمع,<br>
{{ config('app.name') }}
@endcomponent
