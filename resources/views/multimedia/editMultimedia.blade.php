@extends('layout.main')

@section('content')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('adminmultimedia') }}">Data Multimedia</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Tim Multimedia</li>
            </ol>
        </nav>

        <form action="{{ route('adminupdate.multimedia', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edit Tim Multimedia</h6>
                            <hr>
                            <form class="forms-sample">
                                @if ($data->image)
                                    <img src="{{ asset('storage/multimedia-image/' . $data->image) }}" alt="Profil"
                                        width="100px" height="100px">
                                @endif
                                <div class="mb-3">
                                    <label for="image" class="form-label">Foto Profil</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <small class="text-danger">Upload foto jika ingin mengubahnya</small>
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{ $data->nama }}"
                                        id="nama" autocomplete="off" placeholder="Masukkan Nama..">
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label> <br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="jenisKelamin" value="Laki-laki"
                                            id="Laki-laki">
                                        {{ $data->jenisKelamin == 'Laki-laki' ? 'checked' : '' }}
                                        <label class="form-check-label" for="Laki-laki">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="jenisKelamin" value="Perempuan"
                                            id="Perempuan">
                                        {{ $data->jenisKelamin == 'Perempuan' ? 'checked' : '' }}
                                        <label class="form-check-label" for="Perempuan">
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
                                        <option value="Ketua" {{ $data->jabatan == 'Ketua' ? 'selected' : '' }}>Ketua
                                        </option>
                                        <option value="Sekretaris" {{ $data->jabatan == 'Sekretaris' ? 'selected' : '' }}>
                                            Sekretaris</option>
                                        <option value="Bendahara" {{ $data->jabatan == 'Bendahara' ? 'selected' : '' }}>
                                            Bendahara</option>
                                        <option value="Anggota" {{ $data->jabatan == 'Anggota' ? 'selected' : '' }}>Anggota
                                        </option>
                                    </select>
                                    @error('jabatan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="5">{{ old('alamat', $data->alamat) }}</textarea>
                                    @error('alamat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('adminmultimedia') }}" class="btn btn-light">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
