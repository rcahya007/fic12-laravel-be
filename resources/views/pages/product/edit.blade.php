@extends('layouts.app')

@section('title', 'Edit product')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Edit product</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Product</h2>
                <div class="card">
                    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Product</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name Product</label>
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    name="name" value="{{ $product->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select
                                    class="form-control selectric @error('category_id')
                                is-invalid
                            @enderror"
                                    name="category_id">
                                    @foreach ($dataCategory as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($data->id == $product->category_id) selected @endif>{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image product</label>
                                <div id="image-preview" class="image-preview"
                                @if ($product->image != null) style="
                                background-image: url('{{ asset('storage/products/' . $product->image) }}');
                                background-size: cover;
                                background-position: center center;
                                " @endif>
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="image" id="image-upload"
                                        class="@error('image')
                                        is-invalid
                                    @enderror" />
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label>Description</label>
                                <div class="">
                                    <textarea
                                        class="summernote-simple @error('description')
                                    is-invalid
                                @enderror"
                                        name="description">{{ $product->description }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input type="number"
                                        class="form-control currency @error('price')
                                    is-invalid
                                @enderror"
                                        name="price" value="{{ $product->price }}">
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <div class="input-group">
                                    <input type="number"
                                        class="form-control @error('stock')
                                    is-invalid
                                @enderror"
                                        name="stock" value="{{ $product->stock }}">
                                    @error('stock')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-label">Status Produk</div>
                                <label class="mt-2">
                                    <input type="checkbox" name="is_available"
                                        class="custom-switch-input @error('is_available')
                                    is-invalid
                                @enderror"
                                        @if ($product->is_available == 1) checked @endif>
                                    @error('is_available')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Jika status aktif, produkmu dapat dicari oleh
                                        calon pembeli.</span>
                                </label>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>
@endpush
