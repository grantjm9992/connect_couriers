@inject('translator', 'App\Providers\TranslationProvider')

<div class="home-splash" alt="Large load courier freight shipping compare quote" style="background-image: url('couriers-service-quote/refrigerated-transport-courier-quote-compare.png');">
    <div class="splash-container">
        <div class="title" style="text-shadow: 2px 2px 2px #454545;">
            <h1>Get Delivery Quotes with Couriers Connect</h1>
        </div>
        <div class="tag-line" style="text-shadow: 2px 2px 2px #454545;">
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
                        $('#id_category').val(9);
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
    Courier Comparison Quote Site for All Your Unusual or Specialised Goods:
    </h1>
    <p>
    Couriers connect help you to connect to specialised couriers and haulage companies to ship anything you need delivering. Our specialised couriers can arrange anything to be delivered including: cold storage transportation, aircraft, trees, abnormal loads, wide loads, tractor tyres, plant machinery, trains, trucks, power plants, wind turbines, cold couriers, refrigerated transport, strange loads and just about anything else you may have.
    </p>
    <p>
    To obtain a specialised quote just fill in our short form to explain what goods you need to move and wait for the couriers and freight companies to contact you with a cheap competitive quote. It's easy, simple and most of all it’s much cheaper than going direct to a specialised carrier for a dedicated courier service.
    </p>
    <p>
    For example if a courier has a specialised vehicle capable to accommodate your load and is going to deliver a consignment in Birmingham to be collected from Manchester, the cargo might not fill the truck and there could be space on the return trip or outgoing journey for your goods. 
    </p>
    <p>
    The specialised courier can then collect your goods or any freight you may have. This gets you the best price and the courier company saves money without driving around with an empty truck or part loads. This also helps to save the environment. The delivery service could be within the UK, Europe or World-wide.
    </p>
    <p>
    It would be best for you to send photographs with dimensions and consignment weights etc. It is more likely to get you a cheap competitive quote. After you have filled out the quote comparison form sit back and wait for the carrier quotes to roll in with the best possible prices. The more information you can provide will give you more quotes to compare as the specialist couriers compete for your business.
    </p>
    <p>
    Quotes can arrive in minutes, however it's best to wait 24 hours if you have the time to allow all the couriers to quote. Whilst you wait you can ask questions and negotiate with the couriers that have quoted you or intend to quote you. You can also compare the specialist couriers feedback and you can then also leave feedback yourself to help us build a reliable and honest courier service community.
    </p>
    <p>
    We also recommend that you:
    <ul>
        <li>
        Check specifications and insurance levels with the carrier because some couriers can offer increased insurance levels and some can be very low. It's also very important to know everything that’s included and it's also a good idea to take photos before and after loading in case an insurance claim is required. 
        </li>
        <li>
        If you have a specific window of time for collection or delivery you should mention this on your specialised quote compare listing for the couriers, it could reduce quotes but it is an option.
        </li>
    </ul>
    Don't forget to leave feedback and to check you consignment when you receive and unload it so we can make the Couriers Connect experience a positive one for all.
    </p>
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