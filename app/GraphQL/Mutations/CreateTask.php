<?php

namespace App\GraphQL\Mutations;

use App\Models\Task;

final class CreateTask
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $task = Task::create([
            'title' => $args['title'],
            'due_date' => $args['due_date'],
            'description' => $args['description'],
            'category_id' => $args['category_id'],
            'user_id' => auth('sanctum')->id(),
        ]);
        
        return $task->load('user', 'category');
    }
}
