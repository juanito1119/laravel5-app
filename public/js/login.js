$(document).on('ready', function(){
  $.material.init();

  $('body form').on('click','button[type=submit]', function(){

    $(this).parent('form').validate({
      rules: {
        // simple rule, converted to {required:true}
        password: "required",
        // compound rule
        email: {
          required: true,
          email: true
        }
      },
      submitHandler: function(form) {
        sendeAjax( $(form).serialize() );
      }
    })

  });


  function sendeAjax(data){
    // imprime en consola el valor
    console.log(data);

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "authenticate",
      type: "POST",
      data: data ,
      success: function (response) {
        console.log(response);
      },
      error: function(jqXHR, textStatus, errorThrown) {

      }

    });
  }

});


