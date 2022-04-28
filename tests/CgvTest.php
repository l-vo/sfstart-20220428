<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CgvTest extends WebTestCase
{
    public function testCgv(): void
    {
        $client = static::createClient();
        $client->request('GET', '/cgv');

        $this->assertResponseIsSuccessful();
    }
}
