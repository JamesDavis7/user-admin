@if ($paginator->hasPages())
<div class="flex">
    @if ( ! $paginator->onFirstPage())
    <a class="mx-1 px-3 py-2 bg-white text-blue-900 font-semibold text-center  rounded text-sm cursor-pointer shadow-sm"
        wire:click="gotoPage(1)">
        <i class="fa-solid fa-angles-left"></i></a>
    @endif
    @foreach ($elements as $element)
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($paginator->currentPage() > 3 && $page === 2)
    <div class="text-blue-800 mx-1">
        <span class="font-semibold">.</span>
        <span class="font-semibold">.</span>
        <span class="font-semibold">.</span>
    </div>
    @endif
    @if ($page == $paginator->currentPage())
    <span
        class="mx-1 px-3 py-2  bg-blue-900 text-white font-semibold text-center rounded text-sm cursor-pointer shadow-sm">{{
        $page }}</span>
    @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page
    === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2)
    <a class="mx-1 px-3 py-2 bg-white border-blue-900 text-blue-900 font-semibold text-center rounded  cursor-pointer shadow-sm"
        wire:click="gotoPage({{$page}})">{{ $page }}</a>
    @endif
    @if ($paginator->currentPage() < $paginator->lastPage() - 2 && $page === $paginator->lastPage() - 1)
        <div class="text-blue-800 mx-1">
            <span class="font-semibold">.</span>
            <span class="font-semibold">.</span>
            <span class="font-semibold">.</span>
        </div>
        @endif
        @endforeach
        @endif
        @endforeach
        @if ($paginator->hasMorePages())
        <a class="mx-1 px-3 py-2 bg-white text-blue-900  font-semibold text-center text-sm rounded cursor-pointer shadow-sm"
            wire:click="gotoPage({{ $paginator->lastPage() }})">
            <i class="fa-solid fa-angles-right"></i>

        </a>
        @endif
</div>
@endif