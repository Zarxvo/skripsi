@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Kriteria</h1>
                </div>
                <div class="col-sm-6"></div>
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
                           <form action="{{ route('kriteria.update', $kriterium->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="kode">Kode:</label>
                                    <input type="text" class="form-control" id="kode" name="kode" value="{{ $kriterium->kode }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tipe">Tipe:</label>
                                    <select class="form-control" id="tipe" name="tipe" required>
                                        <option value="benefit" {{ $kriterium->tipe == 'benefit' ? 'selected' : '' }}>Benefit</option>
                                        <option value="cost" {{ $kriterium->tipe == 'cost' ? 'selected' : '' }}>Cost</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="prioritas">Prioritas (Rank):</label>
                                    <input type="number" class="form-control" id="prioritas" name="prioritas" min="1" value="{{ $kriterium->prioritas }}" required>
                                    <small class="form-text text-muted">1 = prioritas tertinggi</small>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi:</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $kriterium->deskripsi }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Ubah</button>
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