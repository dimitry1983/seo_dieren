@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="http://localhost:8000/dieren/src/public/img/Logo.png" class="logo" alt="Laravel Logo">
@else
<img src="http://localhost:8000/dieren/src/public/img/Logo.png" class="logo" style="width:100%;max-width:320px;height:auto;" alt="Laravel Logo">
@endif
</a>
</td>
</tr>
