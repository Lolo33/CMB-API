<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ReservationControllerTest extends WebTestCase
{
    public function testGetreservations()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getReservations');
    }

    public function testGetreservation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getReservation');
    }

    public function testPostreservation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/postReservation');
    }

    public function testUpdatereservation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateReservation');
    }

}
