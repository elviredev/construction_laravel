@if ($paginator->hasPages())
  <nav class="pagination-area mt-5 pt-4">
    <ul class="pagination justify-content-center gap-2 border-0">

      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <li class="page-item disabled">
          <span class="page-link rounded-circle border-0 shadow-sm text-muted">
            <i class="fa-solid fa-arrow-left"></i>
          </span>
        </li>
      @else
        <li class="page-item">
          <a class="page-link rounded-circle border-0 shadow-sm text-dark"
          href="{{ $paginator->previousPageUrl() }}">
            <i class="fa-solid fa-arrow-left"></i>
          </a>
        </li>
      @endif


      {{-- Pagination Elements --}}
      @foreach ($elements as $element)

        {{-- "..." Separator --}}
        @if (is_string($element))
          <li class="page-item disabled">
            <span class="page-link border-0">{{ $element }}</span>
          </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="page-item active">
                <span class="page-link rounded-circle border-0 shadow-sm">
                    {{ $page }}
                </span>
              </li>
            @else
              <li class="page-item">
                <a class="page-link rounded-circle border-0 shadow-sm text-dark"
                href="{{ $url }}">
                  {{ $page }}
                </a>
              </li>
            @endif
          @endforeach
        @endif

      @endforeach


      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <li class="page-item">
          <a class="page-link rounded-circle border-0 shadow-sm text-dark"
          href="{{ $paginator->nextPageUrl() }}">
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </li>
      @else
        <li class="page-item disabled">
          <span class="page-link rounded-circle border-0 shadow-sm text-muted">
            <i class="fa-solid fa-arrow-right"></i>
          </span>
        </li>
      @endif

    </ul>
  </nav>
@endif