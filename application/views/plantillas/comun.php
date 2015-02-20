<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?=$titulo?></title>
    <?= link_tag('css/estilo.css') ?>
</head>
<body>
    <header>
        <h1>STIM</h1>
        <div>
            <?php if(isset($usuario)): ?>
                <p>usuario: <span><?=$usuario?></span></p>
                <?=anchor('/usuarios/logout', 'Log Out',array('class' => 'boton'))?>
            <?php else: ?>
                <?=anchor('/usuarios/login', 'Log in',array('class' => 'boton'))?>
                <?=anchor('/usuarios/singup', 'Sign Up',array('class' => 'boton'))?>
            <?php endif; ?>
        </div>
    </header>
    
    <?= $contents ?>

    <footer>
        <p>&copy; Copyright: 2DAW IES Doñana</p>
    </footer>

</body>
</html>