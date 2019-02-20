@inject('translator', 'App\Providers\TranslationProvider')
<div class="col-12">
    <p>On {{ $message->fecha_enviado }}, {{ $message->str_user }} wrote: </p>
    <p>{{ $message->str_message }}</p>
    @if ( $reply != "" )
        <div style="width: calc( 100% - 40px ); margin: 10px 0 10px 40px;">
            <p>On {{ $reply->fecha_enviado }}, {{ $reply->str_user }} wrote: </p>
            <p>{{ $reply->str_message }}</p>
        </div>
    @endif
</div>