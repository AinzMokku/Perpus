<style>
    table { width : 100%; }
    table td { text-align: center; }
</style>
<table>
@php
    $i = 1;
    $count = count($buku);
@endphp

@foreach($buku as $rsBuku)
@if(($i%6)==1)
<tr>
@endif
    <td width="20%"><img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(150)->color(13,71,161)->backgroundColor(218,247,231)->generate($rsBuku->no_induk_buku)) }}">
    <p>{{ $rsBuku->no_induk_buku }}</p>
    </td>
@if(($i%6)==0 || $i==$count)
</tr>
@endif

@php
$i++;
@endphp

@endforeach
</table>