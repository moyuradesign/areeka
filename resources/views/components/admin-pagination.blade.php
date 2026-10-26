@props(['paginator'])
@php
    $last = $paginator->lastPage();
    $current = $paginator->currentPage();
    $start = max(1, $current - 2);
    $end = min($last, $current + 2);
@endphp
<nav class="admin-pager" aria-label="Table pagination">
    <div class="admin-pager-summary">
        @if($paginator->total())
            Showing <strong>{{ $paginator->firstItem() }}–{{ $paginator->lastItem() }}</strong> of <strong>{{ $paginator->total() }}</strong> records
        @else
            No records yet
        @endif
    </div>
    @if($paginator->hasPages())
    <div class="admin-pager-controls">
        @if($paginator->onFirstPage())
            <span class="admin-pager-arrow is-disabled" aria-disabled="true"><x-ui-icon name="chevron-left" :size="16" /></span>
        @else
            <a class="admin-pager-arrow" rel="prev" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous page"><x-ui-icon name="chevron-left" :size="16" /></a>
        @endif
        @foreach($paginator->getUrlRange($start,$end) as $number=>$url)
            <a href="{{ $url }}" class="admin-pager-page {{ $number === $current ? 'is-current' : '' }}" @if($number === $current)aria-current="page"@endif aria-label="Page {{ $number }}">{{ $number }}</a>
        @endforeach
        @if($paginator->hasMorePages())
            <a class="admin-pager-arrow" rel="next" href="{{ $paginator->nextPageUrl() }}" aria-label="Next page"><x-ui-icon name="chevron-right" :size="16" /></a>
        @else
            <span class="admin-pager-arrow is-disabled" aria-disabled="true"><x-ui-icon name="chevron-right" :size="16" /></span>
        @endif
    </div>
    <form method="get" action="{{ request()->url() }}" class="admin-page-jump" aria-label="Go to page">
        @foreach(request()->except('page') as $name=>$value)
            @if(is_scalar($value))<input type="hidden" name="{{ $name }}" value="{{ $value }}">@endif
        @endforeach
        <label for="areeka-page-{{ $paginator->getPageName() }}">Go to</label>
        <input id="areeka-page-{{ $paginator->getPageName() }}" type="number" name="page" min="1" max="{{ $last }}" value="{{ $current }}" required aria-label="Page number">
        <button type="submit" class="button button-outline small">Go</button>
    </form>
    @endif
</nav>
