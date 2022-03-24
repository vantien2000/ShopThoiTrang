<?php
namespace App\Contrats;

use App\Contrats\AdminInterface as ContratsAdminInterface;

abstract class AdminAbstract implements ContratsAdminInterface
{
    protected $modal;

    public function modal() {
        return $this->modal;
    }

    public function store($array) {
        return $this->modal()->create($array);
    }

    public function show($id) {
        return $this->modal()->find($id);
    }

    public function edit($id, $array) {
        return $this->modal->update($array, ['id' => $id]);
    }

    public function delete($id) {
        return $this->modal->delete($id);
    }

    public function all() {
        return $this->modal->all();
    }
}