@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Sub Kriteria</h1>
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
                            <form action="{{ route('subkriteria.update', $subkriteria->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="kriteria_id">Kriteria</label>
                                    <select name="kriteria_id" id="kriteria_id" class="form-control" required>
                                        <option value="">-- Pilih Kriteria --</option>
                                        @foreach($kriteria as $k)
                                            <option value="{{ $k->id }}" {{ $subkriteria->kriteria_id == $k->id ? 'selected' : '' }}>
                                                {{ $k->deskripsi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Subkriteria</label>
                                    <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ $subkriteria->deskripsi }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="nilai">Nilai</label>
                                    <input type="number" name="nilai" id="nilai" class="form-control" value="{{ $subkriteria->nilai }}" step="0.01" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Ubah</button>
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