$('#SendMail').on('submit',function(e){
    e.preventDefault();
    var action = $(this).attr('action'),
        dataArray = {
            '_token' : $('#token').val(),
            'message' : $('#message').val(),
            'date' : $('#date').val(),
            'from' : $('#from').val(),
            'to' : $('#to').val()
        };

    console.log(action);
    $('#send').text("ENVIANDO...")
        .attr('disabled', true);
    $.post( action,dataArray, function( data ) {
       if(data.success){
           $('#SendMail').hide('slow');
           $('#SendMailMessage').show('slow');

           console.log('ok')
       } else{
           $('.error').addClass('show');
           $('#send').text("ENVIAR...")
               .attr('disabled', false);
       }

    }, "json");
    return false;
});
