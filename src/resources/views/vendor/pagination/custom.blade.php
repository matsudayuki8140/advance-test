@if ($paginator->hasPages())
    <nav class="p-pagination">
        <!-- 前へ移動ボタン -->
        @if ($paginator->onFirstPage())
            <span class="p-pagination__previous page-number">＜</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">
                <span class="p-pagination__previous page-number">＜</span>
            </a>
        @endif

        <!-- ページ番号　-->
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="disabled page-number">
                    {{ $element }}
                </span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="active page-number current">
                            {{ $page }}
                        </span>
                    @else
                        <span class="active page-number">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </span>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- 次へ移動ボタン -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">
                <span class="p-pagination__next page-number">＞</span>
            </a>
        @else
            <span class="p-pagination__next page-number">＞</span>
        @endif
    </nav>
@endif 