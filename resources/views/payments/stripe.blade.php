<div style="width: 90%; margin: 0 5%; padding: 20px;">
    <div class="card">
        <div class="card-header">
            <i class="fas fa-shopping-cart"></i> Checkout
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 rightBorder order-2">
                    <h6>To confirm the quote, it is necessary to make the deposit indicated below</h6>
                    <h5 class="top-border row">
                        <div class="col-9">
                            Amount to pay now:
                        </div>
                        <div class="col-3">
                            {{ $quote->comission }} {{ $quote->code_currency }}
                        </div>
                    </h5>
                    <h5>Pay safely with card or PayPal using the buttons below</h5>
                    <div style="width: 300px; margin: 20px auto;" id="PPButtoncontainer"></div>
<!--
                    <div onclick="test()" class="btn btn-primary">
                        Test button
                    </div>
-->            </div>
                <div class="col-12 order-1" style="margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(0,0,0,0.3);">
                    <h5>Next steps:</h5>
                    <ul style="">
                        <li>
                            Pay the small deposit
                        </li>
                        <li>
                            {{ $quote->courier }} will contact you to make the final arrangements.
                        </li>
                        <li>
                            Pay the remaining balance of {{ $quote->amount_current }} to {{ $quote->courier }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{!! $js !!}