@inject('translator', 'App\Providers\TranslationProvider')
<div class="row listing-card" style="display: inline-flex; line-height: 38px; padding: 10px;" quote-id="{{ $quote->id_quote }}">
    <div class="col-6 col-sm-5">
        <a href="Users.publicProfile?id={{ $quote->id_user }}">
            {{ $quote->str_user }} ({{ $quote->user_feedback }})
        </a>
    </div>
    <div class="col-6 col-sm-3">
        {{ $quote->amount_current }} {{ $quote->code_currency }}
    </div>
    @if ( (int)$quote->id_status === 1 )
    <div class="col-12 col-sm-4" style="display: inline-flex; justify-content: space-between;">
        <a class="btn btn-success" href="Payments?quote={{ base64_encode($quote->id_quote) }}">Accept</a>
        <div class="btn btn-warning" onclick="declineQuote({{ $quote->id_quote }})">Decline</div>
    </div>
    @else
        <div class="col-12 col-sm-4" style="text-align: center; display: inline-flex; justify-content: space-between;">
            <a style="margin: 0 auto;" href="Quote.restoreQuote?quote={{ base64_encode($quote->id_quote) }}" class="btn btn-success">Restore quote</a>
        </div>
    @endif
</div>