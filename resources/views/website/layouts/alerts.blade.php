<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}", 'Success', {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right", // Position: top-right, you can change it to "toast-bottom-left", etc.
            timeOut: "3000" // Duration of the toast (in milliseconds)
        });
    @endif
    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}", 'Info', {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: "3000"
        });
    @endif
    @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}", 'Warning', {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: "3000"
        });
    @endif
    @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}", 'Error', {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: "3000"
        });
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.warning("{{ $error }}", 'Validation Error', {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right",
                timeOut: "3000"
            });
        @endforeach
    @endif
</script>