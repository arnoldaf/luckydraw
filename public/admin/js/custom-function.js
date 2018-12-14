$( document ).ready(function() {
      $("#role").on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;

      if(valueSelected == 2) {
        $(".patti").show();
      } else {
        $(".patti").hide();
      }

      if(valueSelected == 4) {
        $(".area-manager").hide();
        $(".distributor-manager").show();

      } else if(valueSelected == 3) {
        $(".area-manager").show();
        $(".distributor-manager").hide();

      } else {
        $(".area-manager").hide();
        $(".distributor-manager").hide();
       }
      });


      // CONFIRMATION DELETE MODAL
	$('#confirmDelete').on('show.bs.modal', function (e) {
		var message = $(e.relatedTarget).attr('data-message');
		var title = $(e.relatedTarget).attr('data-title');
		var form = $(e.relatedTarget).closest('form');
		$(this).find('.modal-body p').text(message);
		$(this).find('.modal-title').text(title);
		$(this).find('.modal-footer #confirm').data('form', form);
	});
	$('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
	  	$(this).data('form').submit();
	});


	// CONFIRMATION SAVE MODEL
	$('#confirmSave').on('show.bs.modal', function (e) {
		var message = $(e.relatedTarget).attr('data-message');
		var title = $(e.relatedTarget).attr('data-title');
		var form = $(e.relatedTarget).closest('form');
		$(this).find('.modal-body p').text(message);
		$(this).find('.modal-title').text(title);
		$(this).find('.modal-footer #confirm').data('form', form);
	});
	$('#confirmSave').find('.modal-footer #confirm').on('click', function(){
	  	$(this).data('form').submit();
	});


});

function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}


$( document ).ready(function() {
$(document).on('keyup', '.data-min_max', function(e){
    var min = parseInt($(this).data('min'));
    var max = parseInt($(this).data('max'));
    var val = parseInt($(this).val());
    if(val > max)
    {
        $(this).val(max);
        return false;
    }
    else if(val < min)
    {
        $(this).val(min);
        return false;
    }
});

$(document).on('keydown', '.data-min_max', function (e) {


    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
         // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) ||
         // Allow: Ctrl+C
        (e.keyCode == 67 && e.ctrlKey === true) ||
         // Allow: Ctrl+X
        (e.keyCode == 88 && e.ctrlKey === true) ||
         // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
             // let it happen, don't do anything
             return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});


});
