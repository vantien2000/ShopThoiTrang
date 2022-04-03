<div class="row">
    <form action="{{ route('admin.users.filter') }}" method="GET" class="col-lg-8 d-flex align-items-center">
        <div class="form-group">
            <input type="search" name="keyword" class="form-control w-20" placeholder="Search User" aria-label="Search Dashboard">
        </div>
        <div class="form-group mx-3">
            <select name="isActive" class="form-control">
                <option hidden value="">Tất cả</option>
                <option value="1">Hoạt động</option>
                <option value="0">Khóa</option>
            </select>
        </div>
        <button class="form-group btn btn-alert submit">Search</button>
    </form>
</div>