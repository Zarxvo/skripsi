@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sg-6">
                    <h1 class="mb-4">Tambah Kriteria</h1>
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
                            <form action="{{ route('kriteria.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" name="kode" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tipe</label>
                                <select name="tipe" class="form-control">
                                    <option value="benefit">Benefit</option>
                                    <option value="cost">Cost</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="prioritas">Prioritas (Rank):</label>
                                <input type="number" class="form-control" id="prioritas" name="prioritas" min="1" required>
                                <small class="form-text text-muted">1 = prioritas tertinggi</small>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control"></input>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection