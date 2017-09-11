<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PlanningComissionControllerTest extends WebTestCase
{
    public function testGetcomissions()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getComissions');
    }

    public function testGetcomission()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getComission');
    }

}
