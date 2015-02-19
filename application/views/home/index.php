<script type="text/javascript" 
        src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">
</script>


<script type="text/javascript">

    function anadir_compra(id, titulo, precio)
    {
        $.post('index.php/juegos/comprar/',
                {'<?= $this->security->get_csrf_token_name(); ?>' : 
                 '<?= $this->security->get_csrf_hash(); ?>',
                 'id': id,
                 'titulo': titulo,
                 'precio': precio}, 
                function(respuesta) {
            alert(respuesta);
        });
    }
</script>




<section class="cajones">
    <h2>Juegos destacados</h2>
    <?php foreach ($juegos as $juego):?>
        <article class="lista">
            <?= anchor('juegos/ver/'.$juego['id'], img($juego['url'])) ?>
            <div class="info">
                <?= anchor('juegos/ver/'.$juego['id'], '<h3>'.$juego['titulo'].'</h3>') ?>
                <p><?= $juego['descripcion'] ?></p>
                <div class="precio" onclick="anadir_compra('<?= $juego['id']?>', '<?=$juego['titulo']?>', '<?=$juego['precio']?>' )">
                    <?= $juego['precio'] ?> Comprar
                </div>
            </div>
        </article>
    <?php endforeach;?>
</section>

<section class="cajones">
    <h2>Últimas noticias</h2>
    <?php foreach ($noticias as $noticia):?>
        <article class="listanoticias">
            <h3><?= $noticia['cabecera'] ?></h3>
            <p><?= $noticia['texto_noticia'] ?></p>
            <?= anchor('noticias/ver/'.$noticia['id'],'Ver más...')?>
            <p><?= $noticia['fecha'] ?></p>
        </article>
    <?php endforeach;?>
</section>

<section class="cajones">
<h2>Mi biblioteca</h2>
    <?php if(isset($usuario_id)): ?>
        <?php foreach ($biblioteca as $mijuego):?>
            <article class="lista">
                <img src="<?= $mijuego['url'] ?>">
                <div class="info">
                    <h3><?= $mijuego['titulo'] ?></h3>
                    <p><?= $mijuego['descripcion'] ?></p>
                </div>
            </article>
        <?php endforeach;?>
    <?php else: ?>
        <article>
            <?= anchor('/usuarios/login', 'Log in...') ?>
        </article>
    <?php endif; ?>
</section>