<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Comentar</title>
</head>
<body>
	
	 <?= form_open('juegos/comentar') ?>
      <?= form_label('Comentario:', 'texto_comentario') ?>
      <?= form_input('texto_comentario') ?><br/>
      <?= form_submit('comentar', 'Comentar') ?>
    <?= form_close() ?>

</body>
</html>