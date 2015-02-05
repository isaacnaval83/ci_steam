<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Noticias</title>
</head>
<body>
  <?php foreach($noticias as $noticia) { ?>
    <article>
      <h1><a href="/noticias/ver/<?= $noticia['id']?>"><?= $noticia['cabecera'] ?></a></h1>
      <section>
        <?php
          if(strlen($noticia['texto_noticia']) > 2){
            $texto = substr($noticia['texto_noticia'], 0, 2);
            $texto .= '...';
          }
        ?>
        <?= $texto?>
        <div><a href="/noticias/ver/<?= $noticia['id']?>">Leer más...</a></div>
      </section>
    </article>
  <?php } ?>
</body>
</html>