<div class="row">
    <form method="GET" action="{{ route('admin.invoices.filter') }}" class="col-lg-9 d-flex justify-content-start align-items-center">
        <div class="form-group mr-3">
            <input type="search" value="{{ Request::input('keyword') ?: '' }}" name="keyword" class="form-control w-20" placeholder="Search Invoices" aria-label="Search Invoice">
        </div>
        <div class="form-group mr-3">
            <input value="{{ Request::input('date_invoice') ?: '' }}" name="date_invoice" type="date" class="form-control"/>
        </div>
        <div class="form-group mr-3">
            <input value="{{ Request::input('month_invoice') ?: '' }}" name="month_invoice" type="month" class="form-control"/>
        </div>
        <button type="submit" class="form-group btn btn-alert submit">Search</button>
    </form>
</div>