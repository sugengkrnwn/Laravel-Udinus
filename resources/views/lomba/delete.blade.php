@extends('layouts.app')

@section('content')
<div class="jumbotron">
        <h3 class="display-4">Yakiin... mau di hapuuus.{{$lomba->nama}}?.</h>
<br>
          <a class="btn btn-danger btn-lg" href="/lomba/{{$lomba->id}}/confirmDelete" role="button">Ya</a>
          <a class="btn btn-info btn-lg" href="/lomba" role="button">Tidak</a>
        </p>
      </div>

@endsection