<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LieuControllerTest extends WebTestCase
{
    public function testGetlieu()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getLieu');
    }

    public function testGetlieux()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getLieux');
    }

}
