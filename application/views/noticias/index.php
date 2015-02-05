<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Noticias</title>
</head>
<body>
  <?php foreach($noticias as $noticia) { ?>
    <article>
      <h1><?= $noticia['cabecera'] ?></h1>
      <section><?= $noticia['texto_noticia']?></section>
    </article>
  <?php } ?>
</body>
</html>