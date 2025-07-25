<?php

return [
    'index' => 'Labels',
    'id' => 'ID',
    'destroy' => 'Delete',
    'created_at' => 'Created at',
    'name' => 'Name',
    'created_by_id' => 'Creator',
    'description' => 'Description',
    'edit' => 'Edit',
    'actions' => 'Actions',
    'create' => 'Create label',
    'change' => 'Change label',
    'store' => 'Create',
    'update' => 'Update',
    'deleted' => 'Label successfully deleted',
    'accept_filter' => 'Accept',
    'stored' => 'Label successfully created',
    'updated' => 'Label successfully changed',
    'has_tasks' => 'Failed to delete label, it has a corresponding task(s)',
    'validation' => [
        'name' => [
            'unique' => 'A label by that name already exists',
            'max' => 'A label name must not be greater than :max characters.',
        ],
        'description' => [
            'max' => 'A label description must not be greater than :max characters.',
        ],
    ],
    'api' => [
        'not_found' => 'Label not found'
    ]
];
