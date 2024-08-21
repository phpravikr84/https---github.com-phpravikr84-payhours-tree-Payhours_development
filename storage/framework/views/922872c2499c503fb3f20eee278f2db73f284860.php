<script>
    window.Laravel = {
        csrfToken: '<?php echo csrf_token(); ?>',
        routes: {
            LeaveCalculationShow: '<?php echo route('leave.calculate'); ?>',
            TakenDatesByUser: '<?php echo route("leave.takenDates", ["user_id" => auth()->id()]); ?>',
        }
    };
</script>
