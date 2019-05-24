<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
	use RefreshDatabase;

	/** @test */

    public function an_user_can_have_an_animal()
    {
		$user = factory('App\User')->create();

		$user->animal()->create(['name' => 'Lion']);

		$this->assertEquals('Lion', $user->animal->name);        
    }
}
