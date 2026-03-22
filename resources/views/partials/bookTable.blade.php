@forelse ($books as $key => $book)
    <tr style="border-bottom:1px solid #eee;">
        <td style="padding:12px;">{{ $key + 1 }}</td>
        <td style="padding:12px;">{{ $book?->name ?? '' }}</td>
        <td style="padding:12px;">{{ $book?->publisher ?? '' }}</td>
    </tr>
@empty
    <tr>
        <td colspan="3">No data found</td>
    </tr>
@endforelse
