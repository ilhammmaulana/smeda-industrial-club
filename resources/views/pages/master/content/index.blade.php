@extends("layouts.app",["breadcrumbs" => ['Master','Content']])
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
                <input type="text" class="form-control form-control-solid w-250px ps-13" placeholder="Search Content"
                    name="search" value='' />
            </div>
        </div>

        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                <a href="{{ route('contents.create') }}" class="btn btn-sm btn-light-primary me-2">
                    <i class="ki-duotone ki-plus fs-5"></i>
                    Add Content
                </a>
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
                        <th>Subject</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contentData as $index => $content)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $content->subject }}</td>
                        <td class="text-center">
                            @if($content->image)
                            <img src="{{ asset($content->image) }}" alt="{{ $content->subject }}"
                                style="max-width: 100px; max-height: 100px;">
                            @else
                            No Image
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Edit Button -->


                            <a href="{{ route('contents.edit', $content->id) }}"
                                class="btn btn-sm btn-light-primary me-2">
                                @include('components.icons.ki-notepad-edit')
                            </a>
                            <!-- Edit Modal -->


                            <!-- Delete Button -->
                            <form action="{{ route('contents.destroy', $content->id) }}" method="POST"
                                style="display:inline;">
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
@endsection