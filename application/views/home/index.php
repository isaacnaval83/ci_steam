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

<h2>Mi biblioteca</h2>
<?php if(isset($usuario_id)): ?>
    <?php foreach ($biblioteca as $mijuego):?>
        <img src="<?= $mijuego['url'] ?>">
        <h3><?= $mijuego['titulo'] ?></h3>
        <p><?= $mijuego['descripcion'] ?></p>
    <?php endforeach;?>
<?php else: ?>
    <?= anchor('/usuarios/login', 'Log in...') ?>
<?php endif; ?>