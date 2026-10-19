<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        Cache::flush();
        Http::preventStrayRequests();
        Http::fake(['openlibrary.org/*' => Http::response(['numFound' => 0, 'docs' => []])]);

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
