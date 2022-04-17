<?php
namespace App\Contracts;

use App\Contracts\RepositoryInterface;

abstract class RepositoryAbstract implements RepositoryInterface
{
    protected $modal;

    public function modal() {
        return $this->modal;
    }

    public function store($array) {
        return $this->modal()->create($array);
    }

    public function show($id, $key) {
        return $this->modal()->where($key, $id)->first();
    }

    public function edit($id, $key, $array) {
        return $this->modal->where($key, $id)->update($array);
    }

    public function delete($id, $key) {
        return $this->modal->where($key, $id)->delete();
    }

    public function all() {
        return $this->modal->all();
    }
}