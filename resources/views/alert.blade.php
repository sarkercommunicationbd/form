@if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'Okay'
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            title: 'Oops...',
            text: "{{ session('error') }}",
            icon: 'error',

        });
    </script>
@endif
