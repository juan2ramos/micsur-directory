$('.Form-register input, .Form-register textarea, .Form-register  select').on('change',function(){
   $(this).siblings('p').remove();
   $(this).removeClass('error')
});
$('.ErrorsAlert-content span').on('click',function(){
   $('.ErrorsAlert').hide();
});
