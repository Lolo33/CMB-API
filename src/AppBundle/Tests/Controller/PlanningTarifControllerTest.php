<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PlanningTarifControllerTest extends WebTestCase
{
    public function testGettarifs()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getTarifs');
    }

    public function testGettarif()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getTarif');
    }

}
