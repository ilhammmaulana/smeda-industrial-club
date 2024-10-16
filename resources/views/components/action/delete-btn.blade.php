<div>
    <a data-id="form{{ $id }}" type="button" id="btn-delete-{{ $id }}" class="fs-1 btn-delete">
        <i class="ki-duotone ki-trash fs-1">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
            <span class="path4"></span>
            <span class="path5"></span>
        </i>
    </a>
    <form id="form{{ $id }}" action="{{ $action }}" method="post">
        @csrf
        @method('delete')
    </form>
</div>

<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            var formId = this.getAttribute('data-id');
            var form = document.getElementById(formId);

            // SweetAlert konfirmasi
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
                    form.submit();
                }
            });
        });
    });
</script>