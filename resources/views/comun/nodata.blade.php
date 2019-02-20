@inject('translator', 'App\Providers\TranslationProvider')
<div class="alert alert-warning">
    {{$translator->get('no_results')}}
</div>