<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?=$titulo?></title>
    <link rel="stylesheet" type="text/css" href="/ci_steam/css/estilo.css">
</head>
<body>
    <header>
        <h1>STIM</h1>
        <div>
            <?php if(isset($usuario)): ?>
                <p>usuario: <span><?=$usuario?></span></p>
                <button><?=anchor('/usuarios/logout', 'Log Out')?></button>
            <?php else: ?>
                <button><?=anchor('/usuarios/login', 'Log in')?></button>
                <button><?=anchor('/usuarios/singup', 'Sign Up')?></button>
            <?php endif; ?>
        </div>
    </header>
    
    <?= $contents ?>

    <footer>
        <p>&copy; Copyright: 2DAW IES Doñana</p>
    </footer>

</body>
</html>