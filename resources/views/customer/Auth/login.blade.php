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
                            <h4 class="text-center text-light">Login Here</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="errorMessages" class="alert alert-danger" style="display: none;"></div>
                        <div id="successMessage" class="alert alert-success" style="display: none;"></div>
                        <form action="#" method="post" enctype="multipart/form-data" id="loginForm">

                            <div class="row">
                                <div class="col-g-12 mb-3">
                                    <label for="email" class="form-label">Enter Email</label>
                                    <input type="email" class="form-control" id="useremail" name="email"  autocomplete="off" value="{{old('email')}}">
                                </div>
                            </div>


                            <div class="row optrow" style="display: none;">
                                <div class="col-g-12 mb-3">
                                    <label for="otp" class="form-label"> Enter Otp</label>
                                    <input type="number" class="form-control" id="otp" name="otp"  autocomplete="off" value="{{old('password')}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <span>I have a user account </span><a href="{{route('customer.register')}}">Register</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-g-12 mb-3">
                                    <button type="submit" class="btn submitButtton text-light w-100" id="generateotp">Generate Otp</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-g-12 mb-3">
                                    <button type="submit" class="btn submitButtton text-light w-100" id="loginBtn" style="display: none;">SUBMIT</button>
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

    <script>
        $(document).ready(function () {
            // OTP code
            $('#generateotp').on('click', function (e) {
                e.preventDefault();
                let usermail = $('#useremail').val();
                $.ajax({
                    type: 'get',
                    url: '/customer/generateOtp',
                    data: { mail: usermail },
                    success: function (response, textStatus, jqXHR) {
                        if (response.success) {
                            console.log(response);
                            $('#successMessage').text(response.message).show();

                            $('#generateotp').hide();
                            $('#loginBtn').show();
                            $('.optrow').show();
                            $('#otp').html(response.otp);
                        } else {
                            // Handle validation errors
                            let errorsHtml = '<ul>';
                            $.each(response.errors, function (key, value) {
                                errorsHtml += '<li>' + value + '</li>';
                            });
                            errorsHtml += '</ul>';
                            $('#errorMessages').html(errorsHtml).show();
                        }
                    },
                });
            });

            // Setup CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Login form submission
            $('#loginBtn').on('click', function(e) { // Changed from #loginBtn to #loginForm
                e.preventDefault();
                var formData = $('#loginForm').serialize();
                console.log(formData);
                $.ajax({
                    url: '/customer/login/submit',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            window.location.href = '/customer/dashboard';
                            console.log(response);
                        } else {
                            var errorsHtml = '<div class="alert alert-danger"><ul>';
                            $.each(response.errors, function(key, value) {
                                errorsHtml += '<li>' + value + '</li>';
                            });
                            errorsHtml += '</ul></div>';
                            $('#errorMessages').html(errorsHtml).show();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

    </script>


</body>
</html>
