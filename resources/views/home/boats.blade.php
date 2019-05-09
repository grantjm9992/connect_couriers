@inject('translator', 'App\Providers\TranslationProvider')

<div class="home-splash" style="background-image: url('couriers-service-quote/boat-courier-service.jpg');">
    <div class="splash-container">
        <div class="title" style="text-shadow: 2px 2px 2px #454545;">
            <h1>
                Get Boat Delivery Quotes with Couriers Connect
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
                        $('#id_category').val(8);
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
    Compare Competitive Quotes for Boat Delivery Services
    </h1>
    <p>
    You can be in contact with thousands of possible couriers and haulage companies to collect and deliver your boat, barge, canoe, catamaran, craft, dinghy, gondola, raft, sailboat, schooner, ship, yacht, etc. within minutes.
    </p>
    <p>
    It’s much cheaper than going direct to a specialist carrier for a dedicated courier service and it's easy, simple and most of all you Just fill in our short courier quote request form to explain what goods you need to move. Then wait for the couriers, freight and haulage specialised companies to contact you with an unbelievable competitive quality quote.
    </p>
    <p>
    For example if a courier is delivering a boat to France from Birmingham there could be space on the return trip for your vessel. This obtains the best price for both you and the boat delivery freight company. It also saves money and helps to save the environment. The boat transportation service could be within the UK, Europe or World Wide.
    </p>
    <p>
    You are more likely to obtain a cheap competitive comparison quote from a courier company if you send photographs with dimensions and weights if possible. After you have filled out the short quote comparison form for the boat delivery etc. just sit back and wait for the carrier quotes to roll in and to give you the best price possible. The more information you give will get you more quotes to compare as the couriers compete and this also drives down the total price for you.
    </p>
    <p>
    Quotes can come in minutes but it's better to wait at least 24 hours to allow all the haulage companies to quote. In the mean time you can ask questions and negotiate with possibly hundreds of national or international specialist boat transportation firms. You can also compare the carrier's feedback for their delivery, service, quality and price. You can then if you would like to, leave feedback yourself to add to building a reliable and honest courier service community.
    </p>
    <p>
    We also recommend that you:
    <ul>
        <li>
        Check insurance levels with the carrier as some transportation companies can offer increased insurance levels and it's very important to know. It's also always a very good idea to take a photo before and after delivery in case in the unfortunate event that an insurance claim is required. 
        </li>
        <li>
        Check if there is an adequate packaging and securing service included for the vessel or you may need to package yourself.
        </li>
        <li>
        If your collection or delivery service needs to be made within a strict time scale you should mention this on your freight quote compare listing, it could reduce quotes offered but sometimes especially with larger freight it is required
        </li>
    </ul>
    Don't forget to check your boat when you receive it and to leave feedback so we can make the Couriers Connect experience a positive one for all.
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