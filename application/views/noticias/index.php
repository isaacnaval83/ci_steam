<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Noticias</title>
  </head>
  <body>
    <?= form_open("noticias/ver_noticias_juegos"); ?>
      <?= form_input('juego', (isset($nomatches) ? $nomatches : '')); ?>
      <?php if(isset($nomatches)) echo '<p>No existen resultados</p>'; ?>
      <br/><div id="reqCont"></div>
      <?= form_submit('buscar', 'Buscar Noticias'); ?>
    <?= form_close(); ?>
    <hr/>

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