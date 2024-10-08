    @if (Session::has('message_store'))
        <script>
            toastr.success("{!! Session::get('message_store') !!}");
        </script>
    @endif
    @if (Session::has('status'))
        <script>
            toastr.success("{!! Session::get('status') !!}");
        </script>
    @endif
