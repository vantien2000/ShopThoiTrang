<?php
namespace App\Contrats;

interface AdminInterface 
{

    public function modal();

    public function store(array $array);

    public function show($id);

    public function edit($id, array $array);

    public function delete($id);

    public function all();
}