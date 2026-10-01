<?php

use App\Models\Idea;
use App\Models\Step;
use App\Models\User;

test('belongs to a user', function ()
{
    $idea = Idea::factory()->create();
    expect($idea->user)->toBeInstanceOf(User::class);
}); 

test('it can have steps', function ()
{
    $idea = Idea::factory()->create();
    expect($idea->steps)->toBeEmpty();                      //Since Currently we don't have any steps.

    $idea->steps()->create([
        'description' => "Something Something Text"
    ]);

    expect($idea->fresh()->steps)->toHaveCount(1);
});