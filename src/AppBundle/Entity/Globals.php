<?php
/**
 * Created by PhpStorm.
 * User: Niquelesstup
 * Date: 22/08/2017
 * Time: 14:39
 */

namespace AppBundle\Entity;

use AppBundle\Repository\ComplexeRepository;
use Symfony\Component\HttpFoundation\Response;

class Globals
{

    public static function httpErrorNotFound($message)
    {
        return \FOS\RestBundle\View\View::create(['message' => $message], Response::HTTP_NOT_FOUND);
    }

    public static function httpErrorForbidden($message)
    {
        return \FOS\RestBundle\View\View::create(['message' => $message], Response::HTTP_FORBIDDEN);
    }

    public static function httpErrorBadRequest($message)
    {
        return \FOS\RestBundle\View\View::create(['message' => $message], Response::HTTP_BAD_REQUEST);
    }

    public static function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function getListeComUser($lieu, $token){
        $liste_com = array();
        // Si $lieu est un complexe
        if ($lieu instanceof Complexe) {
            foreach ($lieu->getListeTerrains() as $k => $unTerrain) {
                foreach ($unTerrain->getListeComissions() as $uneCom)
                    if ($uneCom->getUtilisateurApi() == $token->getApiUser())
                        $liste_com[] = $uneCom;
                $lieu->getListeTerrains()[$k]->setListeComissions($liste_com);
            }
            return $lieu;
        // Si $lieu est un terrain
        }else if ($lieu instanceof Terrain){
            foreach ($lieu->getListeComissions() as $k => $uneCom)
                if ($uneCom->getUtilisateurApi() == $token->getApiUser())
                    $liste_com[] = $uneCom;
            $lieu->setListeComissions($liste_com);
            return $lieu;
        }else{
            return null;
        }

    }

}