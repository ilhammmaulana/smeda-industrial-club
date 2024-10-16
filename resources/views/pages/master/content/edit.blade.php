@extends("layouts.app", ["breadcrumbs" => ['lorem', 'ipsum']])
@section("title", "Update Content")

@section('main')
<form method="POST" action="{{ route('contents.update', $content->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="card mt-10">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <h1>Update Content</h1>
            </div>
        </div>

        <div class="card-body py-4">
            <div class="mx-auto mt-4 table-responsive">
                <div class="mb-10">
                    <label for="subject" class="required form-label">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-control form-control-solid"
                        value="{{ old('subject', $content->subject) }}" placeholder="Add Subject" />
                </div>

                <div class="mb-10">
                    <label for="image" class="form-label">Image</label><br>
                    <div class="image-input image-input-outline" data-kt-image-input="true"
                        style="background-image: url(/assets/media/svg/avatars/blank.png)">
                        <div class="image-input-wrapper w-125px h-125px"
                            style="background-image: url({{ $content->image ? asset($content->image) : '/assets/media/avatars/blank.png' }})">
                        </div>

                        <label
                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                            title="Change Image">
                            <i class="ki-duotone ki-pencil fs-6"></i>
                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="image_remove" />
                        </label>

                        <span
                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                            title="Cancel Image">
                            <i class="ki-outline ki-cross fs-3"></i>
                        </span>

                        <span
                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                            title="Remove Image">
                            <i class="ki-outline ki-cross fs-3"></i>
                        </span>
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
                        value="{{ old('header', $contentAttributes->header) }}" placeholder="Header" />
                </div>

                <div class="mb-10">
                    <label for="body" class="required form-label">Body</label>
                    <textarea id="request" name="body">{{ old('body', $contentAttributes->body) }}</textarea>
                </div>

                <div classp="mb-10">
                    <label for="footer" class="required form-label">Footer</label>
                    <input type="text" id="footer" name="footer" class="form-control form-control-solid"
                        value="{{ old('footer', $contentAttributes->footer) }}" placeholder="Footer" />
                </div>
            </div>
        </div>
    </div>

    <!-- Submit and Cancel Buttons -->
    <div class="text-end mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('contents.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>


<script>
    new FroalaEditor("#request", {
        events: {
            'contentChanged': function() {
                // Update the textarea value on content change
                var content = this.html.get();
                document.getElementById('request').value = content;
            }
        }
    });
</script>

@endsection