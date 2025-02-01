<?php

namespace App\Controller;

class PageController extends Controller
{
    public function route(): void
    // cette méthode teste s'il y a un paramètre d'url dans $_GET['controller']
    // si oui, cette méthode va router les requêtes vers le bon controller
    {
        if (isset($_GET['action'])){
            switch ($_GET['action']) {
                case 'about':
                    // appeler la méthode about()
                    $this->about();
                    break;
                case 'home':
                    // appeler la méthode home()
                    $this->home();
                    break;
                
                default:
                    // erreur
                    break;
            }
        } else {
            // charger la page d'accueil
        }
    }

    protected function about()
    {
        /* on pourrait récupérer les données
        en faisant appel au modèle
        */
        var_dump('on appelle la méthode about');
    }

    protected function home()
    {
        var_dump('on appelle la méthode home');
    }

}