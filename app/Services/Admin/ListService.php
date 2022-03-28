<?php
namespace App\Services\Admin;

use App\Contracts\Repositories\CategoryAdminRepository;
use App\Contracts\Repositories\TypeAdminRepository;

class ListService
{
    protected CategoryAdminRepository $cateRepository;
    protected TypeAdminRepository $typeRepository;

    public function __construct(
        CategoryAdminRepository $cateRepository,
        TypeAdminRepository $typeRepository
    )
    {
        $this->cateRepository = $cateRepository;
        $this->typeRepository = $typeRepository;
    }

    public function showCate() {
        return $this->cateRepository->all();
    }

    public function showType() {
        return $this->typeRepository->all();
    }

    public function showCateById($category_id, $key = CATEGORY_ID_KEY) {
        return $this->cateRepository->show($category_id, $key);
    }

    public function addCate($array) {
        if(empty($array['category_name'])) {
            return;
        }
        return $this->cateRepository->store($array);
    }

    public function editCate($id, $array, $key = CATEGORY_ID_KEY) {
        if(empty($array['category_name'])) {
            return;
        }
        $checkUpdate =  $this->cateRepository->edit($id, $key, $array);
        if($checkUpdate) {
            return $this->cateRepository->show($id, $key);
        }
    }

    public function deleteCate($id, $key = CATEGORY_ID_KEY) {
        if (empty($id)) {
            return;
        }
        return $this->cateRepository->delete($id, $key);
    }

    public function addType($array) {
        if(empty($array['type_name']) || empty($array['category_id'])) {
            return;
        }
        return $this->typeRepository->store($array);
    }

    public function editType($id, $array, $key = TYPE_ID_KEY) {
        if(empty($array['type_name']) || empty($array['category_id'])) {
            return;
        }
        $checkUpdate =  $this->typeRepository->edit($id, $key, $array);
        if($checkUpdate) {
            return $this->typeRepository->show($id, $key);
        }
    }

    public function deleteType($id, $key = TYPE_ID_KEY) {
        if (empty($id)) {
            return;
        }
        return $this->typeRepository->delete($id, $key);
    }
}