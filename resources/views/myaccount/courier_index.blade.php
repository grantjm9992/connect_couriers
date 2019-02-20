@inject('translator', 'App\Providers\TranslationProvider')

<div class="container-fluid" style="padding: 40px 15px; max-width: 1100px; margin: 0 auto;">
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3 col-xl-3">
            <div class="list-group">
                <a href="/MyAccount" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt"></i> Summary</a>
                <a href="/MyAccount.myQuotes?id_status=1" class="list-group-item list-group-item-action"><i class="fas fa-box-open"></i> Active Quotes</a>
                <a href="/MyAccount.myQuotes?id_status=2" class="list-group-item list-group-item-action"><i class="fas fa-check-circle"></i> Accepted Quotes</a>
                <a href="/MyAccount.myQuotes?id_status=3" class="list-group-item list-group-item-action"><i class="fas fa-times-circle"></i> Unsuccessful Quotes</a>
                <a href="/MyAccount.myQuotes?id_status=1&winner=0" class="list-group-item list-group-item-action"><i class="fas fa-thumbs-down"></i> Outbid Quotes</a>
                <a href="/MyAccount.myQuotes?id_status=2&status=3" class="list-group-item list-group-item-action"><i class="fas fa-handshake"></i> Completed Quotes</a>
                <a href="/Messages" class="list-group-item list-group-item-action"><i class="fas fa-envelope"></i> Messages</a>
                <a href="/MyAccount.detail" class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Account</a>
                <a href="/Login.logout" class="list-group-item list-group-item-action"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-9 col-xl-9 account-list">
            
        <h4 style="margin: 15px 0;"><i class="fas fa-tachometer-alt"></i> Summary</h4>
            <div class="row" style="justify-content: space-around;">
                <div class="col-xs-12 col-sm-4 listing-summary">
                    <a href="MyAccount.myExpiredListings" style="color: orange;">
                        <p>
                        4 <i class="fas fa-thumbs-down"></i>
                        </p>
                        <p>
                        Outbid quotes
                        </p>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 listing-summary">
                    <a href="MyAccount.myActiveListings" style="color: #454545;">
                        <p>
                            2 <i class="fas fa-box-open"></i>
                        </p>
                        <p>
                        Active quotes
                        </p>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 listing-summary">
                    <a href="MyAccount.myAcceptedQuotes" style="color: blue;">
                        <p>
                        2 <i class="fas fa-check-circle"></i>
                        </p>
                        <p>
                        Accepted quotes
                        </p>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 listing-summary">
                    <a href="MyAccount.myExpiredListings" style="color: red;">
                        <p>
                        10 <i class="fas fa-times-circle"></i>
                        </p>
                        <p>
                        Unsuccessful quotes
                        </p>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 listing-summary">
                    <a href="MyAccount.myExpiredListings" style="color: green;">
                        <p>
                        12 <i class="fas fa-handshake"></i>
                        </p>
                        <p>
                        Completed quotes
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>