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
        <div class="col-12 col-md-6 col-md-8 col-lg-9 col-xl-9 account-list"  id="listings">
            <h4><i class="fas {{ $iconClass }}"></i> {{ $title }}</h4>
            {!! $list !!}
        </div>
    </div>
</div>