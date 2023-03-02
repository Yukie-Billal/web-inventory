@push('scripts')
    <script>
        let toastColor = {
            'danger' : 'linear-gradient(to right, #e35d5b, #e53935)',
            'warning' : 'linear-gradient(to right, #ffff80, #fdfc47)',
            'success' : 'linear-gradient(to right, #43936C, #43936C)',
            'primary' : '',
            'secondary' : ''
        }
        Livewire.on('toastify', function (params) {
            let [color = "primary", text = 'Parameter Kosong', timer = 2500, vertikal="top", horizontal="right"] = params;
            Toastify({
                text: text,
                duration: timer,
                newWindow: true,
                stopOnFocus: true,
                grafity: vertikal,
                position: horizontal,
                className: 'text-l-medium rounded mt-5 me-5',
                style: {
                    background: toastColor[color],
                },
                onClick: function(){} // Callback after click
            }).showToast();
            Livewire.emit('fresh');
        });
    </script>
@endpush