<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Techsaga || Mini Admin Panel</title>
    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('asset/customcss/style.css')}}">
</head>
<body>
    <div class="container mt-5" style="width: 500px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header register-card-header">
                        <div class="row">
                            <h4 class="text-center text-light">Create Account</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="errorMessages" class="alert alert-danger" style="display: none;"></div>
                        <form id="registerForm" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-g-12 mb-3">
                                    <label for="name" class="form-label">Enter Name</label>
                                    <input type="text" class="form-control" id="name" name="name"  autocomplete="off" value="{{old('name')}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-g-12 mb-3">
                                    <label for="email" class="form-label">Enter Email</label>
                                    <input type="email" class="form-control" id="email" name="email"  autocomplete="off" value="{{old('email')}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-g-12 mb-3">
                                    <label for="contact" class="form-label">Enter Contact</label>
                                    <input type="text" class="form-control" id="contact" name="contact"  autocomplete="off" value="{{old('contact')}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-g-12 mb-3">
                                    <label for="password" class="form-label"> Create Password</label>
                                    <input type="password" class="form-control" id="password" name="password"  autocomplete="off" value="{{old('password')}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-g-12 mb-3">
                                    <label for="confirmpassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword"  autocomplete="off" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <span>I have an account </span><a href="{{route('customer.login')}}">Login</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-g-12 mb-3">
                                    <button type="submit" class="btn submitButtton text-light w-100" id="registerBtn">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('asset/customjs/index.js')}}"></script>
</body>
</html>
