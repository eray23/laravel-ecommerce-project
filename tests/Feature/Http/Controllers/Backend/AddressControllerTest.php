<?php

namespace Http\Controllers\Backend;

use App\Models\Address;
use Tests\TestCase;

class AddressControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index_page(): void
    {
        $response = $this->get('/users/1/addresses');
        $response->assertStatus(200);
    }
    public function test_index_url_goes_to_correct_view(): void
    {
        $response = $this->get('/users/1/addresses');
        $response->assertViewIs("backend.addresses.index");
    }
    public function test_addresses_create_form_page_status(): void
    {
        $response = $this->get('/users/1/addresses/create');
        $response->assertOk();
    }
    public function test_users_create_form_goes_to_correct_view(): void
    {
        $response = $this->get('/users/1/addresses/create');
        $response->assertViewIs("backend.addresses.insert_form");
    }
    public function test_new_resource_is_created(): void
    {
        $addr = Address::factory()->make();
        $data = $addr->toArray();

        $response = $this->post('/users/1/addresses', $data);
        $response->assertRedirect("/users/1/addresses");
    }
}
