<div id="{{ $grid_id }}" style="border-left: none; border-right: none;"></div>
<script type="text/javascript">
    $(function () {
        var dataManger = ej.DataManager({
            url: '{{ $controller }}',
            crossDomain: true,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $("#{{ $grid_id }}").ejGrid({
            dataSource: dataManger,
            allowPaging: true,
            pageSettings: { pageSize: '{{ $page_size }}' },
            columns: [
                @foreach ($columns as $column)
                    { field: '{{ $column["name"] }}', headerText: '{{ $column["title"] }}', width: '{{ $column["width"] }}'},
                @endforeach
            ],
            rowSelected: function(e) {
                var f = '{{ $successFunction }}';
                if (f != '') {
                    {{ $successFunction }}
                }
            }
        });
    });
</script>