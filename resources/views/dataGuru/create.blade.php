@extends('layouts.template')

@section('content')
    <form action="{{ route('dataGuru.store') }}" method="post" class="card p-5">
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
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="name" name="name" id="name" class="form-control">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
                <input type="email" name="email" id="price" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan Data </button>
    </form>
@endsection
