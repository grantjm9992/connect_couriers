@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid" style="margin-top: 140px;">
    <div class="row">
        <div class="col-12 col-md-5" style="margin: 0 auto;">
            <form action="Login.checkCourier">
                <div class="form-group">
                    <label for="str_name">Name</label>
                    <input type="text" class="form-control" name="str_name">
                </div>
                <div class="form-group">
                    <label for="str_surname">Surname</label>
                    <input type="text" class="form-control" name="str_surname">
                </div>
                <div class="form-group">
                    <label for="str_email">Email</label>
                    <input type="text" class="form-control" name="str_email">
                </div>
                <div class="form-group">
                    <label for="str_password">Password</label>
                    <input type="password" class="form-control" name="str_password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" style="width: 100%;">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('/js/set-menu.js')}}"></script>