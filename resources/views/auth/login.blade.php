<h1>Halaman login</h1>
<form action="{{ route('doLogin') }}" method="post">
@csrf
<label for="username">Username: </label><br>
<input type="text" id="username" name="name"><br>
<label for="password">Password: </label><br>
<input type="password" id="password" name="password"><br>
<button type="submit">Login</button>
</form>
<div class="container form-login">
    <div class="row flex-row-reverse">
        <div class="col-md-4 mt-5">
            <div class="card card-form-login-maba mt-5">
                <div class="card-body">
                    <form action="/login-maba" method="post">
                        @csrf
                        <div class="row">

                            <h2 class="fw-bold">Login</h2>

                            <div class="input-icons">
                                <i class="fa fa-user icon">
                                </i>
                                <input class="input-field" type="text" placeholder="Email" name="email">
                            </div>

                            <div class="input-icons">
                                <i class="fa fa-key icon">
                                </i>
                                <input class="input-field" type="password" placeholder="Password" name="password">
                            </div>
                            <div class="input-icons">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-iaida text-white">login</button>
                                </div>
                            </div>
                            <a href="forgot_password" class="text-black">*) Klik disini jika lupa password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
