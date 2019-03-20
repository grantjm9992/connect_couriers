@inject('translator', 'App\Providers\TranslationProvider')
<link rel="stylesheet" href="{{ asset('/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('/css/slick-theme.css') }}">
<script src="{{ asset('/js/slick.min.js') }}"></script>
<script>
    $(document).ready( function() {
        $('.carousel').slick({
            infinite: true,
            slidesToShow: 3,
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToScroll: 1
        });
    })
</script>
<div class="container-fluid error-splash">
    <h3 style="width: 100%; text-align: center;">Sorry, the item you're looking for doesn't seem to exist.</h3>
    <h5 style="width: 100%; text-align: center;">Take a look at our other items below</h5>
    <div style="width: 80%; margin: 20px 10%;">
        <div class="carousel">
            {!! $items !!}
        </div>
    </div>
</div>