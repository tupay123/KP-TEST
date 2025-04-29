@extends('backend.master')

@section('content')
<div class="container">
    <h1>Edit Makanan</h1>

    <form action="{{ route('foods.update', $food) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $food->name }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ $food->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" value="{{ $food->price }}" required>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            @if($food->image)
                <div>
                    <img src="{{ asset('storage/' . $food->image) }}" width="100">
                </div>
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('foods.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
