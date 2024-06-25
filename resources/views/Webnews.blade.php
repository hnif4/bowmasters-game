@extends('welcome')
@section('content_news')

<table border="1">

    @foreach($webnews as $Get)
    <tr>
        <td>
           <a href="{{ $Get->link_news}}" target="_blank">{{ $Get->judul_news}}</a> 
           <br>
           <a href="{{ $Get->link_news}}" target="_blank">
            <br>
            <img src="{{$Get->gambar_news}}" alt="{{$Get->judul_news}}" style="width: 300px; height:auto">
           </a>
           <br>
        </td>
    </tr>
    @endforeach

</table>

@endsection