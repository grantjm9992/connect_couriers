@inject('translator', 'App\Providers\TranslationProvider')
<div class="row" style="margin: 0; border: 0.5px solid rgba(0,0,0,0.15); padding: 10px 0;">
    <div class="col-3">
        {{ $quote->num_cantidad }}
    </div>
    <div class="col-3">
        {{ $quote->str_user }} 
    </div>
    <div class="col-2">
        <div class="btn btn-cc-outline" toggle-id="{{ $quote->id_quote }}" onclick="toggleQuote({{ $quote->id_quote }})">
            Show more
        </div>
    </div>
    <div class="col-4">
        {{ $quote->num_questions }} questions
    </div>
    <div class="col-12" style="display: none;" quote="{{ $quote->id_quote }}">
        {{ $quote->str_description }}
    </div>
</div>