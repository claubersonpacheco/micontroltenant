@if(isset($tenantSettings) && $tenantSettings->logo !== null)
    <img alt="logo" src="{{ \App\Services\BunnyServices::url($tenantSettings->logo) }}" {{ $attributes }} />
@else
    <img alt="logo" src="{{ asset('images/logo-micontrol.png') }}" {{ $attributes }} />
@endif

