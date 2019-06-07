@inject('translator', 'App\Providers\TranslationProvider')
<div class="col-12">
    <div class="row">
        <div class="col-12" style="">
            <div class="row quote-row" style="">
                <div class="col-8 col-sm-12 col-md-5">
                <a href="Couriers?id={{ $quote->id_user }}" style="color: inherit; text-decoration: none;">
                    {{ $quote->str_user }} ({{ $quote->user_feedback }})            
                </a>
                </div>
                <div class="col-6 col-sm-6 col-md-3">
                    {{ $quote->num_cantidad }} {{ $quote->code_currency }}            
                </div>
                <div class="col-6 col-sm-6 col-md-4">
                    <div class="text-button" message-toggle="{{ $quote->id_quote }}">
                        <span class="btn-inverse">View more <i class="fas fa-chevron-down xs-hidden"></i></span>
                    </div>
                    <div class="text-button" style="display: none;" message-toggle="{{ $quote->id_quote }}">
                        <span class="btn-inverse">View less <i class="fas fa-chevron-up xs-hidden"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="quote-messages width100" messages-id="{{ $quote->id_quote }}">
        <div class="row">
            <div class="col-12 col-lg-4 col-lg-push-4">
                <div class="alert-light" style="width: 90%; margin: 0 5% 18px 5%; padding: 5px;">
                <h4>Quote information</h4>
                <div class="row quote-information">
                    <div class="col-12 col-sm-4">
                        Courier:
                    </div>
                    <div class="col-12 col-sm-8">
                        {{ $quote->str_user }}
                    </div>
                </div>
                <div class="row quote-information">
                    <div class="col-12 col-sm-4">
                        Quote:
                    </div>
                    <div class="col-12 col-sm-8">
                        {{ $quote->num_cantidad }} {{ $quote->code_currency }}
                    </div>
                </div>
                <div class="row quote-information">
                    <div class="col-12 col-sm-4">
                        Vehicle:
                    </div>
                    <div class="col-12 col-sm-8">
                        {{ $quote->str_vehicle }}
                    </div>
                </div>
                <div class="row quote-information">
                    <div class="col-12 col-sm-4">
                        Timeframe:
                    </div>
                    <div class="col-12 col-sm-8">
                        {{ $quote->str_time_scale }}
                    </div>
                </div>
                <div class="row quote-information">
                    <div class="col-12">
                        Additional information
                    </div>
                    <div class="col-12">
                        {{ $quote->str_description }}
                    </div>
                </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-lg-pull-8">
                <div class="row">
                    {!! $messages !!}
                </div>
            </div>
        </div>
    </div>
</div>