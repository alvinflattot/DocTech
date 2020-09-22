<?php

namespace App\Service;

/**
 * Classe de notre service, elle contient toutes les méthodes et attributs de notre service
 */
class RandomMD5Hash{

    /**
     * Méthode permettant de générer un hash md5 aléatoire et de le retourner
     */
    public function generate(){
        return md5( rand().time().uniqid() );
    }

}