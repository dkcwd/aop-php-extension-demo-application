<?php
if (!class_exists('Composer\\Autoload\\ClassLoader', false)) {
    require __DIR__ . '/composer' . '/ClassLoader.php';
}

return call_user_func(function() {
    $loader = new \Composer\Autoload\ClassLoader();
    $composerDir = __DIR__ . '/composer';
    
    $loader->setUseIncludePath(true);

    $loader->register();

    return $loader;
});
