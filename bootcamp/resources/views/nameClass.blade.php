@extends('layouts.admin')

@section('header', 'Class')

@section('content')
<div id="controller">
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClassModal">Add Class</button>
        </div>
        <div class="datatable-container">
            <table id="datatable" class="table datatable datatable-table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Class</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Member Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Modal Edit Class -->
<div class="modal fade" id="editClassModal" tabindex="-1" aria-labelledby="editClassModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClassModalLabel">Edit Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Class -->
                <form id="editClassForm" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <!-- Your input fields here -->
                    <div class="mb-3">
                        <label for="name_class" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name_class" name="name_class">
                    </div>             
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                <!-- End Form Edit Class -->
            </div>
        </div>
    </div>
</div>


<!-- Modal Add Class -->
<div class="modal fade" id="addClassModal" tabindex="-1" aria-labelledby="addClassModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClassModalLabel">Add Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Add Class -->
                <form id="addClassForm" method="POST" action="{{ url('nameClasses') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name_class" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name_class" name="name_class">
                    </div>                 
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Add Class</button>
                </form>
                <!-- End Form Add Class -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/api/nameClasses') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', class: "text-center"},
                {data: 'name_class', name: 'name', class: "text-center"},
                {data: 'description', name: 'description', class: "text-center"},
                { 
                    "data": "members",
                    "name": "members",
                    "className": "",
                    "render": function(data) {
                        return data.map(member => member.name).join(", <br>");
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<div style="display: flex; justify-content: center; align-items: center;" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary" onclick="window.location.href='/nameClasses/' + ${row.id}">Details</button>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editClassModal" data-id="${row.id}" data-name_class="${row.name_class}" data-member_id="${row.member_id}" data-description="${row.description}">Edit</button>
                                    <form action="/nameClasses/${row.id}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>`;
                    },
                    orderable: false,
                    className: "text-center"
                }
            ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                });
            }
        });

        $('#editClassModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Tombol yang memicu modal
            var id = button.data('id');
            var name = button.data('name_class');
            var description = button.data('description');

            var modal = $(this);
            modal.find('.modal-body #name_class').val(name);
            modal.find('.modal-body #description').val(description);

            // Update action form
            var form = modal.find('.modal-body #editClassForm');
            var url = "/nameClasses/" + id;
            form.attr('action', url);
        });
    });
</script>
@endsection
