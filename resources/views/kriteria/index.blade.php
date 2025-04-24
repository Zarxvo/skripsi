
@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kriteria</h1>
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
                            <a href="{{ route('kriteria.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> Tambah Kriteria</a>
                            <a href="{{ route('generate.bobot') }}" class="btn btn-warning">Generate Bobot ROC</a>
                            <br>
                            <br>
                            <table id="example"  class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Tipe</th>
                                            <th>Bobot</th>
                                            <th>Prioritas</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kriteria as $k)
                                        <tr>
                                            <td>{{ $k->kode }}</td>
                                            <td>
                                                    <span class="badge badge-{{ $k->tipe == 'benefit' ? 'success' : 'warning' }}">
                                                        {{ $k->tipe }}
                                                    </span>
                                                </td>
                                            <td>{{ number_format($k->bobot, 4) }}</td>
                                            <td>{{ $k->prioritas }}</td>
                                            <td>{{ $k->deskripsi }}</td>
                                            <td>
                                                <a href="{{ route('kriteria.edit', $k->id) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <form action="{{ route('kriteria.destroy', $k->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus kriteria ini?')"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
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