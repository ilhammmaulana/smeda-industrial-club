@extends('layouts.app', ['breadcrumbs' => ['Product Details']])
@section('title', 'Product Details')

@section('main')

{{-- <form action="{{ route('product.detail.store', $products->id) }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="card mt-10">
    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <h1>Product Details {{ $products->name }}</h1> <!-- Display product name -->
        </div>
    </div>

    <div class="card-body py-4">
        <div class="mx-auto mt-4 table-responsive">
            <div class="mb-3">
                <label for="subject" class="required form-label">Name</label>
                <input type="text" id="subject" name="item" class="form-control form-control-solid"
                    placeholder="Add Product Detail Name" required />
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Product Detail Image:</label>
                <input type="file" name="image" class="form-control">
                <span class="invalid-feedback"></span>
            </div>

            <!-- Stock Field -->
            <div class="mb-3">
                <label for="item_code" class="required form-label">Item Code</label>
                <input type="number" id="item_code" name="item_code" class="form-control form-control-solid"
                    placeholder="Enter Item Code quantity" min="0" />
            </div>

            <!-- Stock Field -->
            <div class="mb-3">
                <label for="stock" class="required form-label">Stock</label>
                <input type="number" id="stock" name="stock" class="form-control form-control-solid"
                    placeholder="Enter stock quantity" min="0" />
            </div>

            <!-- Price Field -->
            <div class="mb-3">
                <label for="price" class="required form-label">Price</label>
                <input type="number" id="price" name="price" class="form-control form-control-solid"
                    placeholder="Enter price" step="0.01" min="0" required />
            </div>

            <!-- Status Field -->
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select name="status" class="form-select" aria-label="Select status">
                    <option value="1">Available</option>
                    <option value="2">Not Available</option>
                </select>
                <span class="invalid-feedback"></span>
            </div>

        </div>
        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/product" class="btn btn-secondary">Back</a>

        </div>
    </div>
</div>

</form> --}}



