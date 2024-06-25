@extends('welcome')
@section('content_videos')

<table border="1">

    @foreach($webvideos as $Get)
    <tr>
        <td>
           <a href="{{ $Get->link_videos}}" target="_blank">{{ $Get->judul_videos}}</a> 
           <br>
           <a href="{{ $Get->link_videos}}" target="_blank">
            <br>
            <img src="{{$Get->gambar_videos}}" alt="{{$Get->judul_videos}}" style="width: 300px; height:auto">
           </a>
           <br>
        </td>
    </tr>
    @endforeach

</table>

@endsection