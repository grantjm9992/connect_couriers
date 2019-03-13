<div style="width: 90%; margin: 0 5%; padding: 20px;">
    <div class="card">
        <div class="card-header">
            <i class="fas fa-shopping-cart"></i> Checkout
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-8 rightBorder">
                    <h6>To confirm the quote, it is necessary to make the deposit indicated below</h6>
                    <h5 class="top-border row">
                        <div class="col-9">
                            Amount to pay now:
                        </div>
                        <div class="col-3">
                            {{ $quote->comission }} {{ $quote->code_currency }}
                        </div>
                    </h5>
                    <h5>Pay safely with card or PayPal below</h5>
                    <div style="width: 300px; margin: 20px auto;" id="PPButtoncontainer"></div>

                    <div onclick="test()" class="btn btn-primary">
                        Test button
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <h5>Next steps:</h5>
                    <ul style="list-style: none;">
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

<script src="https://www.paypal.com/sdk/js?client-id=AT8RLW_TLQl_-1wfXibo_0ZrV_m-Q4PggBXupdCu-rZ0wS3F96HwbtZPruoDRZ6-NfgYet2vGDPDzeoU&currency=EUR"></script>
<script>
    function test()
    {
        $.ajax({
            type: "POST",
            url: "Payments.comprobarResponse",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id_listing: '{{ base64_encode($quote->id_listing) }}',
                id_quote: '{{ base64_encode( $quote->id_quote ) }}'
            },
            success: function(data)
            {
                var s = jQuery.parseJSON(data);
                if ( s.success === 1 )
                {
                    window.location = s.url;
                }
                else
                {
                    alert( s.message );
                }
            }
        });
    }
/*
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '0.01'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        $.ajax({
            type: "POST",
            url: "Payments.comprobarResponse",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                orderID: data.orderID,
                id_listing: '{{ base64_encode($quote->id_listing) }}',
                id_quote: '{{ base64_encode( $quote->id_quote ) }}'
            },
            success: function(data)
            {
                var s = jQuery.parseJSON(data);
                if ( s.success === 1 )
                {
                    window.location = s.url;
                }
                else
                {
                    alert( s.message );
                }
            }
        });
      });
    }
  }).
render('#PPButtoncontainer');*/
</script>