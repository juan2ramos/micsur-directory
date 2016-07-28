Haga clic aquí para restablecer la contraseña: <a href="{{ $link = url('public/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
