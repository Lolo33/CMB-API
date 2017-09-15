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

class ReservationController extends Controller
{


    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    function connexionBdd(){
        $hote = "localhost";
        $db = "mate_maker_api";
        $user = "root";
        $pass = "";
        try {
            $bdd = new \PDO('mysql:host='.$hote.';dbname='.$db.';charset=utf8', $user, $pass);
            $bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $bdd;
        } catch (\Exception $e) {
            die('<b>Erreur de connexion à la Bdd :</b> <br>' . $e->getMessage());
        }
    }

    function maj_plage_sans_verif($id, $statut_id, $reservation_id, $hor_heure_debut, $hor_heure_fin, $terrain_id){
        $db = $this->connexionBdd();
        $req = $db->prepare('
		UPDATE plage_horaire
		SET statut_id = :statut_id, reservation_id = :reservation_id, hor_heure_fin = :hor_heure_fin, hor_heure_debut = :hor_heure_debut, terrain_id = :terrain_id
		WHERE id = :id
	');
        $req->bindValue(":id", $id, \PDO::PARAM_INT);
        $req->bindValue(":statut_id", $statut_id, \PDO::PARAM_INT);
        $req->bindValue(":reservation_id", $reservation_id, \PDO::PARAM_INT);
        $req->bindValue(":hor_heure_debut", $hor_heure_debut->format('Y-m-j H:i:s'), \PDO::PARAM_STR);
        $req->bindValue(":hor_heure_fin", $hor_heure_fin->format('Y-m-j H:i:s'), \PDO::PARAM_STR);
        $req->bindValue(":terrain_id", $terrain_id, \PDO::PARAM_INT);
        $req->execute();

        unset($req);
    }
    function insert_plage_sans_verif($statut_id, $reservation_id, $hor_heure_debut, $hor_heure_fin, $terrain_id){
        $db = $this->connexionBdd();
        $req = $db->prepare('
		INSERT INTO plage_horaire(statut_id, reservation_id, hor_heure_debut, hor_heure_fin, terrain_id)
		VALUES (:statut_id, :reservation_id, :hor_heure_debut, :hor_heure_fin, :terrain_id)
	');
        $req->bindValue(":statut_id", $statut_id, \PDO::PARAM_INT);
        $req->bindValue(":reservation_id", $reservation_id, \PDO::PARAM_INT);
        $req->bindValue(":hor_heure_debut", $hor_heure_debut->format('Y-m-j H:i:s'), \PDO::PARAM_STR);
        $req->bindValue(":hor_heure_fin", $hor_heure_fin->format('Y-m-j H:i:s'), \PDO::PARAM_STR);
        $req->bindValue(":terrain_id", $terrain_id, \PDO::PARAM_INT);
        $req->execute();
    }
    function delete_plage($id){
        $db = $this->connexionBdd();
        $req = $db->prepare('DELETE FROM plage_horaire WHERE id = :id');
        $req->bindValue(":id", $id, \PDO::PARAM_INT);
        $req->execute();
    }
    function liste_plages_horaires_terrain($terrain_id){
        $db = $this->connexionBdd();
        $req = $db->prepare('SELECT * FROM  terrain INNER JOIN plage_horaire ON terrain.id = plage_horaire.terrain_id WHERE terrain.id = :terrain_id');
        $req->bindValue(":terrain_id", $terrain_id, \PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll();
    }
    function reserver($datetime_debut, $datetime_fin, $terrain, $nom_client, $tel_client, $desc = null)
    {
        $db = $this->connexionBdd();
        $obj_heure_plage_debut = clone($datetime_debut);
        $obj_heure_plage_fin = clone($datetime_fin);
        if ($obj_heure_plage_debut < $obj_heure_plage_fin) {
            $plages = $this->liste_plages_horaires_terrain($terrain);
            $resa_possible = 0;
            foreach ($plages as $plage_key => $plage_value) {
                $obj_heure_plage_debut2 = \DateTime::createFromFormat('Y-m-j H:i:s', $plage_value['hor_heure_debut']);
                $obj_heure_plage_fin2 = \DateTime::createFromFormat('Y-m-j H:i:s', $plage_value['hor_heure_fin']);
                if ($plage_value['statut_id'] == 1 AND $obj_heure_plage_debut >= $obj_heure_plage_debut2 AND $obj_heure_plage_fin <= $obj_heure_plage_fin2) {
                    if ($obj_heure_plage_debut == $obj_heure_plage_debut2 AND $obj_heure_plage_fin == $obj_heure_plage_fin2) {
                        $this->delete_plage($plage_value['id']);
                        $resa_possible = 1;
                        break 1;
                    } elseif ($plage_value['statut_id'] == 1 AND $obj_heure_plage_debut == $obj_heure_plage_debut2 AND $obj_heure_plage_fin < $obj_heure_plage_fin2) {
                        echo "maj par décalage du début de la plage dispo";
                        $this->maj_plage_sans_verif($plage_value['id'], $plage_value['statut_id'], $plage_value['reservation_id'], $datetime_fin, $obj_heure_plage_fin2, $plage_value['terrain_id']);
                        $resa_possible = 1;
                        break 1;
                    } elseif ($plage_value['statut_id'] == 1 AND $obj_heure_plage_debut > $obj_heure_plage_debut2 AND $obj_heure_plage_fin == $obj_heure_plage_fin2) {
                        echo "maj par réduction de la fin de la plage";
                        $this->maj_plage_sans_verif($plage_value['id'], $plage_value['statut_id'], $plage_value['reservation_id'], $obj_heure_plage_debut2, $datetime_debut, $plage_value['terrain_id']);
                        $resa_possible = 1;
                        break 1;
                    } elseif ($plage_value['statut_id'] == 1 AND $obj_heure_plage_debut > $obj_heure_plage_debut2 AND $obj_heure_plage_fin < $obj_heure_plage_fin2) {
                        //On scinde la plage dispo en deux plages, une avant la résa et une aprés la résa
                        $this->delete_plage($plage_value['id']);
                        $this->insert_plage_sans_verif($plage_value['statut_id'], $plage_value['reservation_id'], $obj_heure_plage_debut2, $datetime_debut, $plage_value['terrain_id']);
                        $this->insert_plage_sans_verif($plage_value['statut_id'], $plage_value['reservation_id'], $datetime_fin, $obj_heure_plage_fin2, $plage_value['terrain_id']);
                        $resa_possible = 1;
                        break 1;
                    }
                }
            }
            if ($resa_possible == 1) {
                $res_reference = 1;
                $res_est_confirmee = 0;
                $req = $db->prepare('
				INSERT INTO reservation(res_reference, res_est_confirmee, res_nom_client, res_num_tel_client, res_descriptif)
				VALUES (:res_reference, :res_est_confirmee, :res_client, :res_num, :res_desc)
			');
                $req->bindValue(":res_reference", $res_reference, \PDO::PARAM_STR);
                $req->bindValue(":res_est_confirmee", $res_est_confirmee, \PDO::PARAM_BOOL);
                $req->bindValue(":res_client", $nom_client, \PDO::PARAM_STR);
                $req->bindValue(":res_num", $tel_client, \PDO::PARAM_STR);
                $req->bindValue(":res_desc", $desc, \PDO::PARAM_STR);
                $req->execute();

                $req2 = $db->prepare('SELECT * FROM reservation WHERE res_reference = :res_reference AND res_est_confirmee =:res_est_confirmee ORDER BY id DESC');
                $req2->bindValue(":res_reference", $res_reference, \PDO::PARAM_INT);
                $req2->bindValue(":res_est_confirmee", $res_est_confirmee, \PDO::PARAM_INT);
                $req2->execute();
                $res2 = $req2->fetch();

                $this->insert_plage_sans_verif(3, $res2['id'], $datetime_debut, $datetime_fin, $terrain);
                return "pas de pb, reste à verif la résa";
            } else {
                return "resa impossible";
            }
        }
    }

    public function getReservationsAction()
    {
        return $this->render('AppBundle:Reservation:get_reservations.html.twig', array(
            // ...
        ));
    }

    public function getReservationAction()
    {
        return $this->render('AppBundle:Reservation:get_reservation.html.twig', array(
            // ...
        ));
    }

    /**
     * @Rest\View()
     * @Rest\Post("/reservations")
     */
    public function postReservationAction(Request $request)
    {
        $date_debut = $request->get("date_debut");
        $date_fin = $request->get("date_fin");
        $terrain = $request->get("terrain");
        $nom = $request->get("nom_client");
        $num = $request->get("tel_client");
        if (empty($request->get("descriptif_resa")))
            $descriptif = null;
        else
            $descriptif = $request->get("descriptif_resa");
        return $this->reserver($date_debut, $date_fin, $terrain, $nom, $num, $descriptif);
    }

    public function updateReservationAction()
    {
        return $this->render('AppBundle:Reservation:update_reservation.html.twig', array(
            // ...
        ));
    }

}
