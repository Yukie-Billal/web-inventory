@props([
    'type' => 'default', 'name' => '', 'placeholder', "disabled" => false
])

@push('scripts')
    <script>
        if ({{ $type }} == "default") {
            const autoCompleteJS = new autoComplete({
                selector: {{ $selector }},
                placeHolder: {{ $placeholder }},
                data: {
                    src: {{ $data }},
                    cache: true,
                },
                resultsList: {
                    element: (list, data) => {
                        if (!data.results.length) {
                            // Create "No Results" message element
                            const message = document.createElement("div");
                            // Add class to the created element
                            message.setAttribute("class", "no_result");
                            // Add message text content
                            message.innerHTML = `<span>Found No Results for "${data.query}"</span>`;
                            // Append message element to the results list
                            list.prepend(message);
                        }
                    },
                    noResults: true,
                    maxResults: 15,
                    tabSelect: true,
                },
                resultItem: {
                    highlight: true
                },            
                events: {
                    input: {
                        selection: (event) => {
                            const selection = event.detail.selection.value;
                            autoCompleteJS.input.value = selection;
                            const params = ['search', selection];
                            Livewire.emit('setBarcode', params);
                        }
                    }
                }
            });
        }
    </script>
@endpush