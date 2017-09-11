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

class PlanningTarifController extends Controller
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @Rest\View(serializerGroups={"tarif"})
     * @Rest\Get("/terrains/{id}/tarifs")
     */
    public function getTarifsAction(Request $request)
    {
        $terrain = $this->getDoctrine()->getRepository("AppBundle:Terrain")->find($request->get("id"));
        if (empty($terrain))
            return Globals::httpErrorNotFound("Ce terrain n'existe pas");
        return $terrain->getListeTarifs();
    }

    /**
     * @Rest\View(serializerGroups={"tarif"})
     * @Rest\Get("/tarifs/{id}")
     */
    public function getTarifAction(Request $request)
    {
        $tarif = $this->getDoctrine()->getRepository("AppBundle:PlanningTarif")->find($request->get("id"));
        if (empty($tarif))
            return Globals::httpErrorNotFound("Ce tarif n'existe pas");
        return $tarif;
    }

}
