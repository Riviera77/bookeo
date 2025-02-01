<?php

namespace App\Controller;

class Controller
{
    public function route(): void
    // cette méthode teste s'il y a un paramètre d'url dans $_GET['controller']
    // si oui, cette méthode va router les requêtes vers le bon controller
    {
        if (isset($_GET['controller'])){
            switch ($_GET['controller']) {
                case 'page':
                    // charger controleur page
                    var_dump('on charge PageController');
                    break;
                case 'book':
                    // charger controleur book
                    var_dump('on charge BookController');
                    break;
                
                default:
                    // erreur
                    break;
            }
        } else {
            // charger la page d'accueil
        }
    }
}