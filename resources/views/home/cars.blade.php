@inject('translator', 'App\Providers\TranslationProvider')

<div class="home-splash" alt="Vehicle freight shipping comparison quote" style="background-image: url('couriers-service-quote/Vehicle-transporter-quote-compare.jpg');">
    <div class="splash-container">
        <div class="title" style="text-shadow: 2px 2px 2px #454545;">
            <h1>
                Get Car Delivery Quotes with Couriers Connect
            </h1>
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
                        $('#id_category').val(5);
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
    Vehicle transportation Comparison Quote Site:
    </h1>
    <p>
    For all vehicle transportation haulage services. The haulage companies using Couriers Connect can collect and deliver any vehicle such as  cars, atvs, quads, vans, suvs, rvs, motorbikes, motorcycles, quad bikes, vans, trucks, tractors, mopeds, boats, scooters, busses, planes, helicopters, ride on lawnmowers, diggers, car transporters, camper vans and just about everything else.
    </p>
    <p>
    Fill in our short form to explain what vehicle you need to deliver and wait for the vehicle transporters, freight companies and haulage contractors to contact you with an unbelievable specialised cheap quality quote. It's easy, simple and much cheaper than going directly to a specialised carrier for a dedicated car transporter service.
    </p>
    <p>
    For example if a car or vehicle transporter is driving to deliver or collect a vehicle to or from Manchester to be delivered to Spain for example and the low loader has space on the out going or return trip for more vehicles you could use this space for your vehicle. This gives you the best price possible and the transportation company could save money and this also helps to save the environment. The vehicle transportation service could be within the UK, Europe or any where in the World.
    </p>
    <p>
    After you have filled out the transportation quote comparison form sit back and wait for the transportation quotes to roll in and give you the best possible prices on the market. The more information you can offer will give you more precise quotes to compare as the vehicle transportation companies compete for your business.
    </p>
    <p>
    It is best to wait 24 hours to allow all the couriers to quote but you can receive and accept quotes in minutes. Whilst you are waiting you can ask questions and negotiate with the transportation companies that have quoted. You can also compare the company’s feedback and you can then also leave feedback yourself.
    </p>
    <p>
    We also recommend that you:
    <ul>
        <li>
        Check insurance levels with the vehicle transportation company because some couriers can offer increased insurance levels and some can be very low. It's important to know and it's also always a good idea to take photos before and after giving over your vehicle in case an insurance claim is required. 
        </li>
        <li>
        If you have a time window for collection or delivery you should mention this on your quote compare listing for the transportation companies, however it could limit quotes but it is an option.
        </li>
    </ul>
    Don't forget to check your delivery when you receive it and to leave feedback and so we can make the Couriers Connect experience a positive one for all.
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