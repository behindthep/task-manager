<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;

class PageControllerTest extends TestCase
{
    public function testNotFoundPageIsDisplayed(): void
    {
        $response = $this->get(__('Non-existent route'));

        $response->assertSessionHasNoErrors();
        $response->assertStatus(404);
        $response->assertSee(__('errors.404.info'));
    }
}
