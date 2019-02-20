@inject('translator', 'App\Providers\TranslationProvider')
<a href="Cursos" class="menu-item"><div><i class="fas fa-book"></i></div> {{$translator->get('cursos')}}</a>