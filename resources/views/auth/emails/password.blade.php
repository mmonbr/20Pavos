<h1>Derrochando.com - Reiniciar contraseña:</h1>

<p>
    Para reiniciar tu contrasña haz click en: {{ url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}
</p>

<p>
    Si no has sido tú quién ha solicitado un reinicio de contraseña en Derrochando.com puedes ignorar este email.
</p>
