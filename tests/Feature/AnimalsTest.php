<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnimalsTest extends TestCase
{
    use RefreshDatabase;

        /** @test */

    public function guests_can_not_create_animals()
    {
        //$this->withoutExceptionHandling();

        $this->post('/animals')->assertRedirect('/login');

    }    

    /** @test */

    public function a_user_can_create_an_animal()
    {
        $this->withoutExceptionHandling();

        //Given I'm a user who is logged in
   
        $this->actingAs(factory('App\User')->create());

        //When they hit the endpoint /animals to create a new animal, while passing the necessary data

        $attributes = ['name' => 'Lion'];

        $this->post('/animals', $attributes);

        //Then there should be a new in the database

        $this->assertDatabaseHas('animals', $attributes);
    }
}
