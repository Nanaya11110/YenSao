@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <button  class= "cursor-default p-2  rounded-sm text-white bg-gray-500">
                        {!! __('pagination.previous') !!}
                    </button>
                @else
                    @if(method_exists($paginator,'getCursorName'))
                        <button class= " hover:cursor-crosshair p-2 rounded-sm text-white bg-gray-500" type="button" dusk="previousPage" wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->previousCursor()->encode() }}" wire:click="setPage('{{$paginator->previousCursor()->encode()}}','{{ $paginator->getCursorName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" >
                                {!! __('pagination.previous') !!}
                        </button>
                    @else
                        <button class= "p-2 rounded-sm text-white bg-gray-500"
                            type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" >
                                {!! __('pagination.previous') !!}
                        </button>
                    @endif
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    @if(method_exists($paginator,'getCursorName'))
                        <button class= " p-2  rounded-sm text-white bg-gray-500"  type="button" dusk="nextPage" wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->nextCursor()->encode() }}" wire:click="setPage('{{$paginator->nextCursor()->encode()}}','{{ $paginator->getCursorName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" >
                                {!! __('pagination.next') !!}
                        </button>
                    @else
                        <button class= " p-2  rounded-sm text-white bg-gray-500"  type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" >
                                {!! __('pagination.next') !!}
                        </button>
                    @endif
                @else
                    <button class= " cursor-default p-2  rounded-sm text-white bg-gray-500">
                        {!! __('pagination.next') !!}
                    </button>
                @endif
            </span>
        </nav>
    @endif
</div>
