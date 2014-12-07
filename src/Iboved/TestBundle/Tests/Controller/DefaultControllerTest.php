<?php

namespace Iboved\TestBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/space/hello/World');

        $this->assertTrue($crawler->filter('html:contains("Hello World")')->count() > 0);
    }
}
