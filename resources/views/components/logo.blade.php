@if(isset($tenantSettings) && $tenantSettings->logo !== null)
    <img src="{{ Storage::url($tenantSettings->logo) }}" {{ $attributes }} />
@else
    <img src="{{ asset('images/logo-micontrol.png') }}" {{ $attributes }} />
@endif

