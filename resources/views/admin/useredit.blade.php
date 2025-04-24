@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Admin</h1>
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
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <form method="POST" action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}">
                                @csrf
                                @if(isset($user))
                                    @method('PUT')
                                @endif
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="name" placeholder="nama" class="form-control" value="{{ old('name', $user->name ?? '') }}"  required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="email" name="email" value="{{ old('email', $user->email ?? '') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password', $user->password ?? '') }}"></input>
                                    </div>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection