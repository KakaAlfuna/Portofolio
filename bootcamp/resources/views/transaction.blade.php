@extends('layouts.admin')

@section('header','Transaction')
    
@section('content')
<div id="controller">
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTransactionModal">Add Transaction</button>
        </div>
        <div class="datatable-container">
            <table id="datatable" class="table datatable datatable-table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Member</th>
                        <th class="text-center">Class</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Methode</th>
                        <th class="text-center">Transaction Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Modal Edit Transaction -->
<div class="modal fade" id="editTransactionModal" tabindex="-1" aria-labelledby="editTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTransactionModalLabel">Edit Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Transaction -->
                <form id="editTransactionForm" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <!-- Your input fields here -->
                    <div class="mb-3">
                        <label for="member_id" class="form-label">Member</label>
                        <select name="member_id" id="member_id" class="form-select">
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="class_id" class="form-label">Class</label>
                        <select name="class_id" id="class_id" class="form-select">
                            @foreach ($nameClasses as $nameClass)
                                <option value="{{ $nameClass->id }}">{{ $nameClass->name_class }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="method" class="form-label">Methode</label>
                        <input type="text" class="form-control" id="method" name="method">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                <!-- End Form Edit Transaction -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Transaction -->
<div class="modal fade" id="addTransactionModal" tabindex="-1" aria-labelledby="addTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTransactionModalLabel">Add Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Add Transaction -->
                <form id="addTransactionForm" method="POST" action="{{ url('transactions') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="member_id" class="form-label">Member</label>
                        <select name="member_id" id="member_id" class="form-select">
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="class_id" class="form-label">Class</label>
                        <select name="class_id" id="class_id" class="form-select">
                            @foreach ($nameClasses as $nameClass)
                                <option value="{{ $nameClass->id }}">{{ $nameClass->name_class }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="method" class="form-label">Methode</label>
                        <input type="text" class="form-control" id="method" name="method">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                <!-- End Form Add Transaction -->
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
            ajax: "{{ url('/api/transactions') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', class: "text-center"},
                {data: 'member.name', name: 'member.name', class: "text-center"},
                {data: 'nameclass.name_class', name: 'nameClass.name_class', class: "text-center"},
                {data: 'amount', name: 'amount', class: "text-center"},
                {data: 'method', name: 'method', class: "text-center"},
                {data: 'transaction_date', name: 'transaction_date', class: "text-center"},
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editTransactionModal" data-id="${row.id}" data-member="${row.member.name}" data-nameclass="${row.nameclass.name_class}" data-method="${row.method}">Edit</button>
                                    &ensp;
                                    <form action="/transactions/${row.id}" method="POST">
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
        $('#editTransactionModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var member = button.data('member');
            var nameclass = button.data('nameclass');
            var method = button.data('method');

            var modal = $(this);
            modal.find('.modal-body #member\\.name option').filter(function() {
                return $(this).text() == member;
            }).prop('selected', true);

            modal.find('.modal-body #nameclass\\.name_class option').filter(function() {
                return $(this).text() == nameclass;
            }).prop('selected', true);

            modal.find('.modal-body #method').val(method);

            // Update the form action
            var form = modal.find('.modal-body #editTransactionForm');
            var url = "/transactions/" + id;
            form.attr('action', url);
        });
    });
</script>
@endsection
