@inject('translator', 'App\Providers\TranslationProvider')

<div class="home-splash" style="background-image: url('{{ $image }}');">
    <div class="splash-container">
        <div class="title" style="color: #6D5959;">
            <h1>Get Pets and Livestpck Delivery Quotes with Couriers Connect</h1>
        </div>
        <div class="tag-line" style="color: #6D5959;">
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
    Courier Service Quotes for Livestock, Pets and Equestrian:
    </h1>
    <p>
    Quickly be in contact with thousands of possible couriers and haulage companies to ship all your loved and valuable pets and livestock. We have couriers specialising in the transportation of live stock and all living animals. They are waiting to offer you the best competitive courier quotes. Our carriers can move almost any animal anywhere including: Cats, Dogs, Fish, Small mammals, Birds, Reptiles, Rabbits, Amphibians, Horses, Equine, Chickens, Cows, Donkeys, Ducks, Ferrets, Goats, Hamsters, Lizards, Pigs and Hogs, Ponies, Pig, Sheep, Snakes and much more.
    </p>
    <p>
    It's easy, simple and it’s much cheaper than going to a carrier directly for a specialised animal courier service. Just fill in our easy form to explain what live-stock and animals you require moving and the couriers and freight shipping companies will quote you with an unbelievable cheap price.
    </p>
    <p>
    Although livestock transportation is a very specialised courier service if a courier is driving to deliver animals to Manchester from Devon etc. and the cargo doesn't fill the van or truck or it could even be a family going to Spain with a spare seat. There could be space on the trip or return trip for more animals or pets. They could collect your beloved pets or valuable live-stock for you. This gets the best price for you and the courier, it also saves money and helps to save the environment. The courier service you needed could be within the UK, Europe or even World Wide.
    </p>
    <p>
    You are more likely to obtain the cheapest competitive quote from a courier if you send photographs with dimensions and weights if possible. After you have completed the quote comparison form just sit back and wait for the carrier quotes to roll in and give you the best cheapest prices possible. The more information you can give will get you the most quotes and you can then compare all the services available.
    </p>
    <p>
    Quotes will come in minutes but you can wait 24 hours or more to allow all the couriers to competitively quote. In the mean time you can ask any questions and even negotiate with hundreds of national or international freight shipping delivery services. You can compare the carrier's feedback for the service quality and price. You can then also leave feedback to help build a reliable courier service community.
    </p>
    <p>
    We also recommend that you:
    <ul>
        <li>
        Check insurance with the carrier as some couriers can offer increased insurance levels and it's important to know. As this is a specialised service you will need to add all relevant details for the animal and service that you think is important.
        </li>
        <li>
        If your collection or delivery service needs to be made within a time window you should mention this on your quote compare listing, it could reduce quotes but if you need it you need it.
        </li>
    </ul>
    Don't forget to check you animals when you receive them and to leave feedback so we can make the Couriers Connect experience a positive one for all.    </p>
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