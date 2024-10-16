@extends('layouts.app', ['breadcrumbs' => ['Products']])
@section('title', 'Products')

@section('main')
<div class="card mt-2">

   <div class="card-header border-0 pt-6">
      <div class="card-title">

         <div class="d-flex align-items-center justi position-relative my-1">

            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
               <span class="path1"></span>
               <span class="path2"></span>
            </i>
            <input type="text" class="form-control form-control-solid w-250px ps-13" placeholder="Search Product"
               name="search" value='' />
         </div>

      </div>
      <div class="d-flex align-items-center" data-kt-user-table-toolbar="base">
         <button class="btn btn-sm btn-light-primary me-2" data-bs-toggle="modal"
            data-bs-target="#kt_modal_add_product">
            <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>
            Bulk Edit Brand Image
         </button>
      </div>


      <!-- Modal for Adding Product -->
      <div class="modal fade" tabindex="-1" id="kt_modal_add_product">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h3 class="modal-title">Bulk Edit Brand Image</h3>
                  <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                     aria-label="Close">
                     <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span><span class="path2"></span>
                     </i>
                  </div>
               </div>
               <form id="form-add-product" method="POST" action="{{ route('product.image-bulk-update') }}"
                  enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="modal-body">
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
                     <div class="mt-5">
                        <label for="brand" class="form-label">Brand:</label>
                        <select name="brand" class="form-select" aria-label="Select Category">
                           <option value="">Select a Brand</option>
                           @foreach ($brands as $brand)
                           <!-- Use the plural form here -->
                           <option value="{{ $brand->brand }}">{{ $brand->brand }}</option>
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
         <!-- End Add Modal -->
      </div>
   </div>

   <div class="card-body py-4">
      <div class="card-toolbar">

         <div class="mx-auto mt-4 table-responsive">
            <!-- Products Table -->
            <table class="table table-rounded table-striped border gy-7 gs-7" id="table-products">
               <thead>
                  <tr class="fw-bold fs-6 border-bottom border-gray-200 text-center">
                     <th>No</th>
                     <th>Brand</th>
                     <th>Type</th>
                     <th>Image</th>
                     <th>Category Name</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($products as $index => $product)
                  <tr>
                     <td class="text-center">{{ $index + 1 }}</td>
                     <td class="text-center">{{ $product->brand }}</td>
                     <td class="text-center">{{ $product->type }}</td>
                     <td class="text-center">
                        @if ($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="100">
                        @else
                        <span>No Image</span>
                        @endif
                     </td>
                     <td class="text-center">{{ $product->category->name ?? 'N/A' }}</td>
                     <td class="text-center">
                        <!-- Edit Button -->
                        <a href="{{ route('product.detail.show', $product->id) }}"
                           class="btn btn-icon btn-active-light-warning w-30px h-30px">
                           @include('components.icons.ki-filter-square')
                        </a>

                        {{-- <a href="#" class="btn btn-icon btn-active-light-warning w-30px h-30px" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_edit_{{ $product->id }}">
                        @include('components.icons.ki-notepad-edit')
                        </a> --}}

         </div>
      </div>
      <!-- End Edit Modal -->

      <!-- Delete Button -->
      <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-icon btn-active-light-danger w-30px h-30px"
            onclick="return confirm('Are you sure you want to delete this product?');">
            @include('components.icons.ki-trash')
         </button>
      </form>
      </td>
      </tr>
      @endforeach
      </tbody>
      </table>
   </div>

   <!-- End Add Modal -->
</div>
</div>

</div>
@endsection