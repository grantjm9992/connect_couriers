@inject('translator', 'App\Providers\TranslationProvider')
<div class="fixed-left" id="menu">
    <div class="fill-fixed">
        <div class="main-options">
            <a href="Home" class="menu-item"><div><i class="fas fa-tachometer-alt"></i></div> {{$translator->get('resumen')}}</a>
            {!! $html !!}
        </div>
    </div>
</div>