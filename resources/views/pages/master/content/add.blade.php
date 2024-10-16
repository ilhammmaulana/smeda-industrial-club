@extends("layouts.app", ["breadcrumbs" => ['lorem', 'ipsum']])
@section("title", "Dashboard")

@section('main')
<form method="POST" action="{{ route('contents.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="card mt-10">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h1>Content</h1>
            </div>
        </div>

        <div class="card-body py-4">
            <div class="mx-auto mt-4 table-responsive">
                <div class="mb-10">
                    <label for="subject" class="required form-label">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-control form-control-solid"
                        placeholder="Add Subject" />
                </div>

                <div class="mb-10">
                    <label for="image" class="form-label">Image</label><br>
                    <div class="image-input image-input-outline" data-kt-image-input="true"
                        style="background-image: url(/assets/media/svg/avatars/blank.png)">
                        <!--begin::Image preview wrapper-->
                        <div class="image-input-wrapper w-125px h-125px"
                            style="background-image: url(/assets/media/avatars/blank.png)"></div>
                        <!--end::Image preview wrapper-->

                        <!--begin::Edit button-->
                        <label
                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                            title="Change Image">
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
                            title="Cancel Image">
                            <i class="ki-outline ki-cross fs-3"></i>
                        </span>
                        <!--end::Cancel button-->

                        <!--begin::Remove button-->
                        <span
                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                            title="Remove Image">
                            <i class="ki-outline ki-cross fs-3"></i>
                        </span>
                        <!--end::Remove button-->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="card mt-10">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h1>Content Attribute</h1>
            </div>
        </div>

        <div class="card-body py-4">
            <div class="mx-auto mt-4 table-responsive">
                <div class="mb-10">
                    <label for="header" class="required form-label">Header</label>
                    <input type="text" id="header" name="header" class="form-control form-control-solid"
                        placeholder="Header" />
                </div>

                <div class="mb-10">
                    <label for="body" class="required form-label">Body</label>
                    <textarea id="request" name="body"></textarea>
                </div>

                <div class="mb-10">
                    <label for="footer" class="required form-label">Footer</label>
                    <input type="text" id="footer" name="footer" class="form-control form-control-solid"
                        placeholder="Footer" />
                </div>
            </div>
        </div>
    </div>

    <!-- Submit and Cancel Buttons -->
    <div class="text-end mt-4">
        <button type="submit" class="btn btn-primary">Submits</button>
        <button type="button" class="btn btn-secondary" href="{{ route('contents.index') }}">Cancel</button>
    </div>
</form>

<script>
    new FroalaEditor('#request', {
        events: {
            'contentChanged': function() {
                var content = this.html.get();
                document.getElementById('request').value = content;
            }
        }
    });
</script>

@endsection