@push('styles')
    <link href="{{ asset('data_tables/datatables.min.css') }}" rel="stylesheet">
@endpush

{{ $slot }}

@push('scripts')
<script src="{{ asset('data_tables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
            $('#table').DataTable( 
            );
        }); 
</script>
@endpush