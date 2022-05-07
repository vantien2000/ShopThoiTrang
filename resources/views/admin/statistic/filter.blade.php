<div class="row">
    <form method="GET" action="{{ route('admin.statistic.filter') }}" class="col-lg-9 d-flex justify-content-start align-items-center">
        <div class="form-group mr-3">
            <input value="{{ Request::input('month_invoice') ?: '' }}" name="month_invoice" type="month" class="form-control"/>
        </div>
        <button type="submit" class="form-group btn btn-alert submit">Search</button>
    </form>
    <div class="col-lg-3 text-right">
        <a href="{{ route('admin.statistic.export') }}" class="form-group btn btn-primary submit">Export to Excel</a>
    </div>
</div>