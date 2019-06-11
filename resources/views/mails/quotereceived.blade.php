<div style="width: 100%;">
    <h3>
        Dear
        @if ( $user->str_name != "" )
        {!! $user->str_name !!}
        @else
        {!! $user->str_user !!}
        @endif
        , your listing {!! $listing->str_title !!} has received a new quote
    </h3>
    <p>
        View the quote in the <a href="{!! $url !!}">Quotes</a> section of the application.
    </p>
    <p>
        Regards, the Couriers Connect team
    </p>
</div>