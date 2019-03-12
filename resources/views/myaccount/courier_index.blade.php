@inject('translator', 'App\Providers\TranslationProvider')

<div class="container-fluid" style="padding: 40px 15px; max-width: 1100px; margin: 0 auto;">
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3 col-xl-3">
            <div class="list-group">
                <a href="MyAccount" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt"></i> Summary</a>
                <a href="MyQuotes.myActiveQuotes" class="list-group-item list-group-item-action"><i class="fas fa-box-open"></i> Active Quotes</a>
                <a href="MyQuotes.myAcceptedQuotes" class="list-group-item list-group-item-action"><i class="fas fa-check-circle"></i> Accepted Quotes</a>
                <a href="MyQuotes.myUnsuccessfulQuotes" class="list-group-item list-group-item-action"><i class="fas fa-times-circle"></i> Unsuccessful Quotes</a>
                <a href="MyQuotes.myOutbidQuotes" class="list-group-item list-group-item-action"><i class="fas fa-thumbs-down"></i> Outbid Quotes</a>
                <a href="MyQuotes.myCompletedQuotes" class="list-group-item list-group-item-action"><i class="fas fa-handshake"></i> Completed Quotes</a>
                <a href="Messages" class="list-group-item list-group-item-action"><i class="fas fa-envelope"></i> Messages</a>
                <a href="MyAccount.detail" class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Account</a>
                <a href="Login.logout" class="list-group-item list-group-item-action"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-9 col-xl-9 account-list">
            
        <h4 style="margin: 15px 0;"><i class="fas fa-tachometer-alt"></i> Summary</h4>
            <div class="row" style="justify-content: space-around;">
                <div class="col-xs-12 col-sm-4 listing-summary">
                    <a href="MyQuotes.myOutbidQuotes" style="color: orange;">
                        <p>
                        {{ $outbid }} <i class="fas fa-thumbs-down"></i>
                        </p>
                        <p>
                        Outbid quotes
                        </p>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 listing-summary">
                    <a href="MyQuotes.myActiveQuotes" style="color: #454545;">
                        <p>
                            {{ $active }} <i class="fas fa-box-open"></i>
                        </p>
                        <p>
                        Active quotes
                        </p>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 listing-summary">
                    <a href="MyQuotes.myAcceptedQuotes" style="color: blue;">
                        <p>
                        {{ $accepted }} <i class="fas fa-check-circle"></i>
                        </p>
                        <p>
                        Accepted quotes
                        </p>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 listing-summary">
                    <a href="MyQuotes.myUnsuccessfulQuotes" style="color: red;">
                        <p>
                        {{ $unsuccessful }} <i class="fas fa-times-circle"></i>
                        </p>
                        <p>
                        Unsuccessful quotes
                        </p>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4 listing-summary">
                    <a href="MyQuotes.myCompletedQuotes" style="color: green;">
                        <p>
                        {{ $completed }} <i class="fas fa-handshake"></i>
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