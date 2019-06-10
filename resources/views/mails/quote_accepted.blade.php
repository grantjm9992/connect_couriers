<div style="width: 100%;">
    <h3>
        Dear         
        @if ( $user-str_name != "" )
        {!! $user->str_name !!}
        @else
        {!! $user->str_user !!}
        @endif
        , your quote on the listing: {!! $listing->str_title !!} has been accepted
    </h3>
    <p>
        Please review your dashboard to complete the booking.
    </p>
    <p>
        Regards, the Couriers Connect team
    </p>
</div>