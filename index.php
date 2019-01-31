<?php
    require_once "app/config/init.php";

    if ($_GET) {
        $controller = isset($_GET['controller']) ? ((class_exists($_GET['controller'])) ? new $_GET['controller'] : NULL ) : null;
        $method     = isset($_GET['method']) ? $_GET['method'] : null;
        if ($controller && $method) {
            if (method_exists($controller, $method)) {
                $parameters = $_GET;
                unset($parameters['controller']);
                unset($parameters['method']);
                call_user_func(array($controller, $method), $parameters);
            } else {
                echo "Método não encontrado!";
            }
        } else {
            echo "Controller não encontrado!";
        }
    } else {
        require_once "app/views/layout/header.php";
        echo "<div class='container'><div class='row justify-content-center'><h1>Livraria</h1></div><hr>";
        echo 'Bem-vindo ao CRUD MVC de uma mini Livraria! <br /><br />';
        echo "<a href='?controller=ListController&method=index'><button type='button' class='btn btn-primary'>Entrar!</button></a>";
    }