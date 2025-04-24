@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sg-6">
                    <h1 class="mb-4">Tambah Sub Kriteria</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Ups!</strong> Ada beberapa masalah dengan masukan Anda.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{route('subkriteria.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="kriteria">Kode Kriteria</label>
                                    <select class="form-control" id="kriteria" name="kriteria_id">
                                        @foreach ($kriteria as $c)
                                    <option value="{{ $c->id }}">{{ $c->kode }}-{{ $c->deskripsi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nilai">Nilai</label>
                                    <div class="input-group">
                                        <input id="nilai" type="text" class="form-control" placeholder="Contoh: 5" name="nilai" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <div class="input-group">
                                        <input id="deskripsi" type="text" class="form-control" placeholder="isi deskripsi..." name="deskripsi" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('subkriteria.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection