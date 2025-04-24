@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sub Kriteria</h1>
                </div>
                <div class="col-sm-6"></div>
            </div>
        </div>
    </div>
    <div class="content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('subkriteria.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> Tambah SubKriteria</a>

                            <br>
                            <br>
                                @foreach ($kriteria as $k)
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <strong>{{ $k->kode }} - {{ $k->deskripsi }}</strong>
                                    </div>
                                    <div class="card-body">
                                        @if ($k->subkriteria->count())
                                            <table id="#example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:150px">Deskripsi</th>
                                                            <th style="width:70px">Nilai</th>
                                                            <th style="width:50px">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($k->subkriteria->SortBy('nilai') as $sub)
                                                            <tr>
                                                                <td>{{ $sub->deskripsi }}</td>
                                                                <td>{{ $sub->nilai}}</td>
                                                                <td>
                                                                    <a href="{{ route('subkriteria.edit', $sub->id) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                                    <form action="{{ route('subkriteria.destroy', $sub->id) }}" method="POST" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <p class="text-muted">Belum ada subkriteria.</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    new DataTable('#example');

    setTimeout(function() {
        $('.alert').alert('close');
    }, 3000);  // 5000 ms = 5 detik

</script>
@endsection