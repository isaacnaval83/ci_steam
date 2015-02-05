<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Noticias</title>
</head>
<body>
  <?php foreach($noticias as $noticia) { ?>
    <article>
      <h1><a href="noticias/ver/<?= $noticia['id']?>"><?= $noticia['cabecera'] ?></a></h1>
      <section>
        <?php
          $texto = $noticia['texto_noticia'];
          if(strlen($texto) > 200){
            $texto = substr($noticia['texto_noticia'], 0, 500);
            $texto .= '...';
          }
        ?>
        <?= $texto?>
        <div><a href="noticias/ver/<?= $noticia['id']?>">Leer más...</a></div>
      </section>
    </article>
  <?php } ?>
</body>
</html>