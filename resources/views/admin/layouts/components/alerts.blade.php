@if (session('message'))
    <script>
        toastr.success('Sucessfully Added.', 'Success', {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right", // Position: top-right, you can change it to "toast-bottom-left", etc.
            timeOut: "3000", // Duration of the toast (in milliseconds)
        });
    </script>
@endif
@if (session('error'))
    <script>
        toastr.success('Something Went Wrong.', 'Error', {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right", // Position: top-right, you can change it to "toast-bottom-left", etc.
            timeOut: "3000", // Duration of the toast (in milliseconds)
        });
    </script>
@endif
