<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>OKKIStore | Login Page</title>
        <link href="/vendor/sbadmin/css/styles.css" rel="stylesheet" />
        <script src="/vendor/fontawesome/js/all.js"></script>
        <style>
            .card-header img{
                width: 75px;
            }
        </style>
    </head>
    <body class="bg-black">
        <div class="container vh-100 d-flex align-items-center">
            <div class="row w-100 justify-content-center">
                <div class="col-5">
                    @if (session('info'))
                    <div class="alert alert-secondary alert-dismissible fade show text-center" role="alert">
                        {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <div class="card p-4">
                        <div class="card-header text-center border-0">
                            <img src="/img/logo.png" alt="">
                            <h2>Login Aplikasi</h2>
                        </div>
                        <div class="card-body">
                            <form action="/login" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control py-2" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control py-2" name="password" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary py-3 rounded-0">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
