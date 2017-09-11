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

class ComplexeController extends Controller
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @Rest\View(serializerGroups={"complexe"})
     * @Rest\Get("/complexes/{id}")
     */
    public function getLieuAction(Request $request)
    {
        $lieu = $this->getDoctrine()->getRepository("AppBundle:Complexe")->find($request->get("id"));
        if (empty($lieu))
            return Globals::httpErrorNotFound("Ce complexe n'existe pas");
        return Globals::getListeComUser($lieu, $this->getToken($request));
    }

    /**
     * @Rest\View(serializerGroups={"complexe"})
     * @Rest\Get("/complexes")
     */
    public function getLieuxAction(Request $request)
    {
        $lieux = $this->getDoctrine()->getRepository("AppBundle:Complexe")->findAll();
        $les_lieux_traites = [];
        foreach ($lieux as $unLieu){
            $les_lieux_traites[] = Globals::getListeComUser($unLieu, $this->getToken($request));
        }
        return $les_lieux_traites;
    }

}
