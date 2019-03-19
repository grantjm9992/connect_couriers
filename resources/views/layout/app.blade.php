@inject('translator', 'App\Providers\TranslationProvider')
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{ $title }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' ) }}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css')}}">
        <link rel="stylesheet" href="{{ asset('/css/jquery.datetimepicker.min.css')}}">
        <link type="text/css" rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css')}}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('/css/styles.css')}}">
        <link rel="stylesheet" href="{{ asset('/css/jquery-ui.min.css')}}"></link>
        <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css')}}"/>
        <link rel="stylesheet" href="{{ asset('https://use.fontawesome.com/releases/v5.3.1/css/all.css')}}" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('/css/tooltipster.bundle.min.css') }}">
    </head>
    <body>
        <script src="{{ asset('https://code.jquery.com/jquery-3.3.1.min.js')}}" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js')}}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js')}}"></script>
        <script src="{{ asset('/js/jsrender.min.js')}}"></script>
        <script src="{{ asset('/js/jquery.easyPaginate.js')}}"></script>
        <script src="{{ asset('/js/jquery.jqGrid.min.js')}}"></script>
        <script src="{{ asset('/js/plupload.full.min.js')}}"></script>
        <script src="{{ asset('/js/moxie.min.js')}}"></script>
        <script src="{{ asset('/js/jquery-ui.min.js')}}"></script>
        <script src="{{ asset('/js/notify.min.js')}}"></script>
        <script src="{{ asset('/js/tooltipster.bundle.min.js') }}"></script>
        <script src="{{ asset('/js/main.js')}}"></script>
        <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js')}}"></script>
        {!! $set_menu !!}
        {!! $header !!}
        <div class="body">
            {!! $errors !!}
            {!! $content !!}
        </div>
        {!! $footer !!}
        <script>
            $(document).ready(function() {
                $('[tooltip]').tooltipster({
                    theme: 'coolTip',
                    arrow: false
                });
            });
            $('input').on('change invalid', function() {
                var textfield = $(this).get(0);
                
                textfield.setCustomValidity('');
                
                if (!textfield.validity.valid)
                {
                    textfield.setCustomValidity('{{ $translator->get("required") }}');
                }
            });

            
            $(document).ready( function() {
                window.swalOptions = Array();
                window.swalOptions.title = "Error";
                window.swalOptions.text = "";
                window.swalOptions.icon = "";
                window.swalOptions.className = "";
                window.swalOptions.closeOnClickOutside = true;
                window.swalOptions.dangerMode = false;
                window.swalOptions.timer = null;
                window.swalOptions.thenParameters = null;
                window.swalOptions.buttons = {
                    cancel: {
                        text: "Accept",
                        value: null,
                        visible: true,
                        closeModal: true
                    }
                }
                window.swalOptions.thenFunction = "";

                window.swalConfirmOptions = Array();
                window.swalConfirmOptions.title = "Warning";
                window.swalConfirmOptions.text = "";
                window.swalConfirmOptions.icon = "warning";
                window.swalOptions.className = "";
                window.swalOptions.closeOnClickOutside = true;
                window.swalOptions.dangerMode = false;
                window.swalOptions.timer = null;
                window.swalConfirmOptions.thenParameters = null;
                window.swalConfirmOptions.buttons = {
                    confirmar: {
                        text: "Confirm",
                        value: 1,
                        className: "btn-success"
                    },
                    cancelar: {
                        text: "Cancel",
                        value: null,
                        className: "btn-danger"
                    }
                };
            })
            function alert( options, icon = null )
            {
                var config = window.swalOptions;
                if ( typeof options === "string" )
                {
                    config.title = options;
                    config.icon = icon;
                }
                else
                {
                    if ( options.type && options.type == "confirm" )
                    {
                        config = window.swalConfirmOptions;
                    }
                    $.extend ( config, options );
                }
                swal( 
                    {
                        title: config.title,
                        text: config.text,
                        icon: config.icon,
                        buttons: config.buttons,
                        content: config.content,
                        className: config.className,
                        closeOnClickOutside: config.closeOnClickOutside,
                        dangerMode: config.dangerMode,
                        timer: config.timer
                    }
                 ).then((result) => {
                    window.result = result;
                    if (result) {
                        config.thenFunction(config.thenParameters);
                    } else {

                    }
                });
            }

        </script>
    </body>
</html>
