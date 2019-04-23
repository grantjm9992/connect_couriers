@inject('translator', 'App\Providers\TranslationProvider')
@if ( (int)$_SESSION['id'] === (int)$message->id_sender )
<div class="alert alert-primary messageSent">

</div>
@else
<div class="alert alert-primary messageReceived">
    
</div>
@endif