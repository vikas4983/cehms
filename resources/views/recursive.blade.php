@if ($menu->children->count())
    @foreach ($menu->children as $child)
        <tr>
            <td>{{ $loop->parent->index + 1 }}</td>
            <td>Active</td>
            <td>{{ $prefix }} → {{ $child->name }}</td>
        </tr>
        @include('menus.partials.row', [
            'menu' => $child,
            'prefix' => $prefix . ' → ' . $child->name,
        ])
    @endforeach
@endif
