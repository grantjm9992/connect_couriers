@inject('translator', 'App\Providers\TranslationProvider')
<div class="modal" tabindex="-1" role="dialog" id="tipoModal">
    <div class="modal-dialog large-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ $translator->get('select_editores') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="col-12" id="table_holder">
                    {!! $table !!}
                </div>
            </div>
            <div class="modal-footer">
                <input type="text" hidden id="values">
                <div class="btn btn-outline-primary" onclick="updateEditores()">{{ $actualizar }}</div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ $close }}</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {        
        $('body').delegate('td > input', 'change', function(e) {
            if ( this.checked === true ) {
                $(this).closest('tr').addClass('selected-row');
                var id = $(this).attr('data-id')+"@";
                var cur_str = $('#values').val().toString();
                var new_str = cur_str+id;
                $('#values').val(new_str);
            } else {
                $(this).closest('tr').removeClass('selected-row');
                var id = $(this).attr('data-id')+"@";
                var cur_str = $('#values').val().toString();
                var new_str = cur_str.replace(id, '');
                $('#values').val(new_str);
            }
        });
        $('#tipoModal').on('show.bs.modal', function () {
            $(this).find('.modal-body').css({
                    width:'auto', //probably not needed
                    height:'auto', //probably not needed 
                    'max-height':'100%'
            });
        });
        $('#tipoModal').modal();
    })


</script> 
