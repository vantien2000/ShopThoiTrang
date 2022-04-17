<?php
namespace App\Contracts;

interface RepositoryInterface 
{

    public function modal();

    public function store(array $array);

    public function show($id, $key);

    public function edit($id, $key, array $array);

    public function delete($id, $key);

    public function all();
}