@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Nilai</div>

                <div class="card-body">
                    <form action="{{ route('update.nilai', $nilai->id) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                            <div class="col-sm-9">
                                <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
                                    <option value="" disabled selected>-- Pilih Nama Mahasiswa --</option>
                                    @foreach($mahasiswa as $us)
                                        <option value="{{ $us->id }}" {{ $nilai->mahasiswa_id == $us->id ? 'selected' : '' }}>{{ $us->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Mata Kuliah</label>
                            <div class="col-sm-9">
                                <select name="makul_id" id="makul_id" class="form-control">
                                    <option value="" disabled selected>-- Pilih Nama Mata Kuliah --</option>
                                    @foreach($makul as $mkl)
                                        <option value="{{ $mkl->id }}" {{ $nilai->makul_id == $mkl->id ? 'selected' : '' }}>{{ $mkl->nama_makul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-9">
                                <input type="text" name="nilai" class="form-control" value="{{ is_null($nilai) ? '' : $nilai->nilai }}" pattern="[0-9]+" placeholder="Tambahkan Nilai">
                            </div>
                        </div>

                        <div class="form-group float-right">
                            <div class="form-row">
                                <div class="col">
                                    <button class="btn btn-sm btn-primary" type="submit">SIMPAN</button>
                                    <a href="{{ route('nilai') }}" class="btn btn-sm btn-danger">BATAL</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
