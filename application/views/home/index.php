<script type="text/javascript" 
        src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">
</script>


<script type="text/javascript">

    function anadir_compra(id, titulo, precio)
    {
        $.post('index.php/juegos/anadir_compra/',
                {'<?= $this->security->get_csrf_token_name(); ?>' : 
                 '<?= $this->security->get_csrf_hash(); ?>',
                 'id': id,
                 'titulo': titulo,
                 'precio': precio}, 
                function(respuesta) {
            $('#carro').text(respuesta);
        });
    }
</script>


<div class="cuerpo">
<section>
    <article class="cajones">
        <h2>Juegos destacados</h2>
        <?php foreach ($juegos as $juego):?>
            <div class="lista">
                <?= anchor('juegos/ver/'.$juego['id'], img($juego['url'])) ?>
                <div class="info">
                    <?= anchor('juegos/ver/'.$juego['id'], 
                               '<h3>'.$juego['titulo'].'</h3>') ?>
                    <p><?= $juego['descripcion'] ?></p>

                    <?php if(isset($usuario_id)): ?>
                        <div class="precio boton" 
                             onclick="anadir_compra('<?=$juego['id']?>',
                                                    '<?=$juego['titulo']?>',
                                                    '<?=$juego['precio']?>')">
                            <?= $juego['precio'] ?> Comprar
                        </div>
                    <?php else: ?>
                        <div class="precio boton">
                            <p><?= $juego['precio'] ?></p>
                            <?= anchor('/usuarios/login', 
                                       'Log in para comprar') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach;?>
    </article>

    <article class="cajones">
        <h2>Últimas noticias</h2>
        <?php foreach ($noticias as $noticia):?>
            <div class="listanoticias">
                <h3><?= $noticia['cabecera'] ?></h3>
                <p><?= $noticia['texto_noticia'] ?></p>
                <?= anchor('noticias/ver/'.$noticia['id'],'Ver más...')?>
                <p><?= $noticia['fecha'] ?></p>
            </div>
        <?php endforeach;?>
    </article>

    <article class="cajones">
    <h2>Mi biblioteca</h2>
        <?php if(isset($usuario_id)): ?>
            <?php foreach ($biblioteca as $mijuego):?>
                <div class="lista">
                    <img src="<?= $mijuego['url'] ?>">
                    <div class="info">
                        <h3><?= $mijuego['titulo'] ?></h3>
                        <p><?= $mijuego['descripcion'] ?></p>
                    </div>
                </div>
            <?php endforeach;?>
        <?php else: ?>
            <div>
                <?= anchor('/usuarios/login', 'Log in...') ?>
            </div>
        <?php endif; ?>
    </article>
</section>

<aside>
    <h2>Carro de la compra</h2>
    <div>
        <?= anchor('juegos/comprar/', img('images/iconos/cart.png')) ?>
        <span id="carro"><?= count($this->cart->contents())?></span>
        <span> Artículos</span>
    </div>
</aside>
</div>