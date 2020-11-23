<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestinputControllerTest extends TestCase
{
    /**
     * ぞんざいな照会　正常ケース
     *
     * @test
     * @return void
     */
    public function show_ぞんざいな照会正常ケース()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('testinput.show',' '));
        $response->assertStatus(200);
    }

    /**
     * ぞんざいな更新　責任者のケース
     *
     * @test
     * @return void
     */
    public function edit_ぞんざいな更新責任者のケース()
    {
        $user = User::factory()->create(['access_auth' => '1']);

        $response = $this->actingAs($user)->get(route('testinput.edit',' '));
        $response->assertStatus(200)
        ->assertSessionMissing('editmsg');
    }

    /**
     * ぞんざいな更新　管理者のケース
     *
     * @test
     * @return void
     */
    public function edit_ぞんざいな更新管理者のケース()
    {
        $user = User::factory()->create(['access_auth' => '9']);

        $response = $this->actingAs($user)->get(route('testinput.edit',' '));
        $response->assertStatus(200)
        ->assertSessionMissing('editmsg');
    }

    /**
     * ぞんざいな更新　担当者のケース
     *
     * @test
     * @return void
     */
    public function edit_ぞんざいな更新担当者のケース()
    {
        $user = User::factory()->create(['access_auth' => '0']);

        $response = $this->actingAs($user)->get(route('testinput.edit',' '));
        $response->assertStatus(200)
            ->assertSessionHas('editmsg');
    }
}
