@extends('layout.main')

@section('content')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Data Tim Multimedia /</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="row mt-4 d-flex justify-content-between align-items-center">
                    <div class="col-sm-12 col-md-8">
                        <h2 class="ms-4 mt-3 card-title">Data Tim Multimedia</h2>
                    </div>
                    <div class="d-flex col-sm-12 col-md-4">
                        <div id="dataTableExample_filter" class="dataTables_filter mx-2">
                            <a href="{{ route('adminadd.Multimedia') }}" class="btn btn-sm btn-primary"><i data-feather="plus-square"></i> Tambah Tim</a>
                        </div>
                    </div>
                </div>
                <hr class="mb-0">
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <div class="row justify-content-between align-items-center mb-2">
                            <div class="col-sm-10 col-md-7">
                                <div class="dataTables_length" id="dataTableExample_length">
                                    Show
                                    <label>
                                        <select name="dataTableExample_length" aria-controls="dataTableExample" class="form-select form-select-sm">
                                            <option value="10">10</option>
                                            <option value="30">30</option>
                                            <option value="50">50</option>
                                            <option value="-1">All</option>
                                        </select>
                                    </label> entries
                                </div>
                            </div>
                            <div class="col-sm-10 col-md-3">
                                <div id="dataTableExample_filter" class="dataTables_filter mt-2">
                                    <form action="{{ route('adminmultimedia') }}" method="GET">
                                        <label>
                                            <input type="search" class="form-control" name="search" value="{{ $request->get('search') }}" id="search" placeholder="Search" aria-controls="dataTableExample">
                                        </label>
                                        <button type="submit" class="btn btn-md btn-light btn-icon" data-feather="search"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                    <div class="row mt-2">
                        <div class="col-sm-12 col-md-8">
                            <div class="dataTables_info" id="dataTableExample_info" role="status" aria-live="polite">Showing 1 to 10 of 22 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTableExample_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="dataTableExample_previous">
                                        <a href="#" aria-controls="dataTableExample" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                    </li>
                                    <li class="paginate_button page-item active">
                                        <a href="#" aria-controls="dataTableExample" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTableExample" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTableExample" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                                    </li>
                                    <li class="paginate_button page-item next" id="dataTableExample_next">
                                        <a href="#" aria-controls="dataTableExample" data-dt-idx="4" tabindex="0" class="page-link">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
