let denominationVal  = 0;
let gameName = "";
let gameId = 0;
let userBidNum = 0;
let totalBidAmountOnNum = 0;
$('.game-wrapper').on('click', '.user-selected-num', function(){
    if(setDenominationValue() === 0) { return; }
    let _this = $(this);
    _this.addClass('Selected');
    let gameWrapper = _this.closest('.game-wrapper');
    gameId = gameWrapper.data('id');
    gameName = gameWrapper.attr("data-name");
    let bidNumWrap = _this.find('.num');
    userBidNum = bidNumWrap.text();
    let userBidValueWrap = _this.find('.value');
    userBidValueWrap.removeClass('hidden');
    let userBidValue = parseInt(userBidValueWrap.text());
    totalBidAmountOnNum = parseInt(denominationVal + userBidValue);
    userBidValueWrap.text(totalBidAmountOnNum);
    setGameBidAmount(gameId, denominationVal);
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
    _this.addClass('selected');
    gameId = gameWrapper.data('id');
    gameName = gameWrapper.attr("data-name");
    totalBidAmountOnNum = parseInt(denominationVal);
    setBidNumberPointsHalf(gameId, "A-"+bidNumber);
    setGameBidAmount(gameId, denominationVal)
});

/**
 * To bid a number for andar
 */
$('.bahar-bid').on('click', function () {
    if(setDenominationValue() === 0) { return; }
    let _this = $(this);
    let bidNumber = _this.data('id');
    let gameWrapper = _this.closest('.game-wrapper');
    _this.addClass('selected');
    gameId = gameWrapper.data('id');
    gameName = gameWrapper.attr("data-name");
    totalBidAmountOnNum = parseInt(denominationVal);
    setBidNumberPointsHalf(gameId, "B-"+bidNumber);
    setGameBidAmount(gameId, denominationVal)
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
    //let gameWrapper = $('.game-wrapper[data-id="'+gameId+'"]');
    let existedAmount = parseInt($('.total-bid-amount').text());
    $('.total-bid-amount').text(parseInt(addedAmount + existedAmount));
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