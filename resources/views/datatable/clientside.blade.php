@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endsection

@section('content')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Data Tim Multimedia(Client-Side) /</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="row mt-4 d-flex justify-content-between align-items-center">
                    <div class="col-sm-12 col-md-9">
                        <h2 class="ms-4 mt-3 card-title">Data Tim Multimedia</h2>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div id="dataTableExample_filter" class="dataTables_filter">
                            <a href="{{ route('adminmultimedia') }}?export=pdf" class="btn btn-icon btn-danger"><i data-feather="file"></i></a>
                            <a href="{{ route('adminadd.Multimedia') }}" class="btn btn-sm btn-primary"><i data-feather="plus-square"></i> Tambah Tim</a>
                        </div>
                    </div>
                </div>
                <hr class="mb-0">
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="clientside" class="table">
                        <thead>
                        <tr>
                            <th>Actions</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Alamat</th>
                        </tr>
                        </thead>
                        <tbody id="search_list">
                            @foreach ($data as $d)
                                <tr data-index="0">
                                    <td>
                                        <a class="btn btn-sm btn-inverse-light btn-icon" href="#"><i data-feather="eye"></i></a>
                                        <a class="btn btn-sm btn-inverse-light btn-icon" href="{{ route('adminedit.multimedia', ['id'=> $d->id]) }}"><i data-feather="edit-2"></i></a>
                                        <a class="btn btn-sm btn-inverse-light btn-icon" href="" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $d->id }}"><i data-feather="trash-2"></i></a>
                                    </td>
                                    <td><img src="{{ asset('storage/multimedia-image/'.$d->image) }}" alt="profile"></td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->jenis_kelamin }}</td>
                                    <td>{{ $d->jabatan }}</td>
                                    <td>{{ $d->alamat }}</td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="modalHapus{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin ingin menghapus data <b>{{ $d->nama }}</b>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('admindelete.multimedia', ['id' => $d->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#clientside').DataTable();
        } );
    </script>
@endsection
