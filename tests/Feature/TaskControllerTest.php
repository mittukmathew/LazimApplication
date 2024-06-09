<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetArticleApi(): void
    {
        $this->withoutMiddleware();
        $response = $this->get('/getBlog');

        $response->assertStatus(200);
              
    }
    public function testCreateArticleApi()
    {
        $data = [
            'title' => 'New Article',
            'body' => 'This is the content of the article.',
            'uploadedimage' =>' Null',
        ];

        $response = $this->postJson('/createBlog', $data);

        $response->assertStatus(201);
        // Optionally, you can assert other aspects of the response or check the database for the created article.
    }

    public function testGetArticleByIdApi(): void
    {

        $response = $this->get('/getBlogById/1');
        $response->assertStatus(201);
              
    }

    public function testUpdateArticle()
    {
        $response = $this->put('/updateBlogById/3', [
            'title' => 'Updated Title',
            'body' => 'Updated Content',
            'uploadedimage'=> 'Null',
        ]);
        $response->assertStatus(200);
    }

    public function testDeleteArticle()
    {
    
        $response = $this->delete('/blogDelete/3' );
        $response->assertStatus(200);
    }

}
