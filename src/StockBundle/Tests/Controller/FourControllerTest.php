<?php

namespace StockBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FourControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index');
    }

    public function testNewcat()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/newCat');
    }

    public function testNewfab()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/newFab');
    }

}
