@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'eveNGO')
<img src="{{asset('logou.png')}}" style="width:200px; height:auto;" class="logo" alt="eveNGO Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
