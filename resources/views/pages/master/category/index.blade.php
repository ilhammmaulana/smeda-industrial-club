@extends("layouts.app",["breadcrumbs" => ['Master','Category']])
@section("title","Dashboard")

@section("actions")
<!-- <a href="#" class="btn btn-sm fw-bold btn-secondary" data-bs-toggle="modal"
       data-bs-target="#kt_modal_create_app">Rollover</a>
    <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
       data-bs-target="#kt_modal_new_target">Add Target</a> -->
@endsection

@section("main")
<div class="card mt-10">
    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <input type="text" class="form-control form-control-solid w-250px ps-13" placeholder="Search Category"
                    name="search" value='' />
            </div>
        </div>

        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                <button data-bs-toggle="modal" data-bs-target="#kt_modal_1" class="btn btn-sm btn-light-primary me-2">
                    <i class="ki-duotone ki-plus fs-5"></i>
                    Add Category
                </button>
            </div>
            <div class="modal fade" tabindex="-1" id="kt_modal_1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Add Category</h3>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </div>
                            <!--end::Close-->
                        </div>

                        <!-- Form ADD Data -->
                        <form id="form-reconciliation" method="POST" action="">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3 detail-row">
                                    <div class="col">
                                        <label for="name" class="form-label required">Category Name:</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter type"
                                            required>
                                        <span class="invalid-feedback"></span>
                                    </div>
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
            <table class="table table-rounded table-striped border gy-7 gs-7" id="table-legalities">
                <thead>
                    <tr class="fw-bold fs-6 border-bottom border-gray-200 text-center">
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoryData as $index => $category)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $category->name }}</td>
                        <td class="text-center">
                            <!-- Edit Button -->
                            <a href="#" class="btn btn-icon btn-active-light-warning w-30px h-30px "
                                data-bs-toggle="modal" data-bs-target="#kt_modal_edit_{{ $category->id }}">
                                @include('components.icons.ki-notepad-edit')
                            </a>



                            <!-- Edit Modal -->
                            <div class="modal fade" tabindex="-1" id="kt_modal_edit_{{ $category->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Edit Category</h3>
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                        class="path2"></span></i>
                                            </div>
                                        </div>

                                        <!-- Form for EDIT -->
                                        <form id="form-edit-payment_{{ $category->id }}" method="POST"
                                            action="{{ route('category.update', $category->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body text-start">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label required text-start">Category Name:</label>
                                                    <input type="text" name="name" value="{{ $category->name }}"
                                                        class="form-control" placeholder="Enter category name" required>
                                                    <span class="invalid-feedback"></span>
                                                </div>


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
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-active-light-danger w-30px h-30px"
                                    onclick="return confirm('Are you sure you want to delete this category?');">
                                    @include('components.icons.ki-trash')
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>


        </div>
        <div class="row">
            <div id="table-reconciliation-pagination" class="col-auto ml-auto"></div>
        </div>
    </div>
</div>

<script>
   document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('search');
      const baseUrl = "{{route('api_transaction.index')}}";
      let currentPage = 1;
      const itemsPerPage = 10;

      function fetchTransactions(page = 1, search = '') {
         currentPage = page;
         const url = `${baseUrl}?page=${page}&search=${search}`;
         fetch(url)
            .then(response => response.json())
            .then(data => {
               if (data.status === 'success') {
                  displayTransactions(data.data.data, page); // Access the correct data array
                  setupPagination(data.data); // Call pagination setup here
               } else {
                  console.error('Error:', data.message);
               }
            })
            .catch(error => console.error('Error fetching transactions:', error));
      }

      function displayTransactions(transactions, page) {
         const tbody = document.getElementById('table-transactions-body');
         tbody.innerHTML = '';

         transactions.forEach((transaction, index) => {
            const rowNumber = (page - 1) * itemsPerPage + index + 1; // Calculate row number

            // Determine the badge based on transaction status
            let statusBadge = '';
            if (transaction.status === 'paid') {
               statusBadge = '<span class="badge badge-light-success">Paid</span>';
            } else if (transaction.status === 'waiting for payment') {
               statusBadge = '<span class="badge badge-light-info">Waiting for payment</span>';
            } else if (transaction.status === 'expired') {
               statusBadge = '<span class="badge badge-light-warning">Expired</span>';
            } else if (transaction.status === 'cancelled') {
               statusBadge = '<span class="badge badge-light-danger">Cancelled</span>';
            } else {
               statusBadge = '<span class="badge badge-light-secondary">Unknown Status</span>';
            }

            const row = `
        <tr class="text-center">
            <td>${rowNumber}</td>
            <td>${transaction.transaction_code}</td>
            <td>${transaction.product ? transaction.product.brand : ''}</td>
            <td>${transaction.product_detail ? transaction.product_detail.name : ''}</td>
            <td>${statusBadge}</td>
            <td>IDR. ${Number(transaction.total_amount).toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
            <td>
                <div class="d-flex justify-content-center">
                    <a href="/transaction/${transaction.id}" class="btn btn-icon btn-active-light-primary w-30px h-30px">
                        <i class="ki-duotone ki-eye fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                    </a>
                </div>
            </td>
        </tr>`;
            tbody.innerHTML += row;
         });
      }


      function setupPagination(data) {
         const pagination = document.querySelector('.pagination');
         pagination.innerHTML = '';

         const totalPages = data.last_page;
         const currentPage = data.current_page;

         // Show "Previous" button if current page is greater than 1
         if (currentPage > 1) {
            pagination.innerHTML += `
               <li class="page-item previous">
                  <a href="#" class="page-link" data-page="${currentPage - 1}">Previous</a>
               </li>`;
         }

         // Loop through pages and create pagination links
         for (let i = 1; i <= totalPages; i++) {
            pagination.innerHTML += `
               <li class="page-item ${i === currentPage ? 'active' : ''}">
                  <a href="#" class="page-link" data-page="${i}">${i}</a>
               </li>`;
         }

         // Show "Next" button if current page is less than the total pages
         if (currentPage < totalPages) {
            pagination.innerHTML += `
               <li class="page-item next">
                  <a href="#" class="page-link" data-page="${currentPage + 1}">Next</a>
               </li>`;
         }

         // Add event listeners to each pagination link
         pagination.querySelectorAll('.page-link').forEach(link => {
            link.addEventListener('click', function(e) {
               e.preventDefault();
               const page = parseInt(this.getAttribute('data-page'));
               fetchTransactions(page, searchInput.value);
            });
         });
      }

      // Fetch initial transactions
      fetchTransactions();

      // Add search functionality
      searchInput.addEventListener('keyup', () => {
         fetchTransactions(1, searchInput.value);
      });
   });
</script>
@endsection