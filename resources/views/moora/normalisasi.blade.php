@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Normalisasi</h1>
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
                            <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:100px">Alternatif</th>
                                    @foreach($kriteria as $k)
                                        <th style="width:100px">{{ $k->kode }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($alternatif as $a)
                                    <tr>
                                        <td>{{ $a->nama }}</td>
                                        @foreach($kriteria as $k)
                                            <td>
                                                @if(isset($normalisasi[$a->id][$k->id]))
                                                    {{ number_format($normalisasi[$a->id][$k->id], 4) }}
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        @endforeach
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
</script>
@endsection