@inject('translator', 'App\Providers\TranslationProvider')

<div class="home-splash">
    <div class="splash-container">
        <div class="title">
            <h1>
                Get Boxes Delivery Quotes with Couriers Connect
            </h1>
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
    Compare Cheap Courier Quotes for General Boxes and Wrapped Parcels
    </h1>
    <p>
    There are thousands of possible couriers and haulage companies to help deliver all your boxed parcels and goods. You can get multiple quotes from multiple carriers no matter how large or small your boxed or wrapped parcels are and you can then choose the cheapest, the most convenient, the most specialised or the most trusted courier.
    </p>
    <p>
    It’s much cheaper, much easier and much simpler than going direct to a carrier for a dedicated courier service. Most of all there are hundreds in the same place waiting to compete on a quote for you. Just fill in our short form to explain what goods you need to move and wait for the couriers, freight companies and even a man with a van will contact you with an unbelievable competitive quote.
    </p>
    <p>
    If a courier is driving to deliver a consignment to Leeds from Birmingham for example and the parcels collected don't fill the van there could be space on the journey or on the return trip for more goods. The driver could collect your boxes, parcels or any goods or freight you may have to fill this space. This gets the best competitive price for you to compare and the courier also saves money and helps to save the environment by reducing wasted journeys and fuel. The courier service you require could be UK, Europe or World Wide.
    </p>
    <p>
    To compare the cheapest and most competitive comparison quote from a courier company its best if you send photographs with dimensions and weights. After you have filled out the quote compare form just sit back and wait for the carriers to quotes and give you the best prices possible. The more information you can give will get you more quotes to compare.
    </p>
    <p>
    Quotes usually arrive within minutes but some can take 24 hours so allow all the couriers to quote. You can ask questions, negotiate or barter with hundreds of national and international courier companies. You can leave feedback and you can also compare the carrier's feedback for their courier service to make sure you are getting the best quality and price.
    </p>
    <p>
    We also recommend that you:
    <ul>
        <li>
        Check insurance levels with the carriers as some couriers can offer increased insurance levels and it's very important if you are transporting something fragile. It's a good idea to take some photos before and after packaging in case an insurance claim is required. 
        </li>
        <li>
        Also check if there is a packaging service included if needed or you could need to package yourself.
        </li>
        <li>
        It could reduce quotes but if you need your collection or delivery to be made within a window of time you should also mention this on your quote comparison listing. 
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