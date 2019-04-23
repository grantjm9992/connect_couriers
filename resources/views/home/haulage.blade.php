@inject('translator', 'App\Providers\TranslationProvider')

<div class="home-splash">
    <div class="splash-container">
        <div class="title">
            <h1>Get Haulage Quotes with Couriers Connect</h1>
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
                        $('#id_category').val(7);
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
    Compare Competitive Quotes for Haulage Shipments:
    </h1>
    <p>
    We are in contact with thousands of possible haulage courier companies to competitively handle and ship all your transportation needs.
    </p>
    <p>
    It's easy, simple and most of all it’s cheaper than going direct to couriers for a dedicated delivery service. Just fill in our short shipment form and explain what merchandise you need to move and wait for the couriers, freight haulage companies and a man with a van to contact you with an unbelievable cheap quality shipping quote.
    </p>
    <p>
    For example if a haulage company is driving to deliver a payload to Manchester from Aberdeen and the payload doesn't fill the van there could be space on the return trip for your consignment and they could collect your goods or stock. This will get you the best price for your freight carriage. The haulage company also saves money and this saving is passed on to you and it also helps to save the environment. All the haulage shipping services can be within the UK, Europe or World Wide.
    </p>
    <p>
    You are more likely to obtain a competitive cheap comparison quote from a carrier if you send photographs along with dimensions and weights. You can fill in a short quote comparison form and just sit back and wait for the carriers to quotes for the best price possible. The more information you could give will get you the best quotes to compare. The couriers compete and this will also drive down the price for you.
    </p>
    <p>
    Quotes will arrive in minutes but it's best to wait 24 hours to allow all the couriers to quote competitively. In the mean time you can ask any questions and even negotiate with hundreds of national or international freight delivery services. You can also compare the feedback of the haulage companies for their delivery, service, quality and price. You can then also leave feedback yourself to help build a reliable and honest courier service community within Couriers Connect.
    </p>
    <p>
    We also recommend that you:
    <ul>
        <li>
        Check insurance with the haulage shipping firm as some haulage companies can offer increased insurance levels and it's very important to know. It's always a very good idea to take a photo before and after collection and delivery in case in the unfortunate event that an insurance claim is needed. 
        </li>
        <li>
        Check if there is a packaging service included for the consignment or you may need to package the goods yourself.
        </li>
        <li>
        If your collection or delivery service needs to be made within a timescale you should mention this on your quote listing, it could reduce quotes but it could be very important to you.
        </li>
    </ul>
    Don't forget to check your delivery when you receive it and to leave feedback so we can all make the Couriers Connect experience a positive one for everyone.
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