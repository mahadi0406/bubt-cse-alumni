@component('mail::message')
    # {{ $subject }}

    {{ $message }}

    @component('mail::button', ['url' => config('app.url')])
        Visit our website
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
