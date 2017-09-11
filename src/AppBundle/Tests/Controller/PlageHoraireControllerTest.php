<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PlageHoraireControllerTest extends WebTestCase
{
    public function testGethoraires()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getHoraires');
    }

    public function testGethoraire()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getHoraire');
    }

}
