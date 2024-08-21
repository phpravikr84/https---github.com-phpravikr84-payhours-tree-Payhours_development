<script>
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}',
        routes: {
            LeaveCalculationShow: '{{ route('leave.calculate') }}',
            TakenDatesByUser: '{{ route("leave.takenDates", ["user_id" => auth()->id()]) }}',
        }
    };
</script>
