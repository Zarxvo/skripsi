@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Home</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        {{-- <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0"> --}}
                            {{-- <div class="d-flex justify-content-between">
                                <h5 class="card-title">Selamat Datang di Sistem Pendukung Keputusan Bantuan Langsung Tunai</h5>
                            </div> --}}
                            <div class="container mt-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card text-white bg-info mb-3">
                                            <div class="card-header">Jumlah Alternatif</div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $jumlahAlternatif }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card text-white bg-warning mb-3">
                                            <div class="card-header">Jumlah Kriteria</div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $jumlahKriteria }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card text-white bg-primary mb-3">
                                            <div class="card-header">Jumlah SubKriteria</div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $jumlahSubKriteria }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        </div>
                    {{-- </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection