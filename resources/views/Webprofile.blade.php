@extends('welcome')
@section('content_profile')

<table border="1">

    @foreach($webprofile as $Get)
    <tr>
        <td>
           <a href="{{ $Get->link_profile}}" target="_blank">{{ $Get->nama_profile}}</a> 
           <br>
           <br>
           <a href="{{ $Get->kd_profile}}" target="_blank">
            <img src="{{$Get->gambar_profile}}" alt="{{$Get->kd_profile}}" style="width: 300px; height:auto">
           </a>
           <br>
        </td>
    </tr>
    @endforeach

</table>

@endsection