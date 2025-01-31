arif<ul>
    @foreach ($children as $child)
        <li>
            {{ $child->tour_title }}
            @if ($child->children->isNotEmpty())
                @include('category_children', ['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>