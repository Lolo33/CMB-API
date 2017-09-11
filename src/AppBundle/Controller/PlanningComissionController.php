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

class PlanningComissionController extends Controller
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @Rest\View(serializerGroups={"comission"})
     * @Rest\Get("/terrains/{id}/comissions")
     */
    public function getComissionsAction(Request $request)
    {
        $terrain = $this->getDoctrine()->getRepository("AppBundle:Terrain")->find($request->get("id"));
        $terrain_with_comissions_user = Globals::getListeComUser($terrain, $this->getToken($request));
        return $terrain_with_comissions_user->getListeComissions();
    }


    /**
     * @Rest\View(serializerGroups={"comission"})
     * @Rest\Get("/comissions/{id}")
     */
    public function getComissionAction(Request $request)
    {
        $com = $this->getDoctrine()->getRepository("AppBundle:PlanningComission")->find($request->get("id"));
        if ($this->getToken($request)->getApiUser() == $com->getUtilisateurApi())
            return $com;
        else
            return Globals::httpErrorForbidden("Accès refusé : Vous ne pouvez pas accéder à cette comission");
    }

}
