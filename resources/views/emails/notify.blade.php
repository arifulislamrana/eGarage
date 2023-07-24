<x-mail::message>
# Hello {{ $data['user_name'] }}

{{ $data['body'] }}

<div style="text-align:center;">
    <button>
    <a style="text-decoration: none" href="{{ route('home') }}">click here to visit site</a>
    </button>
</div>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
