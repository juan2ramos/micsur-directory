<h4 class="col-12" id="SendMailMessage">¡Mensaje enviado!</h4>
<form action="{{route('sendMail')}}" method="post" id="SendMail" class="row end Send-email">
    <h4 class="col-12">Enviale un mensaje</h4>
    <span class="error">Todos los campos son obligatorios</span>
    <input type="hidden" id=token name="_token" value="{{ csrf_token() }}">
    <input class='calendar col-10 small-12' data-utc=true data-enable-time=true type="text" name="date" id="date"
           placeholder="Fecha">
    <textarea name="" id="message" class="col-10 small-12" placeholder="Mensaje"></textarea>
    <input type="hidden" name="from" id="from" value="{{Auth::user()->id}}">
    <input type="hidden" name="to" id="to" value="{{$user->user->id}}">
    <button class="button" id="send">ENVIAR..</button>
</form>