@if (session('message'))
    <script>
        var message = @json(session('message'));
        toastr.success(message, 'Success', {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right", // Position: top-right, you can change it to "toast-bottom-left", etc.
            timeOut: "3000", // Duration of the toast (in milliseconds)
        });
    </script>
@endif
@if (session('error'))
    <script>
        var errorMessage = @json(session('error'));
        toastr.success(errorMessage, 'Error', {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right", // Position: top-right, you can change it to "toast-bottom-left", etc.
            timeOut: "3000", // Duration of the toast (in milliseconds)
        });
    </script>
@endif
