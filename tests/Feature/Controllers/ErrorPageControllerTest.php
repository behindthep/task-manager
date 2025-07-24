<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;

class ErrorPageControllerTest extends TestCase
{
    public function testNotFoundPage(): void
    {
        $response = $this->get('/non-existent-route');

        $response->assertSessionHasNoErrors();
        $response->assertStatus(404);
        $response->assertSee(__('errors.404.info'));
    }
}
