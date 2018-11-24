
$('.game-wrapper').on('click', '.user-selected-num', function(){
    let _this = $(this);
    _this.addClass('Selected');
    let gameWrapper = _this.closest('.game-wrapper');
    let gameId = gameWrapper.data('id');
    let bidNumWrap = _this.find('.num');
    let userBidNum = bidNumWrap.text();
    let userBidValueWrap = _this.find('.value');
    userBidValueWrap.removeClass('hidden');
    let userBidValue = parseInt(userBidValueWrap.text());
    let addedAmount = parseInt(getDenominationValue());
    let bidAmount = parseInt(addedAmount + userBidValue);
    userBidValueWrap.text(bidAmount);
    setGameBidAmount(gameId, addedAmount);
    //alert(userBidNum + ', ' + userBidValue);
});

/**
 * to get active denomination amount
 * @returns {jQuery}
 */
function getDenominationValue() {
    return $('.denominations ul li.active').text();
}

/**
 * To set total bid amount
 * @param gameId
 * @param addedAmount
 */
function setGameBidAmount(gameId, addedAmount) {
    let gameWrapper = $('.game-wrapper[data-id="'+gameId+'"]');
    let existedAmount = parseInt(gameWrapper.find('.bid-amount').text());
    gameWrapper.find('.bid-amount').text(parseInt(addedAmount + existedAmount));
}

/**
 * To get total bid amount for a user
 * @returns {number}
 */
function getTotalBidAmount() {
    return 1000;
}