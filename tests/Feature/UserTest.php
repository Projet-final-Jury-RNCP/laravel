<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Product;
use App\ProductUtil;
use App\Week;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        //         $user = factory(\App\User::class)->create();

//         $user = \App\User::find(1);
        $user = \App\User::where('username', 'edc')->get()->first();


        $response = $this->actingAs($user)
        ->withSession(['foo' => 'bar'])
        ->get('/stock');

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertEquals('edc', $user->username);
        $this->assertNotEquals('edc_other', $user->username);

        // CREATE

        $idWeek = 1;

        $product = new Product();
        $product->name = 'my_new_product';
        $product->description = 'my_description';
        $product->id_measure_unit = 1;
        $product->id_category = 1;
        $product->min_threshold = 0;
        $product->max_threshold = 10;
        $product->unit_price = 123.45;

        $idProduct = \App\ProductUtil::createProduct($product, $idWeek);

        $this->assertGreaterThan(0, $idProduct);

        // UPDATE

        $idWeek = 2;

        $product->name = 'my_new_product_updated';
        $product->description = 'my_description_updated';
        $product->id_measure_unit = 1;
        $product->id_category = 1;
        $product->min_threshold = 0;
        $product->max_threshold = 50;
        $product->unit_price = 543.21;

        $udpated = \App\ProductUtil::updateProduct($product, $idWeek);

        $this->assertEquals(true, $udpated);

        // DELETE

        $week = Week::find($idWeek);
        $string = \App\ProductUtil::deleteProduct($product, $week);

        $this->assertContains($product->name, $string);
    }
}
