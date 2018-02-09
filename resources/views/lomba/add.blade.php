@extends('layouts.app')

@section('css')

@endsection

@section('content')
<form action="/lomba" method="post">
{{csrf_field()}}
    <div class="form-group">
          <label for="nama">Nama</label>
          <input name ="nama" type="text" class="form-control" id="nama" placeholder="nama">
        </div>
        <div class="form-group">
                <label for="deskripsi">Nama</label>
                <input name ="deskripsi" type="text" class="form-control" id="deskripsi" placeholder="deskripsi">
        </div>
        <div class="form-group">
                <label for="poster">Url Poster</label>
                <input name ="poster" type="text" class="form-control" id="poster" placeholder="poster">
        </div>
        <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input name ="tanggal" type="date" class="form-control" id="tanggal" placeholder="poster">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection

@section('js')

@endsection