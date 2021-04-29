<div>
    @if ($paginator->hasPages())
        <nav aria-label="Pagination">
            <ul class="nsw-pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li id="paginator-prev-disabled" class="nsw-pagination__item nsw-pagination__item--prev-page">
                        <a class="nsw-direction-link nsw-direction-link--icon-left" rel="prev">
                            <i class="material-icons nsw-material-icons nsw-material-icons--rotate-180" focusable="false" aria-hidden="true">east</i>
                            <span class="nsw-direction-link__text">Back <span class="sr-only">a page</span></span>
                        </a>
                    </li>
                @else
                    <li id="paginator-prev-page" class="nsw-pagination__item nsw-pagination__item--prev-page">
                        <a href="#" class="nsw-direction-link nsw-direction-link--icon-left" wire:click.prevent="previousPage" rel="prev">
                            <i class="material-icons nsw-material-icons nsw-material-icons--rotate-180" focusable="false" aria-hidden="true">east</i>
                            <span class="nsw-direction-link__text">Back <span class="sr-only">a page</span></span>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="nsw-pagination__item" aria-disabled="true"><span class="nsw-pagination__text">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li id="paginator-current-page" class="nsw-pagination__item nsw-pagination__item--is-active" wire:key="paginator-current-page" aria-current="page">
                                    <a class="nsw-pagination__link is-current">
                                        <span class="nsw-pagination__text">
                                            <span class="sr-only">Page </span>{{ $page }}
                                        </span>
                                    </a>
                                </li>
                            @else
                                <li id="paginator-page-{{ $page }}" class="nsw-pagination__item" wire:key="paginator-page-{{ $page }}">
                                    <a href="#" class="nsw-pagination__link" wire:click.prevent="gotoPage({{ $page }})">
                                        <span class="nsw-pagination__text">
                                            <span class="sr-only">Page </span>{{ $page }}
                                        </span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li id="paginator-next-page" class="nsw-pagination__item nsw-pagination__item--next-page">
                        <a href="#" class="nsw-direction-link" wire:click.prevent="nextPage" rel="next">
                            <span class="nsw-direction-link__text">
                                Next <span class="sr-only">page</span>
                            </span>
                            <i class="material-icons nsw-material-icons" focusable="false" aria-hidden="true">east</i>
                        </a>
                    </li>
                @else
                    <li id="paginator-next-disabled" class="nsw-pagination__item nsw-pagination__item--next-page">
                        <a class="nsw-direction-link" rel="next">
                            <span class="nsw-direction-link__text">
                                Next <span class="sr-only">page</span>
                            </span>
                            <i class="material-icons nsw-material-icons" focusable="false" aria-hidden="true">east</i>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
