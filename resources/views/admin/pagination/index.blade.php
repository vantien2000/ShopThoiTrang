@if ($paginator)
    @if ($paginator->lastPage() > 1)
    @php
        $limit_page = 5;
    @endphp
    <ul class="pagination">
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url(1) }}"><</a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $total_links = $paginator->perPage();
            $from = $paginator->currentPage() - $total_links;
            $to = $paginator->currentPage() + $total_links;
            if ($paginator->currentPage() < $total_links) {
            $to += $total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $total_links) {
                $from -= $total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            $to_limit_page = $to < $limit_page ?? $limit_page;
            ?>
            @if ($from < $i && $i < $to)
                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->lastPage()) }}">></a>
        </li>
    </ul>
    @endif
@endif