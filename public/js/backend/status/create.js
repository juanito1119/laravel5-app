$(document).on('ready', function(){
  $('#color').colorpicker();

  $("form").validate({
    rules: {
      name: {
        required: true
      },
      description: {
        required: false
      },
      color: {
        required: true
      }
    },
    submitHandler: function(form) {
      // do other things for a valid form
      form.submit();
    }
  });

});
