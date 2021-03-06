
    <h2><?= $juego['titulo'] ?></h2>

    <section>
            <?= img($juego['url']) ?>
            <div>
                    <label> Descripcion: </label>
                        <?= $juego['descripcion'] ?><br/>
                    <label> Fecha de lanzamiento: </label>
                        <?= $juego['fecha_lanzamiento'] ?><br/>
                    <label> Precio: </label>
                        <?= $juego['precio'] ?><br/>
                    <label> Sistema Operativo disponible: </label>
                        <?php foreach ($so as $item):?>
                            <?= $item['nombre_so'] ?>
                        <?php endforeach;?><br/>
                    <label> Desarrollador:  </label>
                        <?= $juego['nombre_desarrollador'] ?><br/>
            </div>
    </section>

    <section class="screenshots">
        <?php foreach ($screenshots as $screenshot) { ?>
            <?= img($screenshot['url']) ?>
        <?php } ?>
    </section>

    <?php if (isset($id)):?>
        <section>
            <?= validation_errors() ?>

            <?= form_open('juegos/ver/'.$juego['id']) ?>
            <?= form_hidden('nserie', rand());?>
            <?= form_label('Comentario:', 'texto_comentario') ?>
            <?= form_textarea(array('name' => 'texto_comentario', 
                                                      'cols' => '50', 
                                                      'rows' => '10', 
                                                      'maxlength' => '500')) ?><br/>
            <?= form_submit('comentar', 'Comentar') ?>
            <?= form_close() ?>
        </section>
    <?php else:?>
        <p>Si quieres comentar tienes que estar logueado <button><?= anchor('usuarios/login', 'log in')?></button></p>
    <?php endif;?>

    <?php if (empty($comentarios)):?>
        <p>No existen aun comentarios para este juego</p>
    <?php else:?>
        <?php foreach($comentarios as $comentario) { ?>
          <article>
              <?=$comentario['texto_comentario']?>
              <?=$comentario['fecha']?>
              <?=$comentario['nick']?>
          </article>
      <?php } ?>
    <?php endif;?>
        