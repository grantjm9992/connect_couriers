@inject('translator', 'App\Providers\TranslationProvider')

<div class="home-splash" alt="Courier Haulage Service Shiply" style="background-image: url('couriers-service-quote/ebay-courier-service.jpeg');">
    <div class="splash-container">
        <div class="title" style="text-shadow: 2px 2px 2px #454545;">
            <h1>Get Ebay Delivery Quotes with Couriers Connect</h1>
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
    Compare Competitive Quotes for all your eBay Goods:
    </h1>
    <p>
    Couriers connect will contact with thousands of possible couriers and haulage companies to ship all your eBay purchases and sales.
    </p>
    <p>
    It's easy, simple and most of all it’s much cheaper than going direct to a carrier for a dedicated courier service. Just fill in our short form to explain what eBay goods you need to move and include a link or an eBay item number and wait for couriers, freight companies and even a man with a van to contact you with an unbelievably cheap quality quote for just about anything you buy on eBay.
    </p>
    <p>
    For example if a courier is driving to deliver furniture or a car in Manchester from Birmingham and the cargo doesn't fill the van there could be space on the return trip or the outgoing journey for items you have purchased via eBay. They could collect your eBay items and deliver them directly to your home or place of work. You will get a very good courier price for your eBay purchase or sale and the courier company also saves money on empty trips or part loads. It also helps to save the environment. The courier service could collect and deliver your eBay goods within the UK, Europe or World Wide, you just need to ask.
    </p>
    <p>
    You are more likely to obtain a cheaper competitive comparison quote for your eBay parcels from a courier company if you send the item number or a link. After you have filled out the quote comparison form for the eBay delivery just sit back and wait for the carrier quotes to roll in and give you the best price possible. The more information you can give will get you more quotes to compare as the couriers compete and this also drives down the price for any eBay deliveries.
    </p>
    <p>
    Quotes can come in minutes, however it's best to wait 24 hours to allow all the couriers to quote. Whilst you are waiting you can ask questions and negotiate with hundreds of national or international delivery courier services for all your eBay items. You can also compare the carrier's feedback and you can then also leave feedback yourself to help build a reliable and honest courier service community.
    </p>
    <p>
    We also recommend that you:
    <ul>
        <li>
        Check insurance with the carrier as some couriers can offer increased insurance levels and it's important to know the levels. It's also a good idea to take a photo before and after packaging in-case in the event that an insurance claim. 
        </li>
        <li>
        Check if there is a packaging service included for the eBay parcels or you may need to package yourself.
        </li>
        <li>
        If your eBay collection or delivery service needs to be made at a certain time you should mention this on your quote compare listing, it can reduce quotes but if you need to don't hesitate to mention it.
        </li>
    </ul>
    Don't forget to check your delivery when you have received it and to leave feedback so we can make the Couriers Connect experience a positive one for all.
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