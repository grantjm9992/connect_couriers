<div style="width: 100%;">
    <h3>
        Dear
        @if ( $user-str_name != "" )
        {!! $user->str_name !!}
        @else
        {!! $user->str_user !!}
        @endif
        , your bid on the listing {!! $listing->str_title !!} has been outbid
    </h3>
    <p>
        View the listing in the <a href="{!! $url !!}">My outbid quotes</a> section of the application.
    </p>
    <p>
        Regards, the Couriers Connect team
    </p>
</div>