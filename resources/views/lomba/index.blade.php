@extends('layouts.app')

@section('css')

@endsection

@section('content')
<table class="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Poster</th>
        <th scope="col">Tanggal Tututp</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $lombas = \App\Lomba::get();
        ?>

        @for($i = 0; $i<sizeof($lombas); $i++)
        <tr>
                <th scope="row">{{$i}}</th>
                <td>
                    <a href="/lomba/{{$lombas[$i]->id}}">
                        {{$lombas[$i]->nama}}
                    </a>
                </td>
                <td>{{$lombas[$i]->deskripsi}}</td>
                <td>
                    <img height="100" src="{{$lombas[$i]->poster}}" />
                </td>
                <td>{{$lombas[$i]->tanggal_tutup}}</td>
                <td>
                    <a href="/lomba/{{$lombas[$i]->id}}/edit">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>   
                    <a href="/lomba/{{$lombas[$i]->id}}/delete">
                        <button type="button" class="btn btn-danger">Hapus</button>
                    </a>        
                </td>
            </tr>


        @endfor
    </tbody>
</table>
@endsection

@section('js')

@endsection