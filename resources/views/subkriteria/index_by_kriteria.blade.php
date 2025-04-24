@extends('template.index')

@section('content')
<div class="container">
    <h2>Subkriteria untuk: <strong>{{ $kriteria->kode }} - {{ $kriteria->deskripsi }}</strong></h2>

    <a href="{{ route('kriteria.index') }}" class="btn btn-secondary mb-3">← Kembali ke Kriteria</a>
    <a href="{{ route('subkriteria.create') }}" class="btn btn-primary mb-3">+ Tambah Subkriteria</a>

    @if($subkriterias->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subkriteria as $sub)
                    <tr>
                        <td>{{ $sub->deskripsi }}</td>
                        <td>{{ $sub->nilai }}</td>
                        <td>
                            <a href="{{ route('subkriteria.edit', $sub->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('subkriteria.destroy', $sub->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus subkriteria ini?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada subkriteria untuk kriteria ini.</p>
    @endif
</div>
@endsection