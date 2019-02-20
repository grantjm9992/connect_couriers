@inject('translator', 'App\Providers\TranslationProvider')
<div class="modal" tabindex="-1" role="dialog" id="loginModal">
    <div class="modal-dialog large-modal" role="document">
        <div class="modal-content">
            <form action="Login.checkLogin">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="login">Username</label>
                        <input type="text" class="form-control" name="login">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        Login
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
<script>
    $(document).ready(function () {
        $('#loginModal').modal('show');
    })
</script> 
</div>