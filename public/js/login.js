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
      beforeSend: function(){
        $('.show-error p').addClass('hide');
        $('button[type=submit]').prop('disabled', true);
        $('.preloader').removeClass('hide');
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: location.protocol+"authentication",
      type: "POST",
      data: data ,
      success: function (response) {
        $('button[type=submit]').prop('disabled', false);
        $('.preloader').addClass('hide');
        if( response.authentication == true ){
          document.location.href='dashboard';
        }
        if( response.authentication == false ){
          $('.show-error p.text-danger').removeClass('hide');
        }
        if( response.authentication == 2 ){
          $('.show-error p.text-warning').removeClass('hide');
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {

      }

    });
  }

});


