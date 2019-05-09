@inject('translator', 'App\Providers\TranslationProvider')

<div class="home-splash" style="background-image: url('couriers-service-quote/courier-quote-compare.jpg');">
    <div class="splash-container">
        <div class="title" style="text-shadow: 2px 2px 2px #454545;">
            <h1>
                Get Delivery Quotes with Couriers Connect
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
    Courier Comparison Quote Site for all general goods and vehicles
    </h1>
    <p>
    Couriers connect help you to connect to couriers and haulage companies to ship anything you may need delivering. Our trusted couriers can help you to move anything including: FURNITURE, MOTORBIKES, PUSHBIKES, GOKARTS, RIDEONS, CARS, BAY GOODS, FRAGILE ITEMS, BOATS, REMOVALS, GENERAL ITEMS, BOXES, OTHER VEHICLES, VEHICLE PARTS, MOVING HOME, HAULAGE, PALLETS, PIANOS, PETS & LIVESTOCK, WHITE GOODS, GARDEN EQUIPMENT, KITCHENS, BATHROOMS, FOOD , OFFICE FURNITURE, GENERATORS, ENGINES and just about anything else.
    </p>
    <p>
    Just fill in our short form to explain what goods you need to move and wait for the couriers, freight companies and even a man with a van will contact you with an unbelievable cheap quality quote. It's easy, simple and most of all its much cheaper than going direct to a carrier for a dedicated courier service.
    </p>
    <p>
    If a courier is driving to deliver a consignment in Birmingham to be delivered to Manchester and the cargo doesn't fill the van there could be space on the return trip for more goods. They could collect your parcels goods or any freight you may have. This gets you the best price and the courier company also saves money and helps to save the environment. The delivery service could be within the UK, Europe or any where in the World.
    </p>
    <p>
    If you send photographs with dimensions and consignment weight you are more likely to obtain a cheap competitive quote. After you have filled out the quote comparison form just sit back and wait for the carrier quotes to roll in to give you the best possible price. The more information you can give will get you more quotes to compare as the couriers compete for your business.
    </p>
    <p>
    Quotes can come in minutes, however it's best to wait 24 hours to allow all the couriers to quote. In the mean time you can ask questions and negotiate with the couriers that have quoted. You can also compare the carrier's feedback and you can then leave feedback yourself to help build a reliable and honest courier service community.
    </p>
    <p>
    We also recommend that you:
    <ul>
        <li>
        Check insurance levels with the carrier because some couriers can offer increased insurance levels and some can be very low. It's important to know and it's always a good idea to take photos before and after packaging in case an insurance claim is required. 
        </li>
        <li>
        Check if there is a packaging service included for larger items or you may need to package these items yourself.
        </li>
        <li>
        If you have a window of time for collection or delivery you should mention this on your quote compare listing for the couriers, it could reduce quotes but it is an option.
        </li>
    </ul>
    Don't forget to leave feedback and to check you delivery when you receive it so we can make the Couriers Connect experience a positive one for all.
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