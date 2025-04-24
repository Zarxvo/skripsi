@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Optimasi</h1>
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
                                    <th style="width:100px">No</th>
                                    <th style="width:100px">Alternatif</th>
                                    <th style="width:100px">Skor MOORA (Benefit - Cost)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($alternatif as $index => $a)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $a->nama }}</td>
                                        <td>
                                            @if(isset($optimasi[$a->id]))
                                                {{ number_format($optimasi[$a->id], 4) }}
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
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
</script>
@endsection