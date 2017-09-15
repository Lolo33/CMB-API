<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Globals;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Psr\Container\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class PlageHoraireController extends Controller
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @Rest\View(serializerGroups={"horaires"})
     * @Rest\Get("/terrains/{id}/horaires")
     */
    public function getHorairesAction(Request $request)
    {
        $terrain = $this->getDoctrine()->getRepository("AppBundle:Terrain")->find($request->get("id"));
        return $terrain->getListeHoraires();
    }


    public function getHoraireByHeure()
    {

    }

    /**
     * @Rest\View(serializerGroups={"horaires"})
     * @Rest\Get("/horaires/{id}")
     */
    public function getHoraireAction(Request $request)
    {
        $horaire = $this->getDoctrine()->getRepository("AppBundle:PlageHoraire")->find($request->get("id"));
        if (empty($horaire))
            return Globals::httpErrorNotFound("Cette plage horaire est introuvable");
        return $horaire;
    }

}
