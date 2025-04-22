<?php if(!class_exists('Rain\Tpl')){exit;}?><h1>
    Hello World <?php echo htmlspecialchars( $name, ENT_COMPAT, 'UTF-8', FALSE ); ?>
</h1>

<p>Hello World, porem pequeno</p>

<p>A versão usada no PHP foi: <?php echo htmlspecialchars( $version, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>