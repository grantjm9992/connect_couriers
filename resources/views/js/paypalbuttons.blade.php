
<script src="https://www.paypal.com/sdk/js?client-id=Aa_nXZblNTxHLXrWB64InleoMiJM0dcP3-R8Ubrj2JOQ65WRogUmNVija8z_DIuVPToWR5H-FQLpKsJ8&currency=GBP"></script>
<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '{{ $quote->comission }}'
          }
        }],
        payer: {
            name: {
                given_name: "{{ $user->str_name }}",
                surname: "{{ $user->str_surname }}"
            },
            email_address: "{{ $user->str_email }}",
            address: {
                address_line_1: "{{ $user->address_line_1 }}",
                admin_area_2 : "{{ $user->city }}",
                postal_code: "{{ $user->postal_code }}",
                country_code: "{{ $user->country_code }}"
            }
        }
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        $.ajax({
            type: "POST",
            url: "Payments.comprobarResponse",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                details: details,
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
                    alert( $.trim(s.message), "warning" );
                    window.location.reload();
                }
            }
        });
      });
    }
  }).
render('#PPButtoncontainer');
</script>