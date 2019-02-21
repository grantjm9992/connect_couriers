@inject('translator', 'App\Providers\TranslationProvider')
<div class="col-10 msg {{ $class }}">
    <div style="">
        <div>
            {{ $message->str_user }}
        </div>
        <div>
            {{ $message->date_sent }}
        </div>
    </div>
    <div style="width: 100%; padding: 0 10px;">
        {!! $message->str_message !!}
    </div>
</div>