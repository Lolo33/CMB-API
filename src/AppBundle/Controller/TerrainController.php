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


class TerrainController extends Controller
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @Rest\View(serializerGroups={"terrains"})
     * @Rest\Get("/complexes/{id}/terrains")
     */
    public function getTerrainsAction(Request $request)
    {
        $lieu = $this->getDoctrine()->getRepository("AppBundle:Complexe")->find($request->get("id"));
        if (empty($lieu))
            return Globals::httpErrorNotFound("Ce complexe n'existe pas");
        $token = $this->getToken($request);
        $liste_terrains = [];
        foreach ($lieu->getListeTerrains() as $unTerrain)
            $liste_terrains = Globals::getListeComUser($unTerrain, $token);
        return $liste_terrains;
    }

    /**
     * @Rest\View(serializerGroups={"terrains"})
     * @Rest\Get("/terrains/{id}")
     */
    public function getTerrainAction(Request $request)
    {
        $terrain = $this->getDoctrine()->getRepository("AppBundle:Terrain")->find($request->get("id"));
        $token = $this->getToken($request);
        return Globals::getListeComUser($terrain, $token);
    }

}
