@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid" style="margin-top: 140px;">
    <div class="row">
        <div class="col-12 col-md-5" style="margin: 0 auto;">
            <form action="Login.checkLogin">
                <div class="form-group">
                    <label for="login">Username</label>
                    <input type="text" class="form-control" name="login">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
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