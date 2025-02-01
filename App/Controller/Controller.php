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
        
        //test en dur
        //require_once _ROOTHPATH_ . '/templates/page/about.php';

        //je mtn rends la méthode dynamique et donc généraliste
        $filePath = _ROOTHPATH_ . '/templates/' . $path . '.php';

        try {       
            // ajout de la méthode files_exists pour vérifier si le fichier existe
            if (!file_exists($filePath)) {
                //code throw permet de génerer une erreur
                throw new \Exception("Fichier introuvable : ".$filePath);
            } else {
                /* permet d'extraire les lignes du tableau en les transformant 
                //en variables pour les rendre accessibles dans le template
                */
                extract($params);  

                //inclusion du template demandé
                require_once $filePath;
            }          
            
        } catch (\Exception $e) {
            echo $e->getMessage();
        }       
    }

}