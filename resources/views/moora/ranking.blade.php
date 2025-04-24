@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ranking</h1>
                </div>
                <div class="col-sm-6">
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
                            <div class="d-flex flex-wrap gap-4">
                            {{-- Form Export PDF --}}
                            <form method="GET" action="{{ route('ranking.export.pdf') }}" target="_blank" class="mb-3 flex-grow-1">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="limit_pdf">Jumlah Data yang Ingin Dicetak (PDF)</label>
                                    <input type="number" class="form-control" id="limit_pdf" name="limit" placeholder="Contoh: 5" min="1">
                                    <small class="form-text text-muted">Kosongkan jika ingin mencetak semua data.</small>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Export ke PDF</button>
                            </form>

                            {{-- Form Export Excel --}}
                            <form action="{{ route('ranking.export.excel') }}" method="GET" class="mb-3 flex-grow-1">
                                <div class="form-group mb-3">
                                    <label for="limit_excel">Jumlah Data yang Ingin Dicetak (Excel)</label>
                                    <input type="number" name="limit" id="limit_excel" class="form-control" placeholder="Contoh: 5">
                                    <small class="form-text text-muted">Kosongkan jika ingin mencetak semua data.</small>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Export ke Excel</button>
                            </form>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:100px">No </th> 
                                        <th style="width:100px">Alternatif</th>
                                        <th style="width:100px">Benefit</th>
                                        <th style="width:100px">Cost</th>
                                        <th style="width:100px">Skor Akhir</th>
                                        <th style="width:100px">Peringkat </th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ranked as $i =>$row)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $row['alternatif'] }}</td>
                                            <td>{{ number_format($row['benefit'], 4) }}</td>
                                            <td>{{ number_format($row['cost'], 4) }}</td>
                                            <td>{{ number_format($row['skor_akhir'], 4) }}</td>
                                            <td>{{ $row['ranking'] }}</td>
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
</div>
@endsection
@section('script')
<script>   
    new DataTable('#example');
</script>
@endsection