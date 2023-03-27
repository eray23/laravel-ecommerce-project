<?php

namespace Http\Controllers\Backend;

use App\Models\Category;
use Faker\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Mockery\Container;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_users_index_page_status()
    {
        $response = $this->get('/categories');
        $response->assertOk();

    }
    public function test_users_index_url_goes_to_correct_view()
    {
        $response = $this->get('/categories');
        $response->assertViewIs("backend.categories.index");
    }
    public function test_users_create_form_page_status(){
        $response = $this->get("/categories/create");
        $response->assertOk();
    }
    public function test_users_create_form_goes_to_correct_view()
    {
        $response = $this->get('/categories/create');
        $response->assertViewIs("backend.categories.insert_form");
    }
    public function test_users_new_resource_is_created(){
         $data = [
            "name"=> "Deneme Kategorisi",
             "slug"=>"ddeneme Kategorisi"
         ];

         $response = $this->post("/categories", $data);
         $response->assertRedirect("/categories");
    }
    public function test_users_existing_user_is_updated(){
        $entity = Category::all()->last();
        $entity->name = "UPDATED" . $entity->name;
        $entity->slug = "UPDATED" . $entity->slug;
        $data = $entity->toArray();
        $response = $this->put('/categories/' . $entity->category_id, $data);
        $response->assertRedirect('/categories');
    }
}
