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
        if (!empty($array['category_id'])) {
            $type->where('category_id', $array['category_id']);
        }
        if (!empty($array['sort_num'])) {
            $type->orderByRaw('type_id desc');
        }
        if (!empty($array['sort_alpha'])) {
            $type->orderByRaw('type_name desc');
        }
        if (isset($array['status'])) {
            if (empty($array['status'])) {
                $type->where('status', STATUS_OFF);
            } else {
                $type->where('status', STATUS_ON);
            }
        }
        return $type->paginate(5);
    }
}