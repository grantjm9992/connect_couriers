@inject('translator', 'App\Providers\TranslationProvider')

<div class="home-splash">
    <div class="splash-container">
        <div class="title">
            <div>Connect to couriers</div>
            <div>Compare quotes</div>
            <div>Save money</div>
        </div>
        <h1 class="tag-line">
            Courier quote comparison made easy
        </h1>
        <form action="Listings.new">
            <div class="input-group mb-3">
                <select name="id_category" id="id_category" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    @foreach ( $categories as $category )
                        <option value="{{ $category->id_category }}">{{ $category->str_category }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-cc input-group-text" id="basic-addon2">Get Quotes</button>
                </div>
            </div>
        </form>
    </div>    
</div>
<div class="container-fluid first">
    <h4>Why use us?</h4>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="box">
                <div class="box-icon">
                    <img src="archivos/img/user.png" alt="transport service providers">
                </div>
                <h3>Trustworthy</h3>
                <p>All of our couriers are rated by customers just like you, so you can breathe easy.</p>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="box">
                <div class="box-icon">
                    <img src="archivos/img/approve-invoice.png" alt="simple and easy delivery">
                </div>
                <h3>Simple and Quick</h3>
                <p>Just fill out our simple form, in less than 60 seconds, and start recieving quotes for your delivery.</p>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="box">
                <div class="box-icon">
                    <img src="archivos/img/portfolio-icon-5.png" alt="delivery services">
                </div>
                <h3>Take control</h3>
                <p>You choose the courier and service you want. All from the comfort of your mobile phone.</p>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="box">
                <div class="box-icon">
                    <img src="archivos/img/hand.png" alt="cheap delivery services">
                </div>
                <h3>Save money</h3>
                <p>With our couriers competing for your delivery, you can save up to 75%.</p>
            </div>
        </div>
    </div>
</div>


<div class="section-services">
    <h4>Our Services</h4>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <a href="Home-And-Garden">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fas fa-couch"></i>
                    </div>
                    <div class="service-title">
                        Home and Garden
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <a href="Vehicle-Parts">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="service-title">
                        Vehicle Parts
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <a href="Cars">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <div class="service-title">
                        Cars
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <a href="Motorcycles">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fas fa-motorcycle"></i>
                    </div>
                    <div class="service-title">
                        Motorcylces
                    </div>
                </div>
            </a>
        </div>
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
            <a href="Moving-Home">
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
        <div class="col-12 col-sm-6 col-md-3 d-none d-md-block">
            <a href="Haulage">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fas fa-truck-loading"></i>
                    </div>
                    <div class="service-title">
                        Haulage
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-3 d-none d-md-block">
            <a href="Pets-And-Livestock">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fas fa-paw"></i>
                    </div>
                    <div class="service-title">
                        Pets and Livestock
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-3 d-none d-md-block">
            <a href="Boats">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fas fa-ship"></i>
                    </div>
                    <div class="service-title">
                        Boats
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-3 d-none d-md-block">
            <a href="Other-Items">
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <div class="service-title">
                        Other Items
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
<section style="text-align: left;" class="section bg-darkGrey">
    <div class="row">
        <div class="col-12">
            <h5>About Us</h5>
            <p>
                <h4 class="small-h4">Courier quote comparisons are made easy at Couriers Connect. Simply connect to couriers via our short quote comparison form and then receive emails and dashboard responses from trustworthy carriers, freight companies, haulage companies and even a "Man With A Van". You will receive competitive quotes from trusted and rated delivery service business within the logistics industry and you can also see their feedback and ratings. The quotes can be very competitive because many of our carriers are returning from deliveries with an empty or part empty van or truck or even delivering to an area with a part load so they have spare space. We also have haulage shipping companies who are specialists in certain logistical areas and they are waiting to compete against each other with a quote on your listing.</h4 class="small-h4">
            </p>
            <p>
                <h4 class="small-h4">Couriers Connect have been in the courier and freight shipping industry for over 12 years and we have seen the needless transportation of part loads and empty trucks and vans returning empty when there are customers requiring their services. It's not just regular freight, you can also ask for a quote on international courier services, a chilled truck freight service, full home removals, car, motorbike, any vehicle deliveries or even a livestock delivery. If a suitable carrier isn’t on our system to quote we will actively search for a freight company and ask them to quote so you will always receive the best price.</h4 class="small-h4">
            </p>
            <p>
                <h4 class="small-h4">eBay buyers and sellers also use Couriers Connect for their eBay courier delivery services. You just need to add the eBay number with the collection and delivery postcodes and we do the rest.</h4 class="small-h4">
            </p>
            <p>
                <h4 class="small-h4">If you need an easy, smooth and cheap courier service or you need to ship something a bit more specialised we are here to help and we can answer any questions or concerns you may have.</h4 class="small-h4">
            </p>
            <p>
                The Couriers Connect team
            </p>
        </div>
    </div>
</section>