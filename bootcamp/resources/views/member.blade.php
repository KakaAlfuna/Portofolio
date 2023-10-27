@extends('layouts.admin')

@section('header', 'Member')

@section('content')
<div id="controller">
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMemberModal">Add Member</button>
        </div>
        <div class="datatable-container">
            <table id="datatable" class="table datatable datatable-table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Contact</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Modal Edit Member -->
<div class="modal fade" id="editMemberModal" tabindex="-1" aria-labelledby="editMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMemberModalLabel">Edit Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Member -->
                <form id="editMemberForm" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <!-- Your input fields here -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="L">Male</option>
                            <option value="P">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="phone_number">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                <!-- End Form Edit Member -->
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Member -->
<div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMemberModalLabel">Add Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Add Member -->
                <form id="addMemberForm" method="POST" action="{{ url('members') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="L">Male</option>
                            <option value="P">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Member</button>
                </form>
                <!-- End Form Add Member -->
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
            ajax: "{{ url('/api/members') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', class: "text-center"},
                {data: 'name', name: 'name', class: "text-center"},
                {data: 'gender', name: 'gender', class: "text-center"},
                {data: 'email', name: 'email', class: "text-center"},
                {data: 'address', name: 'address', class: "text-center"},
                {data: 'phone_number', name: 'phone_number', class: "text-center"},
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editMemberModal" data-id="${row.id}" data-name="${row.name}" data-email="${row.email}" data-address="${row.address}" data-contact="${row.phone_number}" data-gender="${row.gender}">Edit</button>
                                    &ensp;
                                    <form action="/members/${row.id}" method="POST">
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

        $('#editMemberModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var name = button.data('name');
            var gender = button.data('gender');
            var email = button.data('email');
            var address = button.data('address');
            var contact = button.data('contact');

            var modal = $(this);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #gender').val(gender);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #address').val(address);
            modal.find('.modal-body #contact').val(contact);

            // Update the form action
            var form = modal.find('.modal-body #editMemberForm');
            var url = "/members/" + id;
            form.attr('action', url);
        });
    });
</script>

@endsection
