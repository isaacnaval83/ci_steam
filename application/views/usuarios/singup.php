<!DOCTYPE html>
<html>
  <head>
    <title>Singup</title>
  </head>
  <body>
    <?= validation_errors() ?>
  
    <?php if (isset($error)): ?>
      <h2><?= $error ?></h2>
    <?php endif ?>

    <?= form_open('usuarios/singup') ?>
      <?= form_label('Usuario:', 'usuario') ?>
      <?= form_input('usuario', set_value('usuario')) ?><br/>
      <?= form_label('Contraseña:', 'password') ?>
      <?= form_password('password') ?><br/>
      <?= form_label('Confirmar contraseña:', 'confirm_password') ?>
      <?= form_password('confirm_password') ?><br/>
      <?= form_label('Email:','email') ?>
      <?= form_input('email',set_value('email')) ?><br>
      <?= form_submit('singup', 'Crear') ?>
    <?= form_close() ?>
  </body>
</html>