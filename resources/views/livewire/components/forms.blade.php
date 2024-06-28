<div>
    <!-- resources/views/components/form.blade.php -->
    <form wire:submit.prevent="{{ $submitAction }}" {{ $attributes->merge(['id' => $formId]) }}>
        {{ $slot }}
        @csrf
    </form>

    <script>
        document.addEventListener('livewire:load', function() {
            const form = document.getElementById('{{ $formId }}');
            if (form) {
                form.addEventListener('submit', function() {
                    const submitButton = form.querySelector('button[type="submit"]');
                    if (submitButton) {
                        submitButton.disabled = true;
                    }
                });
            }
        });
    </script>

</div>
