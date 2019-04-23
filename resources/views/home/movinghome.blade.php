@inject('translator', 'App\Providers\TranslationProvider')

<div class="home-splash" style="background-image: url('{{ $image }}'); background-position: bottom;">
    <div class="splash-container">
        <div class="title">
            <h1>Get Furniture and Home Removal Quotes with Couriers Connect</h1>
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
    Compare Competitive Courier Quotes for Home and Furniture Removals:
    </h1>
    <p>
    Couriers connect can connect you to thousands of possible couriers and haulage companies to ship all your furniture and white goods. If you are moving home, relocating, emigrating, moving furniture, home removal, moving house or becoming an expat. There are haulage companies waiting to quote you cheap for all your house and home moving needs.
    </p>
    <p>
    It's easy, simple and much cheaper than going directly to a carrier for a specialised home removal service. You only need to fill in our short form to give the shipping company an idea of what goods you need to move and to where. The freight companies will then contact you with an unbelievably cheap and reliable haulage quote.
    </p>
    <p>
    If a courier is driving to deliver furniture in Manchester from Birmingham or even Spain the furniture might not fill the van so there could be space on the outward or return trip for more home removals. The haulage company could collect your furniture, white goods or any freight you may have. This gets the best price for you and the courier company doesn't drive back with an empty load. This saves you both money and also helps to save the environment. The courier service can be UK, Europe or even World Wide.
    </p>
    <p>
    It's more likely that you can obtain a cheap competitive comparison quote from a haulage shipping company if you supply photographs with dimensions and weights where possible. Then you can fill out the quote comparison form and just sit back and wait for the carrier quotes to roll in to give you the best shipping prices possible. The more information you give will give you better, more accurate and cheaper quotes.
    </p>
    <p>
    Quotes can come within minutes but to wait 24 hours to allow all the couriers to quote can be best sometimes. You can also ask questions and negotiate with hundreds of national or international freight delivery services. You will also be able to compare the carrier's feedback for their delivery, service, quality and price. You can then leave feedback yourself to help build a reliable and honest courier service community.
    </p>
    <p>
    We also recommend that you:
    <ul>
        <li>
        Check insurance with the carrier as some couriers can offer increased insurance levels and it's important to know what is covered. It's also always a good idea to take photos before and after packaging just in case in the unfortunate event that an insurance claim is needed. 
        </li>
        <li>
        Check if there is a packaging service included if you require one or you may need to package your furniture yourself.
        </li>
        <li>
        If your shipping and haulage services needs to be made within a window of time you should mention this on your quote compare listing.
        </li>
    </ul>
    Don't forget to check your delivery when it arrives and to leave feedback so we can make the Couriers Connect experience a positive one for all.
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