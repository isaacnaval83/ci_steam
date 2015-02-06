<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Noticias</title>
  </head>
  <body>
    <?= form_open("noticias/ver_noticias_juegos"); ?>
      <?= form_input('juego'); ?>
      <br/>
      <?= form_submit('buscar', 'Buscar Noticias'); ?>
    <?= form_close(); ?>
    <hr/>

    <?php foreach($noticias as $noticia) { ?>
      <article>
        <h1><a href="noticias/ver/<?= $noticia['id']?>"><?= $noticia['cabecera'] ?></a></h1>
        <section>
          <?=$noticia['texto_noticia']?>
          <div><a href="noticias/ver/<?= $noticia['id']?>">Leer más...</a></div>
        </section>
      </article>
    <?php } ?>
  </body>
</html>