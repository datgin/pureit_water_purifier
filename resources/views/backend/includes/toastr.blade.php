@if (session()->has('success') || session()->has('error'))
    <script>
        const type = "{{ session()->has('success') ? 'success' : 'error' }}";
        const message = "{{ session('success') ?? session('error') }}";

        datgin[type](message);
    </script>
@endif

