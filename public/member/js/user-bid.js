let denominationVal  = 0;
let gameName = "";
let gameId = 0;
let userBidNum = 0;
let totalBidAmountOnNum = 0;
$('.game-wrapper').on('click', '.user-selected-num', function(){
    if(setDenominationValue() === 0) { return; }
    let _this = $(this);
    let gameWrapper = _this.closest('.game-wrapper');
    gameId = gameWrapper.data('id');
    if (!setGameBidAmount(gameId, denominationVal)) {
        fancyAlert("You don't have sufficient balance.");
        return false;
    }
    _this.addClass('Selected');
    gameName = gameWrapper.attr("data-name");
    let bidNumWrap = _this.find('.num');
    userBidNum = bidNumWrap.text();
    let userBidValueWrap = _this.find('.value');
    userBidValueWrap.removeClass('hidden');
    let userBidValue = parseInt(userBidValueWrap.text());
    totalBidAmountOnNum = parseInt(denominationVal + userBidValue);
    userBidValueWrap.text(totalBidAmountOnNum);
    
    setBidNumberPoints();
    //alert(userBidNum + ', ' + userBidValue);
});

/**
 * To remove selected bid num+-
 */
$(document).on('click', '.member-bid-delete', function () {
    let _this = $(this);
    let wrapper = _this.closest('.member-bid-record');
    let selectedGameId = parseInt(wrapper.find('.game-name').data('id'));
    let bidNum = parseInt(wrapper.find('.bid-num').text());
    let bidAmount = parseInt(wrapper.find('.bid-amount').text());
    let gameWrapper = $('.game-wrapper[data-id="'+selectedGameId+'"]');
    gameWrapper.find('.user-selected-num[data-id="'+bidNum+'"]').removeClass('Selected');
    gameWrapper.find('.user-selected-num[data-id="'+bidNum+'"] .value').addClass('hidden').text('0');
    
    if(wrapper.find('.bid-num').text().split('-')[0] == "A") {
        gameWrapper.find('.andar-bid[data-id="'+wrapper.find('.bid-num').text().split('-')[1]+'"]').removeClass('Selected');
        gameWrapper.find('.andar-bid[data-id="'+wrapper.find('.bid-num').text().split('-')[1]+'"]').find('.value').addClass('hidden').text(0);
    }
    if(wrapper.find('.bid-num').text().split('-')[0] == "B") {
        gameWrapper.find('.bahar-bid[data-id="'+wrapper.find('.bid-num').text().split('-')[1]+'"]').removeClass('Selected');
        gameWrapper.find('.bahar-bid[data-id="'+wrapper.find('.bid-num').text().split('-')[1]+'"]').find('.value').addClass('hidden').text(0);
    }
    setGameBidAmount(selectedGameId, -bidAmount);
    wrapper.remove();
    setSerialNum();
});

/**
 * To bid a number for andar
 */
$('.andar-bid').on('click', function () {
    if(setDenominationValue() === 0) { return; }
    let _this = $(this);
    let bidNumber = _this.data('id');
    let gameWrapper = _this.closest('.game-wrapper');
    gameId = gameWrapper.data('id');
    gameName = gameWrapper.attr("data-name");
    if (!setGameBidAmount(gameId, denominationVal)) {
        fancyAlert("You don't have sufficient balance.");
        return false;
    }
    _this.addClass('Selected');
    totalBidAmountOnNum = parseInt(denominationVal);
    let existedValue = parseInt(_this.find('.value').text());
    _this.find('.value').removeClass('hidden').text(totalBidAmountOnNum + existedValue);
    setBidNumberPointsHalf(gameId, "A-"+bidNumber);
    
});

/**
 * To bid a number for bahar
 */
$('.bahar-bid').on('click', function () {
    if(setDenominationValue() === 0) { return; }
    let _this = $(this);
    let bidNumber = _this.data('id');
    let gameWrapper = _this.closest('.game-wrapper');
    gameId = gameWrapper.data('id');
    gameName = gameWrapper.attr("data-name");
    if (!setGameBidAmount(gameId, denominationVal)) {
        fancyAlert("You don't have sufficient balance.");
        return false;
    }
    _this.addClass('Selected');
    totalBidAmountOnNum = parseInt(denominationVal);
    let existedValue = parseInt(_this.find('.value').text());
    _this.find('.value').removeClass('hidden').text(totalBidAmountOnNum + existedValue);
    setBidNumberPointsHalf(gameId, "B-"+bidNumber);
    
});

