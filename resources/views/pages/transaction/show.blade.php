@extends('layouts.app', ['breadcrumbs' => ['Products']])
@section('title', 'Products')

@section('main')
   <div class="">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Transaction Details</h3>
         </div>
         <div class="card-body">
            <div>
               <table class="table table-rounded gy-3">
                  <tbody>
                     <tr>
                        <td class="fw-bold fs-6">Transaction Code</td>
                        <td>: {{ $transaction->transaction_code }}</td>
                     </tr>
                     <tr>
                        <td class="fw-bold fs-6">Customer</td>
                        <td>: {{ $transaction->name }}</td>
                     </tr>
                     <tr>
                        <td class="fw-bold fs-6">Phone Number</td>
                        <td>: {{ $transaction->phone_number }}</td>
                     </tr>
                     <tr>
                        <td class="fw-bold fs-6">Total Amount</td>
                        <td>: IDR. {{ number_format($transaction->total_amount, 2, '.', ',') }}</td>
                     </tr>
                     <tr>
                        <td class="fw-bold fs-6">Status</td>
                        <td>:
                           @if ($transaction->status === 'paid')
                              <span class="badge badge-light-success">Paid</span>
                           @elseif($transaction->status === 'waiting for payment')
                              <span class="badge badge-light-info">Waiting for payment</span>
                           @elseif($transaction->status === 'expired')
                              <span class="badge badge-light-warning">Expired</span>
                           @elseif($transaction->status === 'cancelled')
                              <span class="badge badge-light-danger">Cancelled</span>
                           @else
                              <span class="badge badge-light-secondary">Unknown Status</span>
                           @endif
                        </td>

                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="card-header">
            <h3 class="card-title">Produk</h3>
         </div>
         <div class="card-body">
            <table class="table table-rounded table-striped border gy-3 gs-3">
               <thead>
                  <tr class="fw-bold fs-6 border-bottom border-gray-200 text-center">
                     <th>No</th>
                     <th>Product Name</th>
                     <th>Product Item</th>
                     <th>Code Item</th>
                     <th>Price</th>
                  </tr>
               </thead>
               <tbody>
                  <tr class="text-center">
                     <td>1</td>
                     <td>{{ $transaction->product->name ?? 'N/A' }}</td>
                     <td>{{ $transaction->productDetail->item ?? 'N/A' }}</td>
                     <td>{{ $transaction->productDetail->item_code ?? 'N/A' }}</td>
                     <td>IDR. {{ number_format($transaction->productDetail->price, 2, '.', ',') }}</td>
                  </tr>
               </tbody>
            </table>
         </div>

         <!-- Buttons -->
         <div class="d-flex justify-content-end my-5 gap-3">
            <a class="btn btn-secondary" href="{{ route('transaction.index') }}">Go Back</a>
         </div>
      </div>


   </div>
@endsection
