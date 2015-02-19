<?php if(isset($juegos)): ?>
  <ul>
  <?php foreach ($juegos as $juego){ ?>
    <li><?= anchor('noticias/ver_noticias_juegos/'.$juego['id'], $juego['titulo']) ?></li> 
  <?php } ?>
  </ul>
<?php else: ?>

  <?php foreach($noticias as $noticia) { ?>
    <article>
      <h1><?= anchor("noticias/ver/".$noticia['id'], $noticia['cabecera']) ?></h1>
      <section>
        <?=$noticia['texto_noticia']?>
        <div><?= anchor("noticias/ver/".$noticia['id'], "Leer más...") ?></div>
      </section>
    </article>
  <?php } ?>

<?php endif; ?>