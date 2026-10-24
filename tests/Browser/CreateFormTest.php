<?php 

use function Pest\Laravel\actingAs;

it('creates a new Idea', function ()
{
    $this->actingAs($user = App\Models\User::factory()->create());

    visit('/ideas')
        ->click('@create-idea-button')
        ->fill('title', 'This the title')
        ->fill('description', 'This is the de Description')
        ->click('@button-status-completed')
        ->fill('new-link', 'https://googel.com')
        ->click('@add-new-link')
        ->fill('new-link', 'https://hellllo.com')
        ->click('@add-new-link')
        ->click('Fabricate!')
        ->assertPathIs('/ideas')
        ->assertSee('An Idea');

    expect($user->ideas()->first())->toMatchArray([
        'title' => 'This the title',
        'description' => 'This is the de Description',
        'status' => 'completed',
        'links' => ['https://googel.com', 'https://hellllo.com']
    ]);

});