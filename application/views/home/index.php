<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>inicio</title>
</head>
<body>
    <h1>BIENVENIDOS A STIM</h1>
    <h2>Juegos destacados</h2>

    <?php foreach ($juegos as $juego):?>
        <img src="<?= $juego['url'] ?>">
        <h3><?= $juego['titulo'] ?></h3>
        <p><?= $juego['descripcion'] ?></p>
        <p><?= $juego['precio'] ?></p>
    <?php endforeach;?>
    <h2>Últimas noticias</h2>
    <?php foreach ($noticias as $noticia):?>
        <h3><?= $noticia['cabecera'] ?></h3>
        <p><?= $noticia['texto_noticia'] ?></p>
        <p><?= $noticia['fecha'] ?></p>
    <?php endforeach;?>
</body>
</html>