<?php
namespace App\Contracts\Repositories;

use App\Contracts\RepositoryAbstract;
use Illuminate\Support\Facades\DB;
use Models\UserData;

class UserRepository extends RepositoryAbstract
{
    public function __construct(UserData $user)
    {
        $this->modal = $user;
    }

    public function filter($filter) {
        $keyword = empty($filter['keyword']) ? '' : $filter['keyword'];
        $users = $this->modal->where(function($query) use($keyword) {
            $query->orWhere('user_data.user_name','LIKE', '%' . $keyword . '%')
            ->orWhere('user_data.email', 'LIKE', '%' . $keyword . '%')
            ->orWhere('user_data.address', 'LIKE', '%'. $keyword .'%')
            ->orWhere('user_data.phone_number', 'LIKE', '%'. $keyword .'%');
        });
        if (isset($filter['isActive'])) {
            if($filter['isActive'] == 0) {
                $users->where('user_data.isActive', STATUS_OFF);
            }
            if($filter['isActive'] == 1) {
                $users->where('user_data.isActive', STATUS_ON);
            }
        }
        return $users->where('user_data.type', USER_TYPE)->paginate(5);
    }
}