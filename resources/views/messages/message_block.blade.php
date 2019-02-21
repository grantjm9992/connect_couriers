@inject('translator', 'App\Providers\TranslationProvider')
<div class="col-10 {{ $class }}">
    <div style="width: 100%; display: inline-flex; justify-content: space-between;">
        <div>
            {{ $message->str_user }}
        </div>
        <div>
            {{ $message->date_sent }}
        </div>
    </div>
    <div style="width: 100%; padding: 0 10px;">
        {{ $message->str_message }}
    </div>
</div>