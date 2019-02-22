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
        <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css')}}"/>
        <link rel="stylesheet" href="{{ asset('https://use.fontawesome.com/releases/v5.3.1/css/all.css')}}" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    </head>
    <body>
        <script src="{{ asset('https://code.jquery.com/jquery-3.3.1.min.js')}}" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js')}}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js')}}"></script>
        <script src="{{ asset('/js/main.js')}}"></script>
        <script src="{{ asset('/js/jsrender.min.js')}}"></script>
        <script src="{{ asset('/js/jquery.easyPaginate.js')}}"></script>
        <script src="{{ asset('/js/jquery.jqGrid.min.js')}}"></script>
        <script src="{{ asset('/js/plupload.full.min.js')}}"></script>
        <script src="{{ asset('/js/moxie.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js')}}"></script>
        {!! $set_menu !!}
        {!! $header !!}
        <div class="body" style="background: #e1dddd;">
            <div style="max-width: 1200px; margin: 0 auto; background: #fff; min-height: calc(100vh - 285px); box-shadow: 0 2px 15px 0 rgb(109,89,89);">
                {!! $errors !!}
                {!! $content !!}
            </div>
        </div>
        {!! $footer !!}
        <script>
            $('input').on('change invalid', function() {
                var textfield = $(this).get(0);
                
                textfield.setCustomValidity('');
                
                if (!textfield.validity.valid)
                {
                    textfield.setCustomValidity('{{ $translator->get("required") }}');
                }
            });
        </script>
    </body>
</html>
