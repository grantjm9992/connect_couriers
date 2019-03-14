<div class="row">
    @if ( $data != "" )
    {!! $data !!}
    <script>
        $(document).ready( function() {
            var page = "{{ $page }}";
            if ( page == "1" )
            {
                document.getElementById('anterior').style.pointerEvents = 'none';
                $('#anterior').addClass('disabled');
            }
            @if ( $total < $pageSize )
                document.getElementById('siguiente').style.pointerEvents = 'none';
                $('#siguiente').addClass('disabled');
            @endif            
        });
    </script>
    <div style="width: 100%; padding: 40px;">
        <div class="btn btn-primary" id="anterior" onclick="pageDown({{ $page }})"><i class="fas fa-arrow-left"></i> Previous</div>
        <div class="btn btn-primary" id="siguiente" onclick="pageUp({{ $page }})">Next <i class="fas fa-arrow-right"></i></div>
    </div>
    @else
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 100%;">
            {!! $message !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>