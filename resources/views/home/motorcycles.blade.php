@inject('translator', 'App\Providers\TranslationProvider')
<div class="home-splash" style="background-image: url(couriers-service-quote/archivos/img/motorbike-motorcycle-courier-transportation.jpg);">
    <div class="splash-container">
        <div class="title">
            <h1 style="text-shadow: 2px 2px 2px #454545;">
                Get Motorcycle Delivery Quotes with Couriers Connect
            </h1>
        </div>
        <div class="tag-line">
            <h4 style="text-shadow: 2px 2px 2px #454545;">Courier quote comparison made easy</h4>
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
                        $('#id_category').val(2);
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
    Transportation Comparison Quote Site for Motorbikes and vehicles:
    </h1>
    <p>
    Couriers connect will connect you to motorbike transportation delivery couriers and haulage companies to transport your beloved Motorbike: Aprilia, BMW, Buell, Can-Am, Ducati, Harley-Davidson, Honda, Kawasaki, KTM, Kymco, Moto Guzzi, Suzuki, Triumph, Victory, Yamaha etc..
    </p>
    <p>
    Just fill in our short form to explain what motorcycle you need to have delivered and wait for the transportation, freight companies and even a man with a van contact you with an unbelievable competitive quote. It's easy, simple and most of all its much cheaper than going directly to a specialised transportation company for a dedicated courier service although many motorbike transportation specialist companies will contact you with a cheap price.
    </p>
    <p>
    For example if a motorbike transportation vehicle is collecting a motorcycle for a customer in Birmingham to be delivered to Manchester there could be room in the vehicle or there could also be space on the return trip for more motorbikes. The motorcycle transportation company could collect your motorcycle or any freight you may have. This gets you the best priced quote and the courier company also saves money and it helps to save the environment by reducing wasted journeys. The delivery service could be within the UK, Europe or anywhere in the World.
    </p>
    <p>
    You will need to fill in the motorcycle transportation quote comparison form and just sit back and wait for the transportation quotes to roll in to give you the best possible prices. Quotes can come in minutes, however it's best to wait 24 hours to allow all the motorcycle transport couriers to quote. In the mean time you can ask questions, negotiate and chat with the motorbike transportation companies. You can also compare the transportation companies feedback and you can leave feedback yourself to help build a reliable and honest courier service community after delivery.
    </p>
    <p>
    We also recommend that you:
    <ul>
        <li>
        Check insurance levels with the carrier, some couriers can offer increased insurance levels and some can be very low and it's always a good idea to take photos before and after transportation in case an insurance claim is required. 
        </li>
        <li>
        The driver should have ratchet straps etc. but it is a question you could ask.
        </li>
        <li>
        If you have a time for collection or delivery you should mention this on your transportation quote compare listing, it could reduce quotes but it is an option.
        </li>
    </ul>
    Don't forget to check you delivery when you receive it and to leave feedback so we can make the Couriers Connect experience a positive one for all
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