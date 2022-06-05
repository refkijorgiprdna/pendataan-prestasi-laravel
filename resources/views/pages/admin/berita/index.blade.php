@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Manajemen Berita</h1>
        {{--  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>  --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            {{--  <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>  --}}
            <div class="card-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                            title="Edit Data">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
<!-- /.container-fluid -->
@endsection
