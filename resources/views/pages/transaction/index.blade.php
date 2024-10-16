@extends('layouts.app', ['breadcrumbs' => ['Products']])
@section('title', 'Products')

@section('main')
<div class="card mt-10">
   <div class="card-header border-0 pt-6">
      <div class="card-title">
         <div class="d-flex align-items-center position-relative my-1">
            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
               <span class="path1"></span><span class="path2"></span>
            </i>
            <input type="text" id="search" class="form-control form-control-solid w-250px ps-13"
               placeholder="Search Transaction" />
         </div>
      </div>
      <div class="card-toolbar">
      </div>
   </div>

   <div class="card-body py-4">
      <div class="mx-auto mt-4 table-responsive">
         <!-- Products Table -->
         <table class="table table-rounded table-striped border gy-7 gs-7" id="table-transactions">
            <thead>
               <tr class="fw-bold fs-6 border-bottom border-gray-200 text-center">
                  <th>No.</th>
                  <th>Transaction code</th>
                  <th>Product Name</th>
                  <th>Product Item</th>
                  <th>Status</th>
                  <th>Total Amount</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody id="table-transactions-body">
               <!-- Data will be inserted via AJAX -->
            </tbody>
         </table>
      </div>
      <ul class="pagination">
         <li class="page-item previous disabled"><a href="#" class="page-link"><i class="previous"></i></a></li>
         <li class="page-item next"><a href="#" class="page-link"><i class="next"></i></a></li>
      </ul>
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