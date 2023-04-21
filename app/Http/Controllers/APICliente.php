<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APICliente extends Controller{
    public function index(){
    $producto = new \stdClass;
    $producto->id = ("SOY UN PRODUCTO");
    return json_encode($producto);
    }

public function store(Request $request)
{
    // Lógica para crear un nuevo usuario
}

public function show($id)
{
    // Lógica para obtener y mostrar un usuario específico por ID
}

public function update(Request $request, $id)
{
    // Lógica para actualizar un usuario específico por ID
}

public function destroy($id)
{
    // Lógica para eliminar un usuario específico por ID
}
}
