$('.cancelar').on('click', function () {
	form = $(this).attr('data-form-id');
	$(form).reset();
})

$('#logout').on('click',function () {
	$('#form-logout').submit();
})

// setInterval(function(){
//       $('.alert').fadeOut();
//     }, 3000);

$( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd/mm/yy",
    });
  } );