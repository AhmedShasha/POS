@if(session('succes'))

    <script>
        new Noty({
            type:'success',
            layout:'topRight',
            text:"{{session('succes')}}",
            timeout:2000,
            killer: true,
        }).show();
    </script>

@endif
