@extends('layouts.admin')

@section('header','Mentor')
    
@section('content')
<div id="controller">
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMentorModal">Add Mentor</button>
        </div>
        <div class="datatable-container">
            <table id="datatable" class="table datatable datatable-table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Specialization</th>
                        <th class="text-center">Class</th>
                        <th class="text-center">Contact</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Modal Edit Mentor -->
<div class="modal fade" id="editMentorModal" tabindex="-1" aria-labelledby="editMentorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMentorModalLabel">Edit Mentor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Mentor -->
                <form id="editMentorForm" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <!-- Your input fields here -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="specialization" class="form-label">Specialization</label>
                        <input type="text" class="form-control" id="specialization" name="specialization">
                    </div>
                    <div class="mb-3">
                        <label for="name_class" class="form-label">Class</label>
                        <input type="text" class="form-control" id="name_class" name="name_class">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                <!-- End Form Edit Mentor -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Mentor -->
<div class="modal fade" id="addMentorModal" tabindex="-1" aria-labelledby="addMentorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMentorModalLabel">Add Mentor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Add Mentor -->
                <form id="addMentorForm" method="POST" action="{{ url('mentors') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="specialization" class="form-label">Specialization</label>
                        <input type="text" class="form-control" id="specialization" name="specialization">
                    </div>
                    <div class="mb-3">
                        <label for="name_class" class="form-label">Class</label>
                        <input type="text" class="form-control" id="name_class" name="name_class">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Mentor</button>
                </form>
                <!-- End Form Add Mentor -->
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
            ajax: "{{ url('/api/mentors') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', class: "text-center"},
                {data: 'name', name: 'name', class: "text-center"},
                {data: 'specialization', name: 'specialization', class: "text-center"},
                {data: 'nameclass.name_class', name: 'nameClass.name_class', class: "text-center"},
                {data: 'phone_number', name: 'phone_number', class: "text-center"},
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editMentorModal" data-id="${row.id}" data-name="${row.name}" data-specialization="${row.specialization}" data-phone_number="${row.phone_number}">Edit</button>
                                    &ensp;
                                    <form action="/mentors/${row.id}" method="POST">
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

        $('#editMentorModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var name = button.data('name');
            var specialization = button.data('specialization');
            var contact = button.data('phone_number');

            var modal = $(this);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #specialization').val(specialization);
            modal.find('.modal-body #phone_number').val(contact);

            // Update the form action
            var form = modal.find('.modal-body #editMentorForm');
            var url = "/mentors/" + id;
            form.attr('action', url);
        });
    });
</script>
@endsection
