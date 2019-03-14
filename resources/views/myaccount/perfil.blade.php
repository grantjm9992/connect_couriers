@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid" style="padding: 40px 15px; max-width: 1100px; margin: 0 auto;">
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3 col-xl-3">
            <div class="list-group">
                <a href="{{ url('/MyAccount') }}" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt"></i> Summary</a>
                <a href="{{url('/MyAccount.myActiveListings')}}" class="list-group-item list-group-item-action"><i class="fas fa-box-open"></i> Active Listings</a>
                <a href="{{url('/MyAccount.myAcceptedQuotes')}}" class="list-group-item list-group-item-action"><i class="fas fa-handshake"></i> Accepted Quotes</a>
                <a href="{{url('/MyAccount.myExpiredListings')}}" class="list-group-item list-group-item-action"><i class="fas fa-clock"></i> Expired Listings</a>
                <a href="{{url('/Messages')}}" class="list-group-item list-group-item-action"><i class="fas fa-envelope"></i> Messages</a>
                <a href="{{url('/MyAccount.detail')}}" class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Account</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-md-8 col-lg-9 col-xl-9 account-list">
            <form id="form" action="MyAccount.edit">
                @csrf()
                <h4>
                    <i class="fas fa-user-circle"></i> My account
                    <div class="buttons">
                        <div onclick="submitForm()" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save
                        </div>
                    </div>            
                </h4>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="str_name">Name</label>
                        <input type="text" class="form-control" name="str_name" value="{{ $user->str_name }}">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="str_surname">Surname</label>
                        <input type="text" class="form-control" name="str_surname" value="{{ $user->str_surname }}">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="str_email">Email</label>
                        <input type="email" class="form-control" name="str_email" value="{{ $user->str_email }}">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="num_phone">Phone</label>
                        <input type="text" class="form-control" name="num_phone" value="{{ $user->num_phone }}">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="str_password">Password</label>
                        <input type="password" class="form-control" name="str_password">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="str_password2">Confirm password</label>
                        <input type="password" class="form-control" name="str_password2">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var isOkay = 0;
    function submitForm()
    {
        var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})");
        if ( $('[name="str_password"]').val() != $('[name="str_password2"]').val() )
        {
            var options = new Array();
            options.title = "Error";
            options.text = "Passwords do not match";
            options.icon = "error";
            alert(options);
            $('[name="str_password"]').focus();
        }
        else if ( !strongRegex.test( $('[name="str_password"]').val() ) && $('[name="str_password"]').val() != "" )
        {

            var options = new Array();
            options.title = "Error";
            options.text = "Password must contain an uppercase and lowercase letter, number and be at least 8 characters";
            options.icon = "warning";
            alert(options);
        } 
        else
        {
            $('#form').submit();
        }
    }

</script>