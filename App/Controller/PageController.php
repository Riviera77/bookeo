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

        // on transmet ce tableau à la VUE
        $params = [
            'title' => 'ABC',
            'description' => 'Bienvenue sur la page à propos'
        ];

        //var_dump('on appelle la méthode about');
        //$this->render('page/about', $params);

        // on a aussi la possibilité d'afficher le tableau directement dans la méthode comme dans Symfony
        $this->render('page/about', [
            'title' => 'ABC',
            'description' => 'Bienvenue sur la page à propos'
        ]);
    }

    protected function home()
    {
        var_dump('on appelle la méthode home');
    }

}