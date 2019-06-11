<div style="width: 100%;">
    <h3>
        Dear
        @if ( $user->str_name != "" )
        {!! $user->str_name !!},
        @else
        {!! $user->str_user !!},
        @endif
         you have received a message about the listing {!! $listing->str_title !!}
    </h3>
    <p>
        View the message in the <a href="{{ url('/Messages') }}">Messages</a> section of the application.
    </p>
    <p>
        Regards, the Couriers Connect team
    </p>
</div>