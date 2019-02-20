<div id="{{ $gridId }}"></div>

<script>
    $(document).ready( function() {
        $('#{{ $gridId }}').jsGrid({
            autoload: true,
            width: '{{ $ancho_tabla }}',
            height: '{{ $altura_tabla }}',
            sorting: true,
            paging: true,
            pageSize: '{{ $pageSize }}',
            fields: {!! $campos !!},
            data: {!! $data !!},
            rowClick: function(args) {
                console.log(args)
                var getData = args.item;
                console.log(getData);
                var id = getData['{{ $dataID }}'];
                @if ( $detailURL != "" )
                    window.location = "{{ $detailURL }}"+id;
                @endif
            }
        })
    });
</script>