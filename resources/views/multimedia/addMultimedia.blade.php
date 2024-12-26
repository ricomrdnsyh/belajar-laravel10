@extends('layout.main')

@section('content')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('adminmultimedia') }}">Data Multimedia</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Tim Multimedia</li>
        </ol>
    </nav>

    <form action="{{ route('adminstore.multimedia') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h6 class="card-title">Tambah Tim Multimedia</h6>
                    <hr>
                    <form class="forms-sample">
                        <div class="mb-3">
                            <label for="image" class="form-label">Foto Profil</label>
                            <input type="file" class="form-control" name="image" id="nama">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" id="nama" autocomplete="off" placeholder="Masukkan Nama..">
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenisKelamin" class="form-label">Jenis Kelamin</label> <br>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="jenisKelamin" value="Laki-laki" id="radioInline">
                                <label class="form-check-label" for="radioInline">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="jenisKelamin" value="Perempuan" id="radioInline1">
                                <label class="form-check-label" for="radioInline1">
                                    Perempuan
                                </label>
                            </div>
                        @error('jenisKelamin')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select class="form-select" name="jabatan" id="jabatan">
                                <option selected="" disabled="">Pilih Jabatan</option>
                                <option value="Ketua">Ketua</option>
                                <option value="Sekretaris">Sekretaris</option>
                                <option value="Bendahara">Bendahara</option>
                                <option value="Anggota">Anggota</option>
                            </select>
                        @error('jabatan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="5"></textarea>
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="{{ route('adminmultimedia') }}" class="btn btn-light">Cancel</a>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