<div class="card mt-10">
    <div class="card-header border-0 pt-6">

        <div class="card-title">
            <h1>Product Details {{ $products->brand }} {{ $products->type }}</h1> <!-- Display product name -->
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
                        {{-- <th>Stock</th> --}}
                        <th>Status</th>
                        <th>Tanggal Aktif </th>
                        <th>Tanggal Berakhir</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($productDetails as $index => $productDetail)
                    <tr>
                        <td class="text-center">{{ (int)$index + 1 }}</td>
                        <td class="text-center">{{ $productDetail->name }}</td>
                        <td class="text-center d-flex justify-content-center">
                            @if($productDetail->image)
                            <img src="{{ asset( $productDetail->image) }}" alt="{{ $productDetail->name }}" width="100">
                            @endif
                        </td>
                        <td class="text-center">IDR. {{ number_format($productDetail->price, 2) }}</td>
                        <td class="text-center">{{ $productDetail->code }}</td>
                        {{-- <td class="text-center">{{ $productDetail->stock ?? 'N/A' }}</td> --}}
                        {{-- <td class="text-center">
                            {{ $productDetail->status == 'Available' ? 'Available' : 'Not Available' }}
                        </td> --}}
                        <td class="text-center">{{ $productDetail->status }}</td>
                        <td class="text-center">{{ $productDetail->start_cut_off }}</td>
                        <td class="text-center">{{ $productDetail->end_cut_off }}</td>

                        <td class="text-center">
                            <!-- Edit Button -->
                            <a href="#" class="btn btn-icon btn-active-light-warning w-30px h-30px"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_edit_{{ $productDetail->id }}">
                                @include('components.icons.ki-notepad-edit')
                            </a>

                            <!-- Edit Modal -->
                            <div class="modal fade" tabindex="-1" id="kt_modal_edit_{{ $productDetail->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Edit Product Detail</h3>
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                        class="path2"></span></i>
                                            </div>
                                        </div>

                                        <!-- Form for EDIT -->
                                        <form id="form-edit-product-detail_{{ $productDetail->id }}" method="POST"
                                            action="{{ route('product.detail.update', $productDetail->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                {{-- <div class="mb-3">
                                                    <label for="item" class="form-label required">Product Name:</label>
                                                    <input type="text" name="item"
                                                        value="{{ old('item', $productDetail->item) }}"
                                                        class="form-control" placeholder="Enter product name" required>
                                                    @error('item')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div> --}}
                                                {{-- <div class="mb-3">
                                                    <label for="image" class="form-label">Product Image:</label>
                                                    <input type="file" name="image" class="form-control">
                                                    <span class="text-muted">Leave blank to keep the current
                                                        image.</span>
                                                    @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div> --}}
                                                <div class="col mt-5">
                                                    <label for="image" class="form-label ">Image:</label><br>
                                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                                       style="background-image: url({{ asset('assets/media/svg/avatars/blank.svg') }})">
                                                       <!--begin::Image preview wrapper-->
                                                       <div class="image-input-wrapper w-125px h-125px"
                                                          style="background-image: url({{ asset('assets/media/svg/avatars/blank.svg') }})"></div>
                                                       <!--end::Image preview wrapper-->

                                                       <!--begin::Edit button-->
                                                       <label
                                                          class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                          data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                          title="Change assetImage">
                                                          <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span
                                                                class="path2"></span></i>

                                                          <!--begin::Inputs-->
                                                          <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                                          <input type="hidden" name="image_remove" />
                                                          <!--end::Inputs-->
                                                       </label>
                                                       <!--end::Edit button-->

                                                       <!--begin::Cancel button-->
                                                       <span
                                                          class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                          data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                          title="Cancel assetImage">
                                                          <i class="ki-outline ki-cross fs-3"></i>
                                                       </span>
                                                       <!--end::Cancel button-->

                                                       <!--begin::Remove button-->
                                                       <span
                                                          class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                          data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                                          title="Remove assetImage">
                                                          <i class="ki-outline ki-cross fs-3"></i>
                                                       </span>
                                                       <!--end::Remove button-->
                                                    </div>
                                                 </div>
                                                {{-- <div class="mb-3">
                                                    <label for="price" class="form-label required">Price:</label>
                                                    <input type="number" name="price"
                                                        value="{{ old('price', $productDetail->price) }}"
                                                        class="form-control" placeholder="Enter price" step="0.01"
                                                        required>
                                                    @error('price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="item_code" class="form-label">Item Code:</label>
                                                    <input type="text" name="item_code"
                                                        value="{{ old('item_code', $productDetail->item_code) }}"
                                                        class="form-control" placeholder="Enter item_code">
                                                    @error('item_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="stock" class="form-label">Stock:</label>
                                                    <input type="number" name="stock"
                                                        value="{{ old('stock', $productDetail->stock) }}"
                                                        class="form-control" placeholder="Enter stock">
                                                    @error('stock')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status:</label>
                                                    <select name="status" class="form-select"
                                                        aria-label="Select status">
                                                        <option value="1"
                                                            {{ $productDetail->status == 1 ? 'selected' : '' }}>
                                                            Available</option>
                                                        <option value="2"
                                                            {{ $productDetail->status == 2 ? 'selected' : '' }}>Not
                                                            Available</option>
                                                    </select>
                                                    <span class="invalid-feedback"></span>
                                                </div> --}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-light-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!-- Delete Button -->
                            <form action="{{ route('product.detail.destroy', $productDetail->id) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-icon btn-active-light-danger w-30px h-30px" type="submit"
                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                    @include('components.icons.ki-trash')
                                </button>
                            </form>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/product" class="btn btn-secondary">Back</a>

        </div>
        </div>

        <div class="row">
            <div id="table-product-details-pagination" class="col-auto ml-auto"></div>
        </div>
    </div>
</div>
@endsection
