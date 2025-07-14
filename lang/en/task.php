<?php

return [
    'index' => 'Tasks',
    'id' => 'ID',
    'destroy' => 'Delete',
    'created_at' => 'Created at',
    'name' => 'Name',
    'description' => 'Description',
    'edit' => 'Edit',
    'executor' => 'Executor',
    'actions' => 'Actions',
    'create' => 'Create task',
    'store' => 'Create',
    'update' => 'Update',
    'status' => 'Status',
    'created_by_id' => 'Author',
    'assigned_to_id' => 'Executor',
    'stored' => 'Task successfully created',
    'updated' => 'Task successfully updated',
    'deleted' => 'Task successfully deleted',
    'accept_filter' => 'Accept',
    'labels' => 'Labels',
    'validation' => [
        'name' => [
            'unique' => 'A task by that name already exists',
            'max' => 'A task name must not be greater than :max characters.',
        ],
        'description' => [
            'max' => 'A task description must not be greater than :max characters.',
        ],
        'status_id' => [
            'exists' => 'Status cannot be empty.',
        ],
    ],
    'task_view' => 'Task view',
    'task_create' => 'Task create',
    'api' => [
        'not_found' => 'Task not found'
    ]
];
