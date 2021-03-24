@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script >
    const tosasting = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: false,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

    @if (Session::has('success'))

    tosasting.fire({
        icon: 'success',
        title: "{{Session::get('success')}}"
    });
    @endif  
    @if ($message = Session::has('error'))
        tosasting.fire({
            icon: 'success',
            title: "{{Session::get('error')}}"
        });
    @endif
</script>

  
