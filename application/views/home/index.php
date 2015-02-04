<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>inicio</title>
</head>
<body>
    <h1>BIENVENIDOS A STIM</h1>
    <h2>Juegos destacados</h2>
    <?php foreach ($juego in $juegos):?>
        <img src="<?= $juegos['caratula'] ?>">
        <h3><?= $juegos['titulo'] ?></h3>
        <p><?= $juegos['descripcion'] ?></p>
        <p><?= $juegos['precio'] ?></p>
    <?php endforeach;?>
    <h2>Últimas noticias</h2>
    <?php foreach ($noticia in $noticias):?>
        <h3><?= $noticia['cabecera'] ?></h3>
        <p><?= $noticia['texto_noticia'] ?></p>
        <p><?= $noticia['fecha'] ?></p>
    <?php endforeach;?>
</body>
</html>