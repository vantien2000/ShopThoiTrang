<?php
namespace App\Contracts\Repositories;

use App\Contracts\AdminAbstract;
use Models\Types;

class TypeAdminRepository extends AdminAbstract
{
    public function __construct(Types $type)
    {
        $this->modal = $type;
    }

    public function filter($array) {
        $type = $this->modal->query();
        if (!empty($array['type_name'])) {
            $type->where('type_name', $array['category_name']);
        }
        if ($array['category_id']) {
            $type->where('category_id', $array['category_id']);
        }
        if ($array['sort_num'] == STATUS_ON) {
            $type->orderByRaw('type_id desc');
        }
        if ($array['sort_alpha'] == STATUS_ON) {
            $type->orderByRaw('type_name desc');
        }
        if ($array['status']) {
            $type->where('status', $array['status']);
        }
        return $type->paginate(5);
    }
}