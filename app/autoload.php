<?php

function autoload($className) {
    $directories = array(
        "models" => array(
            "/session",
            "/pessoas",
            "/bancos",
            "/cartoes",
            "/compras",
            "/despesas",
            "/repository/depesas",
            "/repository/pessoas",
            "/repository/compras",
            "/repository/cartoes",
            "/repository/cartoes/cartao",
        ),
        "controllers" => array(
            "/login",
        ),
        "views" => array(
            
        )
    );

    foreach ($directories as $type => $paths) {
        foreach ($paths as $path) {
            search("$type$path", $className);
        }
    }
}

function search($dir, $className) {
    $file = "C:/laragon/www/". "financeEight/app/$dir/$className.php";
    
    if (file_exists($file)) {
        require_once($file);
        return;
    }
}

spl_autoload_register('autoload');