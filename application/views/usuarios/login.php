<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <title>Login</title>
  </head>
  <body>
    <?php if (isset($error)): ?>
      <h2>Error: los datos no son correctos</h2>
    <?php endif ?>

    <?= form_open('usuarios/login') ?>
      <?= form_label('Usuario:', 'usuario') ?>
      <?= form_input('usuario') ?><br/>
      <?= form_label('Contraseña:', 'password') ?>
      <?= form_password('password') ?><br/>
      <a href="http://localhost/ci_steam/index.php/usuarios/olvida_contrasena">He olvidado la contraseña</a><br/>
      <?= form_submit('login', 'Entrar') ?>
    <?= form_close() ?>

    <?= form_open('usuarios/singup') ?>
      <?= form_submit('insertar', 'Singup') ?>
    <?= form_close() ?>
  </body>
</html>
