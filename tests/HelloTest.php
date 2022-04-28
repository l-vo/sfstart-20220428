<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloTest extends WebTestCase
{
    public function provideDisplayedName(): array
    {
        return [
            'name given' => ['/hello/foo', 'foo'],
            'no name' => ['/hello', 'laurent'],
        ];
    }

    /**
     * @dataProvider provideDisplayedName
     */
    public function testDisplayedName(string $path, string $expectedName): void
    {
        $client = static::createClient();
        $client->request('GET', $path);

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('title', sprintf('Hello %s!', $expectedName));
        $this->assertSelectorTextContains('h1', sprintf('Hello %s! ✅', $expectedName));
    }
}
