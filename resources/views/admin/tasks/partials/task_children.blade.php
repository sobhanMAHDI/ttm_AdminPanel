<ul>
    @foreach ($children as $child)
        <li>{{ $child->task_title }}</li>
        @if ($child->children)
            @include('tasks.partials.task_children', ['children' => $child->children])
        @endif
    @endforeach
</ul>
