$( document ).ready(function() {
      $("#role").on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
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
