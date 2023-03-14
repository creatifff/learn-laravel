@if ($paginator->hasPages())
    <!-- Pagination -->
    <ul class="actions pagination">
        <li><a href="{{ $paginator->previousPageUrl() }}" class="button large previous">Previous Page</a></li>
        <li><a href="{{ $paginator->nextPageUrl() }}" class="button large next">Next Page</a></li>
    </ul>
@endif
