<?php

return [
    'index' => 'Statuses',
    'id' => 'ID',
    'destroy' => 'Destroy',
    'created_at' => 'Created at',
    'name' => 'Name',
    'created_by_id' => 'Creator',
    'edit' => 'Edit',
    'actions' => 'Actions',
    'create' => 'Create status',
    'change' => 'Change status',
    'store' => 'Create',
    'update' => 'Update',
    'deleted' => 'Status successfully deleted',
    'stored' => 'Status successfully created',
    'updated' => 'Status successfully changed',
    'has_tasks' => 'Failed to delete status, it has a corresponding task(s)',
    'validation' => [
        'name' => [
            'unique' => 'A status by that name already exists',
            'max' => 'A status name must not be greater than :max characters.',
        ],
    ],
];
