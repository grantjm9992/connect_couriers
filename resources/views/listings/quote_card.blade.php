@inject('translator', 'App\Providers\TranslationProvider')
<div class="row listing-card" style="display: inline-flex; line-height: 38px; padding: 10px;" quote-id="{{ $quote->id_quote }}">
    <div class="col-6 col-sm-5">
        <a href="Users.publicProfile?id={{ $quote->id_user }}">
            {{ $quote->str_user }} ({{ $quote->user_feedback }})
        </a>
    </div>
    <div class="col-6 col-sm-3">
        {{ $quote->num_cantidad }} {{ $quote->code_currency }}
    </div>
    <div class="col-12 col-sm-4" style="display: inline-flex; justify-content: space-between;">
        <a class="btn btn-success" href="Quote.process?quote={{ base64_encode($quote->id_quote) }}">Accept</a>
        <div class="btn btn-warning" onclick="declineQuote({{ $quote->id_quote }})">Decline</div>
    </div>
</div>