/**
 * To set active denomination amount
 * @returns {jQuery}
 */
function setDenominationValue() {
    denominationVal = parseInt($('.denominations ul li.selected').text());
    $('.denominations-warning').addClass('hidden');
    if (!denominationVal || denominationVal == null || denominationVal == 0) {
        $('.denominations-warning').text('Please select amount').removeClass('hidden');
        return 0;
    }
}

/**
 * To set total bid amount
 * @param gameId
 * @param addedAmount
 */
function setGameBidAmount(gameId, addedAmount) {
    let existedAmount = parseInt($('.total-bid-amount').text());
    let totalAmount = parseInt(addedAmount + existedAmount);
    let userBalance = parseFloat($('.user-balance').text());
    let availableBalance = parseFloat(userBalance - addedAmount);
    if (availableBalance < 0 ) {
        return false;
    }
    $('.user-balance').text(parseFloat(userBalance - addedAmount));
    $('.total-bid-amount').text(totalAmount);

    return true;
}

/**
 * To set all numbers with point
 */
function setBidNumberPoints() {
    let gameHistoryWrapper = $('.member-bid-history');
    let findRow = false;
    gameHistoryWrapper.find('.member-bid-record').not('.snippet').each(function () {
        let $this = $(this);
        if ($this.find('.game-name').data('id') == gameId && parseInt($this.find('.bid-num').text()) === parseInt(userBidNum)) {
            findRow = true;
            $this.find('.bid-amount').text(totalBidAmountOnNum);
        }
    });
    if (!findRow) {
        console.log('not found');
        let newRow = gameHistoryWrapper.find('.member-bid-record.snippet').clone().removeClass('snippet').removeClass('hidden');
        newRow.find('.game-name').text(gameName);
        newRow.find('.game-name').data('id', gameId);
        newRow.find('.bid-num').text(userBidNum);
        newRow.find('.bid-amount').text(totalBidAmountOnNum);
        newRow.insertBefore('.member-bid-record.snippet');
        setSerialNum();
    }
}

/**
 * To get total bid amount for a user
 * @returns {number}
 */
function getTotalBidAmount() {
    return 1000;
}

/**
 * TO set serial num of member bid history
 */
function setSerialNum() {
    let gameHistoryWrapper = $('.member-bid-history');
    let i = 1;
    gameHistoryWrapper.find('.member-bid-record').not('.snippet').each(function () {
        $(this).find('.sr-num').text(i);
        i++;
    });
}

function setBidNumberPointsHalf(gameId, bidNum) {
    let gameHistoryWrapper = $('.member-bid-history');
    let findRow = false;
    gameHistoryWrapper.find('.member-bid-record').not('.snippet').each(function () {
        let $this = $(this);
        if ($this.find('.game-name').data('id') == gameId && $this.find('.bid-num').text() == bidNum) {
            findRow = true;
            let existedAmount = parseInt($this.find('.bid-amount').text());
            $this.find('.bid-amount').text(existedAmount + denominationVal);
        }
    });
    if (!findRow) {
        console.log('not found');
        let newRow = gameHistoryWrapper.find('.member-bid-record.snippet').clone().removeClass('snippet').removeClass('hidden');
        newRow.find('.game-name').text(gameName);
        newRow.find('.game-name').data('id', gameId);
        newRow.find('.bid-num').text(bidNum);
        newRow.find('.bid-amount').text(denominationVal);
        newRow.insertBefore('.member-bid-record.snippet');
        setSerialNum();
    }
}

$('.denominations-point').click(function () {
   $('.denominations-point').removeClass('selected');
   $(this).addClass('selected');
});

