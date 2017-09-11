<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TerrainControllerTest extends WebTestCase
{
    public function testGetterrains()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getTerrains');
    }

    public function testGetterrain()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getTerrain');
    }

}
