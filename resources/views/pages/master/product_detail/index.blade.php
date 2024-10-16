@extends('layouts.app', ['breadcrumbs' => ['Product Details']])
@section('title', 'Product Details')

@section('main')

<div class="card mt-10">
    <div class="card-header border-0 pt-6">
        <div class="card-title">
            {{-- Search functionality can be added here if needed --}}
        </div>

        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                <button data-bs-toggle="modal" data-bs-target="#kt_modal_add_product" class="btn btn-sm btn-light-primary me-2">
                    <i class="ki-duotone ki-plus fs-5"></i>
                    Add Product Detail
                </button>
            </div>
            <div class="modal fade" tabindex="-1" id="kt_modal_add_product">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Form ADD Data -->
                        <form id="form-add-product-detail" method="POST" action="{{ route('product_detail.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="name" class="form-label required">Product Name:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Product Image:</label>
                                    <input type="file" name="image" class="form-control">
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label required">Price:</label>
                                    <input type="number" name="price" class="form-control" placeholder="Enter price" step="0.01" required>
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="item_code" class="form-label required">Item Code:</label>
                                    <input type="number" name="item_code" class="form-control" placeholder="Enter item_code" step="0.01" required>
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock:</label>
                                    <input type="number" name="stock" class="form-control" placeholder="Enter stock">
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status:</label>
                                    <select name="status" class="form-select" aria-label="Select status">
                                        <option value="1">Available</option>
                                        <option value="2">Not Available</option>
                                    </select>
                                    <span class="invalid-feedback"></span>
                                </div>

                                <div class="mb-3">
                                    <label for="product_id" class="form-label">Product Name:</label>
                                    <select name="product_id" class="form-select" aria-label="Select product">
                                        <option value="">Select a product</option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-light-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body py-4">
        <div class="mx-auto mt-4 table-responsive">
            <!-- Table For View -->
            <table class="table table-rounded table-striped border gy-7 gs-7" id="table-product-details">
                <thead>
                    <tr class="fw-bold fs-6 border-bottom border-gray-200 text-center">
                        <th>No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Item Code</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Product Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataProductDetail as $index => $productDetail)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $productDetail->name }}</td>
                        <td class="text-center d-flex justify-content-center">
                            @if($productDetail->image)
                            <img src="{{ asset('storage/' . $productDetail->image) }}" alt="{{ $productDetail->name }}" width="100">
                            @endif
                        </td>
                        <td class="text-center">IDR. {{ number_format($productDetail->price, 2) }}</td>
                        <td class="text-center">{{ $productDetail->item_code }}</td>
                        <td class="text-center">{{ $productDetail->stock ?? 'N/A' }}</td>
                        <td class="text-center">
                            {{ $productDetail->status == 1 ? 'Available' : 'Not Available' }}
                        </td>
                        <td class="text-center">{{ $productDetail->product->name ?? 'N/A' }}</td>
                        <td class="text-center">
                            <!-- Edit Button -->
                            <a href="#" class="btn btn-icon btn-active-light-warning w-30px h-30px" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_{{ $productDetail->id }}">
                                @include('components.icons.ki-notepad-edit')
                            </a>

                            <!-- Edit Modal -->
                            <div class="modal fade" tabindex="-1" id="kt_modal_edit_{{ $productDetail->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Edit Product Detail</h3>
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                            </div>
                                        </div>

                                        <!-- Form for EDIT -->
                                        <form id="form-edit-product-detail_{{ $productDetail->id }}" method="POST" action="{{ route('product_detail.update', $productDetail->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label required">Product Name:</label>
                                                    <input type="text" name="name" value="{{ $productDetail->name }}" class="form-control" placeholder="Enter product name" required>
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Product Image:</label>
                                                    <input type="file" name="image" class="form-control">
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="price" class="form-label required">Price:</label>
                                                    <input type="number" name="price" value="{{ $productDetail->price }}" class="form-control" placeholder="Enter price" step="0.01" required>
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="item_code" class="form-label">Item Code:</label>
                                                    <input type="number" name="item_code" value="{{ $productDetail->item_code }}" class="form-control" placeholder="Enter Item Code">
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="stock" class="form-label">Stock:</label>
                                                    <input type="number" name="stock" value="{{ $productDetail->stock }}" class="form-control" placeholder="Enter stock">
                                                    <span class="invalid-feedback"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status:</label>
                                                    <select name="status" class="form-select" aria-label="Select status">
                                                        <option value="1" {{ $productDetail->status == 1 ? 'selected' : '' }}>Available</option>
                                                        <option value="2" {{ $productDetail->status == 2 ? 'selected' : '' }}>Not Available</option>
                                                    </select>
                                                    <span class="invalid-feedback"></span>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="product_id" class="form-label">Product Name:</label>
                                                    <select name="product_id" class="form-select" aria-label="Select product">
                                                        <option value="">Select a product</option>
                                                        @foreach ($products as $product)
                                                        <option value="{{ $product->id }}" {{ $product->id == $productDetail->product_id ? 'selected' : '' }}>
                                                            {{ $product->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-light-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Button -->
                            <form action="{{ route('product_detail.destroy', $productDetail->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-active-light-danger w-30px h-30px" onclick="return confirm('Are you sure you want to delete this product detail?');">
                                    @include('components.icons.ki-trash')
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row">
                <div id="table-product-details-pagination" class="col-auto ml-auto"></div>
            </div>
        </div>
    </div>
</div>

@endsection