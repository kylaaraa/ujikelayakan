@extends('layouts.template')

@section('content')
    <form action="{{ route('data-klasifikasi-surat.update',['id' => $surat['id']]) }}" method="POST" class="card p-5">
        @csrf

        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Kode Surat :</label>
            <div class="col-sm-10">
                <input type="number" name="letter_code" id="name" class="form-control" value="{{ $surat['letter_code'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Klasifikasi Surat :</label>
            <div class="col-sm-10">
                <input type="text" name="name_type" id="price" class="form-control" value="{{ $surat['name_type'] }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah </button>
    </form>
@endsection
