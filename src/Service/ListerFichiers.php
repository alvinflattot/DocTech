<?php 

namespace App\Service;


/**
 * 
 */
class ListerFichiers{

    //fonction qui parcours les dossiers et sous dossiers et récupère le path de chaque fichier trouvé
    public function lister($path)
    {
            //On déclare le tableau qui contiendra tous les éléments de nos dossiers
            $tableau_elements = array();
    
            // //On ouvre le dossier
            $dir = scandir($path);
    
            //Pour chaque élément du dossier...
            foreach ($dir as  $element_dossier)
            {
                

                //Si l'élément est lui-même un dossier (en excluant les dossiers parent et actuel), on appelle la fonction de listage en modifiant la racine du dossier à ouvrir
                if ($element_dossier != '.' && $element_dossier != '..'  && is_dir($path.'/'.$element_dossier))
                {
                        //On fusionne ici le tableau grâce à la fonction array_merge. Au final, tous les résultats de nos appels récursifs à la fonction listage fusionneront dans le même tableau
                        $tableau_elements = array_merge($tableau_elements, $this->lister($path.'/'.$element_dossier));
                }
                elseif ($element_dossier != '.' && $element_dossier != '..'  )
                {
                    //Sinon, l'élément est un fichier : on l'enregistre dans le tableau
                    $tableau_elements[] = $path.'/'.$element_dossier;
                        
                }
            }
            
            //On retourne le tableau
            return $tableau_elements;
        
    }

    public function MultiplierPar3($nombre)
    {
        $resultat = $nombre*3;

        return $resultat;
    }
}