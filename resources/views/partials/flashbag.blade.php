@if (session()->has('success'))
    <x-message :type="'success'">
        {{ session()->get('success') }}
    </x-message>
@else
    <x-message :type="'error'">
        {{ session()->get('error') }}
    </x-message>
@endif
