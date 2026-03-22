 @foreach ($news as $key => $item)
     <tr style="border-bottom:1px solid #eee;">
         <td style="padding:12px;">{{ $key + 1 }}</td>
         <td style="padding:12px;"> {{ Str::limit(ucwords($item?->title ?? '')) }}</td>
         <td style="padding:12px;"> {{ Str::limit(ucwords($item?->description ?? '')) }}</td>
         <td style="padding:12px;">
             @if (!empty($item->file))
                 <a href="{{ route('download', ['path' => $item->file]) }}" target="_blank"
                     style="color:#1a73e8; font-weight:600;">
                     Download
                 </a>
             @endif
         </td>
     </tr>
 @endforeach
