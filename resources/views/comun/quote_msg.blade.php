@inject('translator', 'App\Providers\TranslationProvider')
<div class="col-2">
    {{ $message->str_user }}
</div>
<div class="col-10">
    {{ $message->str_message }}
</div>