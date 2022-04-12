<?php
namespace App\Services\Users;

use App\Contracts\Repositories\CategoryRepository;

class ListService
{
    protected CategoryRepository $cateRepository;

    public function __construct(
        CategoryRepository $cateRepository
    ) {
        $this->cateRepository = $cateRepository;
    }

    public function categoriesUser() {
        return $this->cateRepository->showCateUser();
    }
    
}