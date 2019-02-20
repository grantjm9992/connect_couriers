@inject('translator', 'App\Providers\TranslationProvider')
{!! $listings !!}
<div id="pager"></div>
<script>
    $('#results').DataTable({
        "pageLength": 20,
        searching: false,
        "ordering": false
    });
    $('#results_length').hide();            
</script>