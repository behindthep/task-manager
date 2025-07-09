<?php

namespace Tests\Feature;

use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * A dashboard page test.
     *
     * @return void
     */
    public function testHomePage()
    {
        $response = $this->get(route('dashboard'));
        $response->assertOk();
    }
}
