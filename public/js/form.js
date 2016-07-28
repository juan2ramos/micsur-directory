$('.Form-register input, .Form-register textarea, .Form-register  select').on('change',function(){
   $(this).siblings('p').remove();
   $(this).removeClass('error')
});
