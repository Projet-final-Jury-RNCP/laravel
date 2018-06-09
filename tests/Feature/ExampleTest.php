<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
//         dd($response);
//         $response->assertStatus(200);
        $response->assertStatus(302);

        $this->assertEquals(302, $response->getStatusCode());

        $this->assertTrue(
            $response->headers->has('Location'),
            'API response should have Location header'
            );


        $response = $this->get('/login');

        $this->assertEquals(200, $response->getStatusCode());


    }
}
