@extends('welcome')
@section('content_trik')

<table>

    @foreach($webtrik as $Get)
    <tr>
        <td>
           <a href="{{ $Get->judul_trik}}" target="_blank">{{ $Get->judul_trik}}</a> 
           <br>
           <br>
           <a href="{{ $Get->kd_trik}}" target="_blank">
            <img src="{{$Get->gambar_trik}}" alt="{{$Get->kd_trik}}" style="width: 300px; height:auto">
           </a>
           <br>
        </td>
    </tr>
    @endforeach

</table>

@endsection