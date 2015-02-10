<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Resultados de Noticias</title>
  </head>
  <body>
  <?php 

      var_dump($noticias); die(); ?>
    <?php foreach($noticias as $noticia) { ?>
      <article>
        <h1><?= anchor("noticias/ver/".$noticia['id'], $noticia['cabecera']) ?></h1>
        <section>
          <?=$noticia['texto_noticia']?>
          <div><?= anchor("noticias/ver/".$noticia['id'], "Leer más...") ?></div>
        </section>
      </article>
    <?php } ?>
  </body>
</html>