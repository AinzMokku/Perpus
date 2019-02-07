@extends('tamplate')

@section('judul')
Dashboard
@stop

@section('subjudul')
Ini adalah dashboard 
@stop

@section('content')
<button onclick="pesan('top','error','Ini adalah Pesan Error',1000)">KLIK SAYA</button>

<script>
$(document).ready(function(){
    pesan('bottom','success','Ini adalah Pesan Success',1500);
})
</script>
@stop
