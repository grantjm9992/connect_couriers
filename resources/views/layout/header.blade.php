@inject('translator', 'App\Providers\TranslationProvider')
<nav class="navbar navbar-expand-lg navbar-dsh fixed-top">
    <a class="navbar-brand" href="{{ url('/') }}" style="font-variant: small-caps;">
        <img src="archivos/img/logo-blank.png" alt=""> connect couriers
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
            <span onclick="login()">Login</span>
            <a href="Login.signUpCourier" class="btn btn-top-right">Courier Sign Up</a>
            <a href="Listings.new" class="btn btn-top-right-solid">Get Quotes</a>
        </span>
    </div>
</nav>