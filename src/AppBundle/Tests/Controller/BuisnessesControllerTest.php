<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BuisnessesControllerTest extends WebTestCase
{
    public function testGetbuisnesses()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getBuisnesses');
    }

    public function testGetbuisness()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getBuisness');
    }

    public function testPostbuisness()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/postBuisness');
    }

    public function testRemovebuisness()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/removeBuisness');
    }

    public function testUpdatebuisness()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateBuisness');
    }

}
