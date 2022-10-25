<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'producto' => [
        'title' => 'Productos',

        'actions' => [
            'index' => 'Productos',
            'create' => 'New Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'tipo' => 'Tipo',
            'precio' => 'Precio',
            'cantidad' => 'Cantidad',
            
        ],
    ],

    'punto' => [
        'title' => 'Puntos',

        'actions' => [
            'index' => 'Puntos',
            'create' => 'New Punto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'puntos-ventum' => [
        'title' => 'Puntos Venta',

        'actions' => [
            'index' => 'Puntos Venta',
            'create' => 'New Puntos Ventum',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'descripcion' => 'Descripcion',
            'codigo postal' => 'Codigo postal',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];