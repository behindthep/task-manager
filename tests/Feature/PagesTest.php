<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesTest extends TestCase
{
    public function testHomePage(): void
    {
        $response = $this->get(route('dashboard'));
        $response->assertOk();
    }

    public function testDocsPage(): void
    {
        $response = $this->get(route('api.docs'));
        $response->assertOk();
    }
}
