@extends('layouts.farmer')


@section('content')

    <div class="container">
        @if (session('success'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <form action="{{ route('farmer.crops.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Crop title"
                            value="{{ old('title') }}">
                        @error('title')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Photo</label>
                        <input type="file" class="form-control" name="photo" id="photo" placeholder="Crop title">
                        @error('photo')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description"
                            rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="available_quantity">available_quantity</label>
                        <input type="number" class="form-control" name="available_quantity" id="available_quantity"
                            placeholder="Crop available_quantity">
                        @error('available_quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Crop price"
                            value="{{ old('price') }}" step="0.5">
                        @error('price')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <select class="form-control" name="unit" id="unit">
                            <option value="KG">KG</option>
                            <option value="KWINTAL">KWINTAL</option>
                            <option value="TONE">TON</option>
                            <option value="LTR">LTR</option>
                        </select>
                        @error('unit')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>


@endsection
