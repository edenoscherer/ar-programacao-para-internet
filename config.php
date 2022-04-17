<?php

use App\Models\UsuariosModel;

session_start();

if (!defined('DB_HOST')) {

    define('BASE_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    define('VIEW_PATH', BASE_PATH . 'App' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_PORT', '3306');
    define('DB_DB', 'ar-programacao-internet');
}

function Autoload($className)
{
    $extension =  spl_autoload_extensions();

    require_once(__DIR__ . '/' . $className . $extension);
}
spl_autoload_extensions('.php');
spl_autoload_register('Autoload');


if (!defined('AUTH_USER')) {
    /** @var \App\Entities\Usuario|null */
    $usuarioAutenticado = null;
    if (isset($_SESSION['AUTH_USER'])) {
        $model = new UsuariosModel();
        $usuarioAutenticado = $model->getUsuarioById(intval($_SESSION['AUTH_USER']));
    }
    /** @var \App\Entities\Usuario|null */
    define('AUTH_USER', (array) $usuarioAutenticado);
}
