@extends('components.layout')
@section('title', 'Employee')
@section('content')
    <div class="rounded-4 p-5 mb-5 shadow-lg">
        <div class="">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h2 class="text-dark m-0">Data Employee</h2>
                </div>
                <a href="{{ route('employee.create') }}" class="btn btn-success btn-xs btnflat"><i
                        class="fa fa-plus-circle"></i>
                    Tambah Data
                </a>
            </div>
            <br>
            <div class="box-body table-responsive">
                <table class="table-hover table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Gender</th>
                            <th>Unit Kerja</th>
                            <th>Jabatan</th>
                            <th width="20%"><i class="fas fa-cog">Action</i></th>
                        </tr>
                    </thead>
                    @foreach ($queries as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->telepon }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->unit_kerja }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>
                                <a href="{{ route('employee.show', [$item->id]) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('employee.edit', [$item->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form class="d-inline" action="{{ route('employee.destroy', [$item->id]) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus data?')">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            {!! $queries->links() !!}
        </div>
    @endsection
