@extends("layouts.app",["breadcrumbs" => ['Master', 'Setting']])
@section("title","Settings")

@section("main")
<div class="card mt-10">
    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>

                <input type="text" data-kt-user-table-filter="search" id="search"
                    class="form-control form-control-solid w-250px ps-13" placeholder="Search Setting" />

            </div>
        </div>

        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                <button data-bs-toggle="modal" data-bs-target="#kt_modal_1" class="btn btn-sm btn-light-primary me-2">
                    <i class="ki-duotone ki-plus fs-5"></i>
                    Add Settings
                </button>
            </div>
            <div class="modal fade" tabindex="-1" id="kt_modal_1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Add Settings</h3>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </div>
                            <!--end::Close-->
                        </div>

                        <!-- Form ADD Data -->
                        <form id="form-settings" method="POST" action="{{ route('settings.store') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="name" class="form-label required">Settings Name:</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter settings name" required>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="settings" class="form-label required">Fee Amount:</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" id="fee" name="fee" class="form-control" placeholder="Enter fee amount" required>
                                        </div>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="tax" class="form-label required">Tax</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" id="tax" name="tax" class="form-control" placeholder="Enter tax percentage" required>
                                            <span class="input-group-text">%</span>
                                        </div>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="discount" class="form-label required">Discount</label>
                                        <div class="input-group">
                                            <input type="number" step="0.01" id="discount" name="discount" class="form-control" placeholder="Enter discount percentage" required>
                                            <span class="input-group-text">%</span>
                                        </div>
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
            <table class="table table-rounded table-striped border gy-7 gs-7" id="table-settings">
                <thead>
                    <tr class="fw-bold fs-6 border-bottom border-gray-200 text-center">
                        <th>No</th>
                        <th>Name</th>
                        <th>Product Name</th>
                        <th>Stock</th>
                        <th>Fee</th>
                        <th>Tax</th>
                        <th>Discount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $index => $settings)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $settings->name }}</td>
                        <td class="text-center">{{ $settings->product ? $settings->product->name : 'No Product' }}</td>
                        <td class="text-center">{{ $settings->stock }}</td>
                        <td class="text-center">Rp {{ number_format($settings->fee, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $settings->tax }}%</td>
                        <td class="text-center">
                            {{ ($settings->discount !== null && $settings->discount > 0) ? $settings->discount : 'Tidak ada discount' }}
                        </td>
                        <td class="text-center align-middle">
                            <div class="d-flex justify-content-center">
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input toggle-status" type="checkbox" data-id="{{ $settings->id }}" {{ $settings->status == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                        </td>


                        <td class="text-center">
                            <!-- Edit Button -->
                            <a href="#" class="btn btn-icon btn-active-light-warning w-30px h-30px"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_edit_{{ $settings->id }}">
                                @include('components.icons.ki-notepad-edit')
                            </a>

                            <!-- Edit Modal -->
                            <div class="modal fade" tabindex="-1" id="kt_modal_edit_{{ $settings->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Edit Settings</h3>
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                        class="path2"></span></i>
                                            </div>
                                        </div>

                                        <!-- Form for EDIT -->
                                        <form id="form-edit-settings_{{ $settings->id }}" method="POST" action="{{ route('settings.update', $settings->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body text-start">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label required">Settings Name:</label>
                                                    <input type="text" name="name" value="{{ $settings->name }}" class="form-control" placeholder="Enter settings name" required>
                                                    <span class="invalid-feedback"></span>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="fee" class="form-label required">Fee Amount:</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp</span>
                                                        <input type="text" name="fee" id="fee" value="{{ number_format($settings->fee, 0, ',', '.') }}" class="form-control" placeholder="Enter fee amount" required>
                                                    </div>
                                                    <span class="invalid-feedback"></span>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="tax" class="form-label required">Tax</label>
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="tax" value="{{ $settings->tax }}" class="form-control" placeholder="Enter tax percentage" required>
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                    <span class="invalid-feedback"></span>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="discount" class="form-label required">Discount</label>
                                                    <div class="input-group">
                                                        <input type="number" step="0.01" name="discount" value="{{ $settings->discount }}" class="form-control" placeholder="Enter discount percentage" required>
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                    <span class="invalid-feedback"></span>
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
                            <form id="delete-form-{{ $settings->id }}" action="{{ route('settings.destroy', $settings->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>

                            <button type="button" class="btn btn-icon btn-active-light-danger w-30px h-30px" onclick="confirmDelete('{{ $settings->id }}')">
                                @include('components.icons.ki-trash')
                            </button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div id="table-settings-pagination" class="col-auto ml-auto"></div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tangkap semua checkbox dengan class .toggle-status
        const checkboxes = document.querySelectorAll('.toggle-status');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                // Ambil ID setting dari atribut data-id
                let settingId = this.getAttribute('data-id');
                // Tentukan status baru berdasarkan apakah checkbox dicentang atau tidak
                let newStatus = this.checked ? 1 : 0;

                // Kirim AJAX request untuk memperbarui status
                fetch(`/settings/update-status/${settingId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            status: newStatus
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Status updated successfully');
                        } else {
                            alert('Error updating status');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    });


    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }

    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var search = $(this).val().toLowerCase();
            $('#table-settings').each(function() {
                var rowText = $(this).text().toLowerCase();
                if (rowText.indexOf(search) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    });
</script>

<script>
    // Memastikan input hanya angka
    document.getElementById('fee').addEventListener('keypress', function(e) {
        if (e.key < '0' || e.key > '9') {
            e.preventDefault(); // Mencegah input selain angka
        }
    });

    // Memformat angka dengan tanda titik sebagai pemisah ribuan
    document.getElementById('fee').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\./g, ''); // Menghapus semua titik sebelumnya
        if (!isNaN(value) && value.length > 0) {
            let formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Format ribuan dengan titik
            e.target.value = formattedValue;
        }
    });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection