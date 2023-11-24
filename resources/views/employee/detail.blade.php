@extends('components.layout')

@section('content')
<div class="shadow-lg rounded-4 p-5">
    <div class="row mb-4">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Data Employee</h2>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col">
            <div class="my-1">
                <div class="form-group row">
                    <strong class="col-2">Nama</strong>
                    <p class="col">: {{ $employee->nama }}</p>
                    <strong class="col-2">Pendidikan</strong>
                    <p class="col">: {{ $employee->pendidikan }}</p>
                </div>
            </div>
            <div class="my-1">
                <div class="form-group row">
                    <strong class="col-2">Tanggal Lahir</strong>
                    <p class="col">: {{ $employee->tgl_lahir }}</p>
                    <strong class="col-2">Unit Kerja</strong>
                    <p class="col">: {{ $employee->unit_kerja }}</p>
                </div>
            </div>
            <div class="my-1">
                <div class="form-group row">
                    <strong class="col-2">Telepon</strong>
                    <p class="col">: {{ $employee->telepon }}</p>
                    <strong class="col-2">Jabatan</strong>
                    <p class="col">: {{ $employee->jabatan }}</p>
                </div>
            </div>
            <div class="my-1">
                <div class="form-group row">
                    <strong class="col-2">Gender</strong>
                    <p class="col">: {{ $employee->gender }}</p>
                    
                </div>
            </div>
        </div>
        <div class="col-4">
            @if($employee->foto)
                <img src="{{ url('storage/foto/').'/'.$employee->foto }}" style="width:250px" class="rounded-3  " />
            @endif
            </div>
            
        <div class="mt-3">
            <a class="btn btn-secondary" href="{{ route('employee.index') }}"> Back</a>
        </div>
    </div>
</div>
@endsection