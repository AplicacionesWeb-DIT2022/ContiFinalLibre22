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
            'codigo_postal' => 'Codigo postal',
            
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
            'ubicacion' => 'Ubicacion',
            'ciudad' => 'Ciudad',
            'CP' => 'CP',
            
        ],
    ],

    'locale' => [
        'title' => 'Locale',

        'actions' => [
            'index' => 'Locale',
            'create' => 'New Locale',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'locale' => [
        'title' => 'Locales',

        'actions' => [
            'index' => 'Locales',
            'create' => 'New Locale',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'locale' => [
        'title' => 'Locales',

        'actions' => [
            'index' => 'Locales',
            'create' => 'New Locale',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'ciudad' => 'Ciudad',
            'CP' => 'CP',
            
        ],
    ],

    'lugare' => [
        'title' => 'Lugares',

        'actions' => [
            'index' => 'Lugares',
            'create' => 'New Lugare',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'ciudad' => 'Ciudad',
            'CP' => 'CP',
            
        ],
    ],

    'cliente' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
            'email' => 'Email',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];