$('#contact_form_points').on('submit', function (e) {
    e.preventDefault();
    let _this = $(this);
    let data = _this.serialize();
    let accNum = _this.find('#acc-num').val();
    let _errorWrap = _this.find('.error-msg');
    _errorWrap.removeClass('alert-danger').removeClass('hidden').addClass('alert-success').html('Processing....');
    $.ajax({
        url: sit_url+'/point-transfer-request',
        type: 'POST',
        data: data,
        success: function (resp) {
            if (!resp.result) {
                _errorWrap.removeClass('alert-success').removeClass('hidden').addClass('alert-danger').html(resp.message);
            } else {
                _errorWrap.removeClass('alert-danger').removeClass('hidden').addClass('alert-success').html('Request has been sent.');
                let transferableWrapper = $('.transferable-amount-wrap');
                let newRow = transferableWrapper.find('.transferable-record.snippet').clone().removeClass('snippet').removeClass('hidden');
                newRow.find('.transactionId').val(resp.data.id);
                newRow.find('.userAccount').text(accNum);
                newRow.find('.amount').text(resp.data.amount);
                newRow.find('.createdAt').text(resp.data.created_at);
                newRow.insertBefore('.transferable-record.snippet');
                _this[0].reset();
                //to update user's balance
                let userBalance = parseInt($('.user-balance').text());
                $('.user-balance').text(userBalance - resp.data.amount);
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

$('.select-all').on('click', function () {
   let _this = $(this);
   let wrapper = _this.closest('.table');
   if (_this.prop("checked") == true) {
       wrapper.find('.transactionId').prop("checked", true);
   } else {
       wrapper.find('.transactionId').prop("checked", false);
   }
});

$('.cancel-transaction').on('click', function () {
    let _this = $(this);
    let wrapper = _this.closest('.table');
    let ids = new Array();
    let canceledBalance = 0;
    wrapper.find('.transferable-record').not('.snippet').each(function () {
       if ($(this).find('.transactionId').prop("checked") == true) {
           ids.push($(this).find('.transactionId').val());
           canceledBalance = parseInt($(this).find('.amount').text()) + canceledBalance;
       }
    });

    if (ids.length > 0) {
        let _errorWrap = $('.transfer-error-msg');
        _errorWrap.removeClass('alert-danger').removeClass('hidden').addClass('alert-success').html('Processing....');
        $.ajax({
            url: sit_url + '/point-transfer-cancel',
            type: 'POST',
            data: {ids: ids, _token: $("meta[name=csrf-token]").attr("content")},
            success: function (resp) {
                _errorWrap.html(resp.message);
                if (resp.result) {
                    _errorWrap.removeClass('alert-danger').removeClass('hidden').addClass('alert-success');
                    //to update user balance
                    let userBalance = parseInt($('.user-balance').text());
                    $('.user-balance').text(userBalance + canceledBalance);
                } else {
                    _errorWrap.removeClass('alert-success').removeClass('hidden').addClass('alert-danger');
                }
                for (i =0; i < ids.length; i++) { // to remove selected records
                    wrapper.find(".transactionId[value='" + ids[i] + "']").closest('.transferable-record').remove();
                }
                setTimeout(function () {
                    _errorWrap.removeClass('alert-danger').removeClass('alert-success').addClass('hidden').html('');
                }, 4000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    } else {
        return;
    }
});

$('.request-update').on('click', function () {
    let _this = $(this);
    let status = _this.attr('data-status');
    let wrapper = _this.closest('.table');
    let ids = new Array();
    let acceptedAmount = 0;
    wrapper.find('.transactionId').each(function () {
        if ($(this).prop("checked") == true) {
            ids.push($(this).val());
            if (status == "accept") {
                acceptedAmount = parseInt($(this).closest('.receivable-record').find('.amount').text()) + acceptedAmount;
            }
        }
    });

    if (ids.length > 0) {
        let _errorWrap = $('.receive-error-msg');
        _errorWrap.removeClass('alert-danger').removeClass('hidden').addClass('alert-success').html('Processing....');
        $.ajax({
            url: sit_url + '/point-transfer-update',
            type: 'POST',
            data: {ids: ids, status: status, _token: $("meta[name=csrf-token]").attr("content")},
            success: function (resp) {
                _errorWrap.html(resp.message);
                if (resp.result) {
                    _errorWrap.removeClass('alert-danger').removeClass('hidden').addClass('alert-success');
                    //to update user balance
                    if (status == "accept") {
                        let userBalance = parseInt($('.user-balance').text());
                        $('.user-balance').text(userBalance + acceptedAmount);
                    }
                } else {
                    _errorWrap.removeClass('alert-success').removeClass('hidden').addClass('alert-danger');
                }
                for (i =0; i < ids.length; i++) { // to remove selected records
                    wrapper.find(".transactionId[value='" + ids[i] + "']").closest('.receivable-record').remove();
                }
                setTimeout(function () {
                    _errorWrap.removeClass('alert-danger').removeClass('alert-success').addClass('hidden').html('');
                }, 4000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    } else {
        return;
    }
});

$('.confirm-bid').on('click', function(){
    let games = new Array();
    let i = 0;
    $('.member-bid-history .member-bid-record').not('.snippet').each(function () {
        let $this = $(this);
        //to find bid-category id
        let bidNumArr = $this.find('.bid-num').text().split('-');
        let bidNum = bidNumArr[0];
        let categoryId = 1;
        if (bidNum === "A"){
            categoryId = 2;
            bidNum = bidNumArr[1];
        } 
        else if(bidNum === "B") {
            categoryId = 3;
            bidNum = bidNumArr[1];
        }
     
        games[i] = {
            'gameId': $this.find('.game-name').data('id'),
            'categoryId': categoryId,
            'bidNum': bidNum,
            'bidAmount': $this.find('.bid-amount').text()
        };
        i++;
    });
    
    let _errorWrap = $('.confirm-error-msg');
        _errorWrap.removeClass('alert-danger').removeClass('hidden').addClass('alert-success').html('Processing....');
    $.ajax({
            url: sit_url + '/confirm-bid',
            type: 'POST',
            data: {games: games, _token: $("meta[name=csrf-token]").attr("content")},
            success: function (resp) {
                _errorWrap.html(resp.message);
                if (resp.result) {
                    _errorWrap.removeClass('alert-danger').removeClass('hidden').addClass('alert-success');
                    resetBidNum();
                } else {
                    _errorWrap.removeClass('alert-success').removeClass('hidden').addClass('alert-danger');
                }
                setTimeout(function () {
                    _errorWrap.removeClass('alert-danger').removeClass('alert-success').addClass('hidden').html('');
                }, 4000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
});

$('#reset_checker').on('click', function(){
    $('.member-bid-history .member-bid-record').not('.snippet').each(function () {
       $(this).find('.member-bid-delete').trigger('click'); 
    });
});

function resetBidNum() {
    $('.member-bid-history .member-bid-record').not('.snippet').each(function () {
        let wrapper = $(this);
        let selectedGameId = parseInt(wrapper.find('.game-name').data('id'));
        let bidNum = parseInt(wrapper.find('.bid-num').text());
        let bidAmount = parseInt(wrapper.find('.bid-amount').text());
        let gameWrapper = $('.game-wrapper[data-id="'+selectedGameId+'"]');
        gameWrapper.find('.user-selected-num[data-id="'+bidNum+'"]').removeClass('Selected');
        gameWrapper.find('.user-selected-num[data-id="'+bidNum+'"] .value').addClass('hidden').text('0');

        if(wrapper.find('.bid-num').text().split('-')[0] == "A") {
            gameWrapper.find('.andar-bid[data-id="'+wrapper.find('.bid-num').text().split('-')[1]+'"]').removeClass('Selected');
            gameWrapper.find('.andar-bid[data-id="'+wrapper.find('.bid-num').text().split('-')[1]+'"]').find('.value').addClass('hidden').text(0);
        }
        if(wrapper.find('.bid-num').text().split('-')[0] == "B") {
            gameWrapper.find('.bahar-bid[data-id="'+wrapper.find('.bid-num').text().split('-')[1]+'"]').removeClass('Selected');
            gameWrapper.find('.bahar-bid[data-id="'+wrapper.find('.bid-num').text().split('-')[1]+'"]').find('.value').addClass('hidden').text(0);
        }
        wrapper.remove();
    });
    $('.total-bid-amount').text(0);
}

function fancyAlert(msg) {
    jQuery.fancybox({
        'modal' : true,
        'content' : "<div style=\"margin:1px;width:240px;color:#fff\">"+msg+"<div style=\"text-align:right;margin-top:10px;\"><input style=\"margin:3px;padding:3px; width:20%; cursor:pointer\" type=\"button\" onclick=\"jQuery.fancybox.close();\" value=\"Ok\"></div></div>"
    });
}
