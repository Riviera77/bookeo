<?php

namespace App\Controller;

class Controller
{
    public function route(): void
    // cette méthode analyse le paramètre controller et teste s'il y a un paramètre d'url dans $_GET['controller']
    // si oui, il crée une nve instance du bon controller - va router les requêtes vers le bon controller
    {
        if (isset($_GET['controller'])){
            switch ($_GET['controller']) {
                // rôle du switch = créer une instance du bon controller
                case 'page':
                    // charger controleur page
                    //var_dump('on charge PageController');
                    $PageController = new PageController(); // création d'un controller plus spécifique : page
                    $PageController->route(); // appelle la méthode route qui va analyser le paramètre d'url action
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

    protected function render(string $path, array $params = []): void
    {
        // cette méthode va inclure le template header, le template demandé et le template footer
        // elle va aussi injecter les paramètres dans le template demandé
        extract($params);
        include __DIR__ . '/../../templates/header.php';
        include __DIR__ . '/../../templates/' . $path . '.php';
        include __DIR__ . '/../../templates/footer.php';
    }

}