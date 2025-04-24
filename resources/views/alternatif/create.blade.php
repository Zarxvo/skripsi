@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sg-6">
                    <h1 class="mb-4">Tambah Alternatif</h1>
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
                            <form action="{{route('alternatif.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" placeholder="Isi dengan nama orang atau kode" name="nama" required>
                                    </div>
                                </div>
                                @foreach ($kriteria as $k)
                                <div class="form-group">
                                    <label for="kriteria[{{$k->id}}]">{{$k->nama}} - {{$k->deskripsi}}</label>
                                    <select class="form-control" id="kriteria[{{$k->id}}]"
                                        name="kriteria[{{$k->id}}]">
                                        <!--
                                        @php
                                            $res = $subkriteria->where('kriteria_id', $k->id)->all();
                                        @endphp
                                        -->
                                        @foreach ($res as $cr)
                                        <option value="{{$cr->id}}">{{$cr->nilai}} - {{$cr->deskripsi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endforeach
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('alternatif.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection