<x-mail::message>
# Hello, {{ $data['name'] }}

Welcome to {{ config('app.name') }}. Please click the "click here" button to set your new password.

<div style="text-align:center;">
    <button>
    <a style="text-decoration: none" href="{{route('pass.reset', $data['token'])}}">click here</a>
    </button>
</div>

<br>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
