@extends('admin.layouts.master')
@section('content')
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        @include('admin.links.index')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if (!empty($users))
                        <div class="card">
                            <div class="card-body">
                                @include('admin.users.filter')
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle table-users">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Ảnh đại diện</th>
                                                <th scope="col">Tên người dùng</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Giới Tính</th>
                                                <th scope="col">Tuổi</th>
                                                <th scope="col">Địa Chỉ</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $count = 0;
                                            @endphp
                                            @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $count = $count + 1 }}</td>
                                                <td class="text-center"><img class="img-preview" src="{{ asset('userfiles/images/users/' . $user->avatar) }}" width="60" height="60" alt="user_image"></td>
                                                <td>{{ $user->user_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone_number }}</td>
                                                <td>{{ $user->gender == 1 ? "Nữ" : "Nam" }}</td>
                                                <td>{{ $user->age }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td class="active-value-{{ $user->user_id }}">{{ $user->isActive == 1 ? 'Hoạt động' : 'Khóa'}}</td>
                                                <td class="text-center">
                                                    <span>
                                                        @if ($user->isActive == 1)
                                                            <a data-user-id="{{ $user->user_id }}" data-url="{{ route('admin.edit.users', ['id' => $user->user_id, 'isActive' => 0]) }}" class="active-btn bg-danger p-2 text-white rounded cursor-pointer" data-toggle="tooltip" data-placement="top" title="Close">Khóa</a>
                                                        @else
                                                            <a data-user-id="{{ $user->user_id }}" data-url="{{ route('admin.edit.users', ['id' => $user->user_id, 'isActive' => 1]) }}" class="active-btn bg-success p-2 text-white rounded cursor-pointer" data-toggle="tooltip" data-placement="top" title="Close">Hoạt động</a>
                                                        @endif
                                                    </span>    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @include('admin.pagination.index', ['paginator' => $users])
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
@endsection