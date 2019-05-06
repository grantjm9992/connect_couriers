@inject('translator', 'App\Providers\TranslationProvider')
<nav class="navbar navbar-expand-lg navbar-dsh fixed-top">
    <a class="navbar-brand" href="{{ url('/') }}" style="font-variant: small-caps;">
        <img src="couriers-service-quote/archivos/img/logo/courier-quote-compare.png" alt="compare courier quotes"> connect couriers
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        </ul>
        <span class="navbar-text">
            <a href="Deliveries.search">Search Deliveries</a>
            <a href="Home/#how">How it works</a>
            <a href="Messages"><i class="fas fa-envelope {{ $message_class }}"></i> </a>
            <a href="MyAccount" class="btn btn-top-right"><i class="far fa-user-circle"></i> My account</a>
            <a href="Login.logout" class="btn btn-top-right"><i class="fas fa-sign-out-alt"></i> Logout</a>
            @if ( (int)$_SESSION['id_user_type'] === 1 )
            <a href="Listings.new" class="btn btn-top-right-solid">Get Quotes</a>
            @endif
        </span>
    </div>
</nav> 

<script>
    $(document).ready( function() {
        setUser();
        setInterval(function() {
            setUser();
        }, 300000);
    });
</script>