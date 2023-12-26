<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="{{asset('assets')}}/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets')}}/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body style="background : rgb(203, 233, 224)">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 ">
                
                <div class="card o-hidden border-8 shadow-lg my-5 ">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row ">
                            <div class=" col-lg-6  d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h2 class="h2 text-gray-900 mb-4">
                                            Sistem Pencatatan Persediaan Barang Gudang</h2>
                                            <hr>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="h3 text-gray-900 mb-4">Selamat Datang!</h3>
                                    </div>
                                    <form method="POST" action="">
                                        @csrf
                                        <div class="form-group">
                                        <label class="form-label" for="email"><b>Email</label>
                                            <input  type="email" name="email" id="email" class="form-control "
                                                placeholder="Masukkan email" required>
                                        </div>
                                        <div class="form-group mb-4">
                                        <label class="form-label" for="password"><b>Password</label>
                                            <input  type="password" name="password" id="password"
                                                class="form-control" placeholder="Masukkan password" required>
                                        </div>
                                
                                        <div>
                                        <button  type="submit" class="btn btn-info form-control"><b>Login</button>
                                        </div>
                                    </form>
                                    
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets')}}/js/sb-admin-2.min.js"></script>

</body>

</html>