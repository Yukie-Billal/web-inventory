@push('scripts')
    <script>
        let availableType = ['success', 'error', 'warning', 'question', null];
        Livewire.on('swal', function (params) {
            if (Array.isArray(params)) {
                var type, message, timer;
                
                type = params[0];
                message = params[1];
                timer = params[2] <= 1000 ? params[2] : 2000;

                swal.fire({
                    icon: type,
                    title: message,
                    showConfirmButton: false,
                    timer: timer
                });
            }
        });
        Livewire.on('swalConfirm', function (params) {
            var type, message, callback, url, value;
            if (Array.isArray(params) && params.length == 5) {
                type = params[0];
                message = params[1];
                callback = params[2];
                url = params[3];
                value = params[4];
                Swal.fire({
                    icon: type,
                    title: message,
                    showDenyButton: true,
                    confirmButtonText: 'Hapus',
                    denyButtonText: 'Batalkan',
                    focusConfirm: false,
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