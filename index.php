<?php
spl_autoload_register();

use App\Controller\Controller;

$controller = new Controller(); // création du controller principal 
$controller->route(); // j'appelle la méthode route du controller principal

?>