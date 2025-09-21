@if(isset($name))
    <script>
        trackEvent(@json($name), @json($params ?? []));
    </script>
@endif
