
$('.change_password').on('submit', function (e) {
    e.preventDefault();
    let _this = $(this);
    let data = _this.serialize();
    let _errorWrap = _this.find('.error-msg');
    _errorWrap.removeClass('alert-danger').removeClass('hidden').addClass('alert-success').html('Processing....');

    $.ajax({
        url: sit_url+'/update-password-request',
        type: 'POST',
        data: data,
        success: function (resp) {
            if (!resp.result) {
                _errorWrap.removeClass('alert-success').removeClass('hidden').addClass('alert-danger').html(resp.message);
            } else {
                _errorWrap.removeClass('alert-danger').removeClass('hidden').addClass('alert-success').html(resp.message);
                $(".change_password input[type='password']").each(function() {
                    this.value = "";
                })

            }
            setTimeout(function () {
                _errorWrap.removeClass('alert-danger').removeClass('alert-success').addClass('hidden').html('');
            }, 4000);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
   //console.log($(this).serialize());
});



$('.change_pin').on('submit', function (e) {
    e.preventDefault();
    let _this = $(this);
    let data = _this.serialize();
    let _errorWrap = _this.find('.error-msg');
    _errorWrap.removeClass('alert-danger').removeClass('hidden').addClass('alert-success').html('Processing....');

    $.ajax({
        url: sit_url+'/update-pin-request',
        type: 'POST',
        data: data,
        success: function (resp) {
            if (!resp.result) {
                _errorWrap.removeClass('alert-success').removeClass('hidden').addClass('alert-danger').html(resp.message);
            } else {
                _errorWrap.removeClass('alert-danger').removeClass('hidden').addClass('alert-success').html(resp.message);
                $(".change_password input[type='password']").each(function() {
                    this.value = "";
                })

            }
            setTimeout(function () {
                _errorWrap.removeClass('alert-danger').removeClass('alert-success').addClass('hidden').html('');
            }, 4000);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
   //console.log($(this).serialize());
});
