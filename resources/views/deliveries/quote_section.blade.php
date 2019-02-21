@inject('translator', 'App\Providers\TranslationProvider')
<div class="row quote-section">
    {!! $quotes !!}
</div>

<script>
    $(document).ready( function()
    {
        $('[message-toggle]').on("click", function() {
            var id = $(this).attr('message-toggle');
            $('[messages-id="'+id+'"]').slideToggle(500);
        })
    });
</script>