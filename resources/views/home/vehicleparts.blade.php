@inject('translator', 'App\Providers\TranslationProvider')

<div class="home-splash" style="background-image: url('{{ $image }}'); background-position: center;">
    <div class="splash-container">
        <div class="title">
            <h1>Get Vehicle Parts Delivery Quotes with Couriers Connect</h1>
        </div>
        <div class="tag-line">
            <h4>Courier quote comparison made easy</h4>
        </div>
        <form action="Listings.new">
            <div class="input-group mb-3">
                <select name="id_category" id="id_category" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    @foreach ( $categories as $category )
                        <option value="{{ $category->id_category }}">{{ $category->str_category }}</option>
                    @endforeach
                </select>
                <script>
                    $(document).ready( function() {
                        $('#id_category').val(1);
                    });
                </script>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-cc input-group-text" id="basic-addon2">Get Quotes</button>
                </div>
            </div>
        </form>
    </div>    
</div>
<div class="container-fluid first">
<div class="row">
<div class="col-12 col-lg-9">
    <h1>
    Courier Comparison Quote Site for Car, Vehicle and all Automotive Parts:
    </h1>
    <p>
    Couriers connect will connect you to couriers and haulage companies to ship any car, vehicle and automotive Parts. Our trusted couriers will deliver for you everything automotive including: Tyres, 4x4 tires, Rims, Alloys, Car Body Parts, Bumpers, Bonnets, Car Doors, Exhausts, Manifolds, Turbos, Differentials, transfer cases, Interior Trim, Radiators, Roof Bars, Motorbike and Child Seats, Headlights, Driveshafts, Tow Bars, Shock absorbers, suspension springs, Leaf spring suspension, Steering rack, Parcel shelf, Prop shaft, Bull bars, Gearbox, Brake discs/Hubs, Axles, engines and all other automotive parts.
    </p>
    <p>
    You just need to fill in our short courier quote compare form to explain what car, van, tractor or general automotive parts you need to deliver and then wait for the couriers and freight companies to contact you with an unbelievable cheap quote. It's so easy, simple and most of all its much much cheaper than going direct to a courier for a dedicated courier service.
    </p>
    <p>
    For example if a courier, supplier or a mechanic etc. is travelling to collect or deliver a vehicle part to or from Birmingham to be delivered to Hull etc. and the car parts don't fill the van or truck there could be space on the journey for more car parts. They can collect your automotive parts or any freight you may have. This gives you the cheapest price possible and the courier also saves money and it also helps to save the environment because of wasted journeys. The delivery courier service could be within the UK, Europe or even Worldwide.
    </p>
    <p>
    If you can possibly send photographs with dimensions and consignment weight you are more likely to obtain a cheaper quote. After you have filled out the quote compare form just sit back and wait for the couriers quotes to roll in to give you the best possible price. The more information you can supply the more quality quotes you will get.
    </p>
    <p>
    Quotes can come in minutes, although it's better to wait at least 24 hours if not urgent to allow all the couriers to quote. You can also ask questions and negotiate with the couriers that have quoted you and you can compare the carrier's feedback and you can then leave feedback yourself to help build a reliable and honest courier service community.
    </p>
    <p>
    We also recommend that you:
    <ul>
        <li>
        Check the insurance levels with the carrier, some couriers can offer increased insurance levels and some can be very low. It is important to know and it's always a good idea to take photos before and after packaging in case in the unfortunate event that an insurance claim is required. 
        </li>
        <li>
        You should also check if there is a packaging service included for the car parts or you may need to package these items yourself.
        </li>
        <li>
        If you have a strict time for collection or delivery you should mention this on your quote compare listing for the couriers, it could reduce quotes but it is an option.
        </li>
    </ul>
    Don't forget to leave feedback and to check you delivery when you receive it so we can make the Couriers Connect experience a positive one for all.
</div>
<div class="col-12 col-lg-3" style="padding: 5px 15px; background: #eee;">
    <h4 style="padding-bottom: 10px;">Why use us?</h4>
    <div class="row">
        <div class="col-12">
            <div class="responsive-box">
                <div class="box-icon">
                    <img src="archivos/img/user.png" alt="">
                </div>
                <h3>Trustworthy</h3>
                <p>All of our couriers are rated by customers just like you, so you can breathe easy.</p>
            </div>
        </div>
        <div class="col-12">
            <div class="responsive-box">
                <div class="box-icon">
                    <img src="archivos/img/approve-invoice.png" alt="">
                </div>
                <h3>Simple and Quick</h3>
                <p>Just fill out our simple form, in less than 60 seconds, and start recieving quotes for your delivery.</p>
            </div>
        </div>
        <div class="col-12">
            <div class="responsive-box">
                <div class="box-icon">
                    <img src="archivos/img/portfolio-icon-5.png" alt="">
                </div>
                <h3>Take control</h3>
                <p>You choose the courier and service you want. All from the comfort of your mobile phone.</p>
            </div>
        </div>
        <div class="col-12">
            <div class="responsive-box">
                <div class="box-icon">
                    <img src="archivos/img/hand.png" alt="">
                </div>
                <h3>Save money</h3>
                <p>With our couriers competing for your delivery, you can save up to 75%.</p>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<div class="section-services">
    <h4>Similar Services</h4>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <a href="ManAndVan">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="service-title">
                        Man and Van
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <a href="Boxes">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="service-title">
                        Boxes
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <a href="Listings.new?id_category=7">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fas fa-people-carry"></i>
                    </div>
                    <div class="service-title">
                        Moving Home
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <a href="Ebay-Goods">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fab fa-ebay"></i>
                    </div>
                    <div class="service-title">
                        Ebay goods
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="section bkg-white" id="how">
    <h4>How It Works</h4>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="service-box steps">
                <div class="service-title">
                    List your item
                </div>
                <div class="service-desc">
                    Publish the item you want to move, using our simple form
                </div>
                <div class="service-number">
                    1
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="service-box steps">
                <div class="service-title">
                    Receive and compare prices
                </div>
                <div class="service-desc">
                    Watch as couriers offer you their best services and prices.
                </div>
                <div class="service-number">
                    2
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="service-box steps">
                <div class="service-title">
                    Start saving time and money
                </div>
                <div class="service-desc">
                    Read feedack, choose a quote and start saving money
                </div>
                <div class="service-number">
                    3
                </div>
            </div>
        </div>
    </div>
</div>