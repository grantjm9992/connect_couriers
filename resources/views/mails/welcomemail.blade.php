<div style="width: 100%;">
    <div style="height: 80px;">
        <img src="{{ asset('https://couriersconnect.com/couriers-service-quote/archivos/img/logo/compare-delivery-prices.png') }}" style="height: 80px;"/>
    </div>
    <h3>
        Welcome!
    </h3>
    <p>
        Dear
        @if ( $user-str_name != "" )
        {!! $user->str_name !!},
        @else
        {!! $user->str_user !!},
        @endif
        , thank you for registering with Couriers Connect!
        Your account is now active and ready to use.
        @if ( $user->id_user_type === 1 )
            You can keep track of your listings from your dashboard located <a href="{{ url('MyAccount') }}">here</a>. You can also set a password in order to protect your account.
        @else
            You can keep track of all of your quotes and activity from your dashboard, located <a href="{{ url('MyAccount') }}">here</a>.
        @endif
    </p>
    <p>
        Regards, the Couriers Connect team
    </p>
</div>