<div style="width: 100%;">
    <h3>
        Dear
        @if ( $user-str_name != "" )
        {!! $user->str_name !!},
        @else
        {!! $user->str_user !!},
        @endif
        your have successfully bid on the listing {!! $listing->str_title !!}.
    </h3>
    <p>
        View the listing in the <a href="{!! $url !!}">My quotes</a> section of the application.
    </p>
    <p>
        Regards, the Couriers Connect team
    </p>
</div>