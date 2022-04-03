<div class="row">
    <form action="{{ route('admin.products.filter') }}" method="GET" class="col-lg-8 d-flex justify-content-between align-items-center">
        <div class="form-group">
            <input type="search" name="keyword" class="form-control w-20" placeholder="Search Dashboard" aria-label="Search Dashboard">
        </div>
        <div class="form-group">
            <select name="type_id" class="form-control">
                <option value="" hidden>Tất cả</option>
                @foreach ($types as $type)
                    <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select name="size" class="form-control">
                <option value="" hidden>Tất cả</option>
                @foreach (config('setup.sizes') as $size)
                    <option value="{{ $size }}">{{ $size }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group d-flex align-items-center justify-content-center">
            <label class="m-0">Hiển thị: </label>
            <input class="ml-1" name="status" {{ Request::input('status') == 0 ? 'checked' : '' }} type="radio" value="0"><span class="mx-1">Ẩn</span>
            <input name="status" {{ Request::input('status') == 1 ? 'checked' : '' }} type="radio" value="1"><span class="mx-1">Hiện</span>
        </div>
        <button class="form-group btn btn-alert submit">Search</button>
    </form>
    <div class="col-lg-4 add-link text-right">
        <a href="{{ route('admin.add.products') }}" class="btn btn-primary">Add</a>
    </div>
</div>