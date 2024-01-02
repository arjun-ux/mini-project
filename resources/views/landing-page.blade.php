<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

<nav class="navbar navbar-light navbar-expand-lg bg-light">
    <div class="container-fluid p-2">

      <a class="navbar-brand fw-bold" href="/">Teddy's Mart</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li>
                        <a class="nav-link active" aria-current="page" href="#">Produk</a>
                    </li>
                    <li>
                        <a class="nav-link active" aria-current="page" href="#">Service</a>
                    </li>

                </ul>
                <ul class="navbar-nav">
                    @guest
                    <a class="btn btn-primary" href="/login">Login</a>
                    @else
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Selamat Datang, <strong>{{ Auth::user()->name }}</strong>
                        <img class="img-profile rounded-circle border" src="img/profile.png" width="30">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                            <li>
                                <a class="dropdown-item" href="/dashboard"><i class="fas fa-fw fa-home mr-2 text-gray-400"></i>Dashboard</a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <a class="dropdown-item" href="/myProfile"><i class="fas fa-user fa-fw mr-2 text-gray-400"></i>Profile</a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-sign-out-alt fa-fw mr-2 text-gray-400"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Logout Modal-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Anda Yakin Mau Keluar?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cencel</button>
                        <a class="btn btn-danger" href="#">Logout</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endguest
              </ul>
            </div>
    </div>
  </nav>

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col">
                <img class="imgHead img-fluid" src="{{ asset('img/head.png') }}" alt="" width="100%">
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
