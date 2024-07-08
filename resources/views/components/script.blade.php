

@props(['id'])
@php
    $ID = '#' . $id;
@endphp

<script src="{{ asset('js/DataTables/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/DataTables/dataTables.min.js') }}"></script>
<script src="{{ asset('js/DataTables/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('js/DataTables/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/DataTables/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let deleteForm;
        let confirmDeleteBtn = document.getElementById('confirmDelete');

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                deleteForm = this.closest('form');
            });
        });

        confirmDeleteBtn.addEventListener('click', function() {
            if (deleteForm) {
                deleteForm.submit();
            }
        });
    });
</script>
<script>
    var id = '{{ $ID }}'
    $(document).ready(function() {
        var $table = $(id).DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'csv',
                    className: 'btn btn-success btn-margin'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-success btn-margin'
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-danger btn-margin'
                },
                {
                    extend: 'print',
                    className: 'btn btn-primary btn-margin'
                }
            ]
        });
    });
</script>

<style>
    .btn-margin {
        margin-right: 5px;
    }
</style>
