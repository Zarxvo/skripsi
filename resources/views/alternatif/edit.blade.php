@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Alternatif</h1>
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
                            <form action="{{route('alternatif.update', $alternatif->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <div class="input-group">
                                        <input id="name" type="text" class="form-control" placeholder="Isi dengan nama orang atau kode" name="name" value="{{ $alternatif->nama }}" >
                                    </div>
                                </div>
                                @foreach ($kriteria as $key => $cw)
                                <div class="form-group">
                                    <label for="kriteria[{{$cw->id}}]">{{$cw->nama}} - {{$cw->deskripsi}}</label>
                                    <select class="form-control" id="kriteria[{{$cw->id}}]"
                                        name="kriteria[{{$cw->id}}]">
                                        <!--
                                        @php
                                            $res = $subkriteria->where('kriteria_id', $cw->id)->all();
                                        @endphp
                                        -->
                                        @foreach ($res as $cr)
                                        <option value="{{$cr->id}}" {{ $cr->id == $skoralternatif[$key]->subkriteria_id ? "selected=selected" : "" }}>
                                            {{$cr->subkriteria}} - {{$cr->deskripsi}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @endforeach
                                <button type="submit" class="btn btn-primary">Ubah</button>
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