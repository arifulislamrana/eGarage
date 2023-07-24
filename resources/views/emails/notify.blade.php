<x-mail::message>
# Hello {{ $data['user_name'] }}

{{ $data['body'] }}

<x-mail::button :url="''">
<a href="{{ route('home') }}"> Click here to visit site</a>
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
