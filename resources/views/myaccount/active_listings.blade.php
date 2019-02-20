@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid" style="padding: 40px 15px; max-width: 1100px; margin: 0 auto;">
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3 col-xl-3">
            <div class="list-group">
                <a href="{{ url('/MyAccount') }}" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt"></i> Summary</a>
                <a href="{{url('/MyAccount.myActiveListings')}}" class="list-group-item list-group-item-action"><i class="fas fa-box-open"></i> Active Listings</a>
                <a href="{{url('/MyAccount.myAcceptedQuotes')}}" class="list-group-item list-group-item-action"><i class="fas fa-handshake"></i> Accepted Quotes</a>
                <a href="{{url('/MyAccount.myExpiredListings')}}" class="list-group-item list-group-item-action"><i class="fas fa-clock"></i> Expired Listings</a>                <a href="{{url('/Messages')}}" class="list-group-item list-group-item-action"><i class="fas fa-envelope"></i> Messages</a>
                <a href="{{url('/MyAccount.detail')}}" class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Account</a>
                <a href="{{url('/Login.logout')}}" class="list-group-item list-group-item-action"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-md-8 col-lg-9 col-xl-9 account-list"  id="listings">
            <h4><i class="fas fa-hourglass-half"></i> Active Listings</h4>
            {!! $listings !!}
        </div>
    </div>
</div>