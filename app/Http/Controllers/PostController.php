<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return "Aque se mostrara el listado de posts";
    }
    public function create()
    {
        return "Aqui estara el formulario para crear un nuevo post";
    }
    public function store()
    {
        return "Aqui se procesara el post";
    }
    public function show($post)
    {
        return "Aqui se mostrara el post $post";
    }
    public function edit($post)
    {
        return "Aqui se mostrara el formulario para editar el post $post";
    }
    public function update($post)
    {
        return "Aqui se actualizara el post $post";
    }
    public function destroy($post)
    {
        return "Aqui se eliminara el post $post";
    }
}
