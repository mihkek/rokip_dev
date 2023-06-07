@if ($paginator->hasPages())
    <div class="dataTables_paginate paging_full_numbers" style="margin-top: 20px;">
        <ul class="pagination" style=" justify-content: flex-end;">
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())

                            <li class="paginate_button page-item active">
                                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                            </li>

                        @else

                            <li class="paginate_button page-item">
                                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                            </li>

                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </div>
@endif
