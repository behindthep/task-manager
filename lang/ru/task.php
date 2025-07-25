<?php

return [
    'index' => 'Задачи',
    'id' => 'ID',
    'destroy' => 'Удалить',
    'executor' => 'Исполнитель',
    'created_at' => 'Дата создания',
    'change' => 'Изменение задачи',
    'name' => 'Имя',
    'description' => 'Описание',
    'edit' => 'Изменить',
    'actions' => 'Действия',
    'create' => 'Создать задачу',
    'store' => 'Создать',
    'update' => 'Обновить',
    'status' => 'Статус',
    'created_by_id' => 'Автор',
    'assigned_to_id' => 'Исполнитель',
    'stored' => 'Задача успешно создана',
    'updated' => 'Задача успешно изменена',
    'deleted' => 'Задача успешно удалена',
    'accept_filter' => 'Применить',
    'labels' => 'Метки',
    'validation' => [
        'name' => [
            'unique' => 'Задача с таким именем уже существует',
            'max' => 'Название задачи не может быть больше чем :max символов.',
        ],
        'description' => [
            'max' => 'Описание задачи не может быть больше чем :max символов.',
        ],
        'status_id' => [
            'exists' => 'Статус не может быть пустым.',
        ],
    ],
    'task_view' => 'Просмотр задачи',
    'task_create' => 'Изменение задачи',
    'api' => [
        'not_found' => 'Задача не найдена'
    ]
];
