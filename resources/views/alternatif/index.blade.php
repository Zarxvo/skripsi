@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Alternatif & Skor</h1>
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
                            <a href="{{ route('alternatif.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> Tambah Alternatif</a>

                            <br>
                            <br>
                            <table id="example"  class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        @foreach ($kriteria as $k)
                                        <th>{{$k->kode}}</th>
                                        @endforeach
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alternatif as $a)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $a->nama}}</td>
                                        @php
                                        $scr = $skor->where('id_al', $a->id)->all();
                                        @endphp
                                        @foreach ($scr as $s)
                                        <td>{{$s->deskripsi}}</td>
                                        @endforeach
                                        <td>
                                            <a href="{{ route('alternatif.edit', $a->id) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                            <form action="{{ route('alternatif.destroy', $a->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Alternatif ini?')"><i class="fas fa-trash"></i></button>
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