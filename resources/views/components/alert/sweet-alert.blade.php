@push('scripts')
    <script>
        let availableType = ['success', 'error', 'warning', 'question', null];
        Livewire.on('swal', function (params) {
            if (Array.isArray(params)) {
                var [type, message, timer = 2000] = params;
                swal.fire({
                    icon: type,
                    title: message,
                    showConfirmButton: false,
                    timer: timer
                });
            }
        });
        Livewire.on('swalConfirm', function (params) {
            var [type, message, callback, url, value] = params;
            if (Array.isArray(params) && params.length == 5) {
                Swal.fire({
                    icon: type,
                    title: message,
                    showDenyButton: true,
                    confirmButtonText: 'Hapus',
                    denyButtonText: 'Batalkan',
                    focusConfirm: false,
                    html:
                        '',
                }).then((result) => {
                    if (result.isConfirmed && callback == true) {
                        Livewire.emit(url, value);
                    }
                })
            } else {
                swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        })
    </script>
@endpush