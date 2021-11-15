@if ($paginator->lastPage() > 1)
    <div class="ani fromBottom">
        <ul class="pagination justify-content-center">
            <!-- voltar -->
            <li class="page-item {{ $paginator->currentPage() == 1 ? 'disabled' : '' }}" title="voltar">
                @if ($paginator->currentPage() == 1)
                    <span class="page-link">
                        <i class="fas fa-angle-left"></i>
                    </span>
                @else
                    <a href="{{ $paginator->url($paginator->currentPage() - 1) }}" class="page-link">
                        <i class="fas fa-angle-left"></i>
                    </a>
                @endif
            </li>

            <!-- primeira -->
            <li class="page-item {{ $paginator->currentPage() == 1 ? 'disabled' : '' }}" title="primeira">
                @if ($paginator->currentPage() == 1)
                    <span class="page-link">
                        <i class="fas fa-angle-double-left"></i>
                    </span>
                @else
                    <a href="{{ $paginator->url(1) }}" class="page-link">
                        <i class="fas fa-angle-double-left"></i>
                    </a>
                @endif
            </li>

            <!-- números -->
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <?php
                $half_total_links = floor(5 / 2);
                $from = $paginator->currentPage() - $half_total_links;
                $to = $paginator->currentPage() + $half_total_links;

                if ($paginator->currentPage() < $half_total_links) {
                    $to += $half_total_links - $paginator->currentPage();
                }

                if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                    $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                }
                ?>

                @if ($from < $i && $i < $to)
                    <li class="page-item {{ $paginator->currentPage() == $i ? 'active' : '' }}">
                        @if ($paginator->currentPage() == $i)
                            <span class="page-link">{{ $i }}</span>
                        @else
                            <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
                        @endif
                    </li>
            @endif
        @endfor

        <!-- última -->
            <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}" title="última">
                @if ($paginator->currentPage() == $paginator->lastPage())
                    <span class="page-link">
                        <i class="fas fa-angle-double-right"></i>
                    </span>
                @else
                    <a href="{{ $paginator->url($paginator->lastPage()) }}" class="page-link">
                        <i class="fas fa-angle-double-right"></i>
                    </a>
                @endif
            </li>

            <!-- próximo -->
            <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}" title="próximo">
                @if ($paginator->currentPage() == $paginator->lastPage())
                    <span class="page-link">
                        <i class="fas fa-angle-right"></i>
                    </span>
                @else
                    <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" class="page-link">
                        <i class="fas fa-angle-right"></i>
                    </a>
                @endif
            </li>
        </ul>
    </div>
@endif
