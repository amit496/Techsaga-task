$(document).ready(function() {

    // dataable
    $(document).ready( function () {
        $('#customerTable').DataTable();
    } );

    //hide message
    setTimeout(() => {
        $('.alert').hide();
    }, 5000);

    // CSRF token setup ,registration code
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // registration  code
    $('#registerForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            url: '/customer/register/submit',
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    console.log(response);
                    window.location.href = '/customer/login';
                    setTimeout(function() {
                        $('#successMessage').text(response.message).show();
                    }, 3000);
                } else {
                    var errorsHtml = '<div class="alert alert-danger"><ul>';
                    $.each(response.errors, function(key, value) {
                        errorsHtml += '<li>' + value + '</li>';
                    });
                    errorsHtml += '</ul></div>';
                    $('#errorMessages').html(errorsHtml).show();
                }
            }
        });
    });



});

