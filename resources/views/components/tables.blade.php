@push('styles')
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.5/datatables.min.css" rel="stylesheet">
@endpush

{{ $slot }}

@push('scripts')
<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.5/datatables.min.js"></script>
<script>
    $(document).ready(function() {
            $('#table').DataTable( 
            );
        }); 
</script>
@endpush