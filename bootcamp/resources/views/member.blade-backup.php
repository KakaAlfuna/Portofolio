@extends('layouts.admin')

@section('header', 'Member')

@section('content')
<div id="controller">
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
        <div class="datatable-top">
            <div class="datatable-search">
                <input class="datatable-input" placeholder="Search..." type="search" title="Search within table">
            </div>
        </div>
        <div class="datatable-container">
            <table id="datatable" class="table datatable datatable-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @foreach ($members as $key => $member)
                    <tr data-index="{{ $key }}">
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->address }}</td>
                        <td>{{ $member->nomor_tlp }}</td>
                    </tr>
                    @endforeach
                </tbody> --}}
            </table>
        </div>
        {{-- <div class="datatable-bottom">
            <div class="datatable-info">Showing 1 to {{ count($members) }} of {{ count($members) }} entries</div> <!-- Dynamically displaying the count of entries -->
            <nav class="datatable-pagination">
                <ul class="datatable-pagination-list"></ul>
            </nav>
        </div> --}}
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    var actionUrl = "{{ url('members') }}";
    var apiUrl = "{{ url('api/members') }}";
    
    var columns = [
        {data: 'DT_RowIndex',class: 'text-center', orderable: false},
        {data: 'name',class: 'text-center', orderable: false},
        {data: 'email',class: 'text-center', orderable: false},
        {data: 'nomor_tlp',class: 'text-center', orderable: false},
        {data: 'address',class: 'text-center', orderable: false},
        // {render: function(index, row, data, meta) {
        //     return `<a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">Edit</a>`;
        //     },
        //     orderable: false,
        //     class: "text-center"
        // },
        // {render: function(index, row, data, meta) {
        //     return `<a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Delete</a>`;
        //     },
        //     orderable: false,
        //     class: "text-center"
        // }
    ];

    var controller = new Vue({
        el: '#controller',
        data: {
            datas: [],
            data: {},
            actionUrl,
            apiUrl,
            editStatus:false,
        },
        mounted: function() {
            this.datatable();
        },
        methods: {
            datatable() {
                const _this = this;
                _this.table = $('#datatable').DataTable({
                    ajax: {
                        url: _this.apiUrl,
                        type: 'GET',
                    },
                    columns: columns
                }).on('xhr', function(){
                    _this.datas = _this.table.ajax.json().data;
                });
            },
            addData() {
                this.data = {};
                this.editStatus = false;
                $('#modal-default').modal();
            },
            editData(event, row) {
                this.data = this.datas[row];
                this.editStatus = true;
                $('#modal-default').modal();
            },
            deleteData(event, id) {
                if (confirm("Are you sure ?")) {
                    const _this = this;

                    // Hapus baris dari tabel
                    $(event.target).closest('tr').remove();

                    // Kirim permintaan DELETE
                    axios.post(this.actionUrl + '/' + id, { _method: 'DELETE' })
                    .then(response => {
                        alert('Data has been removed');
                    });
                }
            },
            submitForm(event, id) {
                event.preventDefault();
                const _this = this;
                const actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
                axios.post(actionUrl, new FormData($(event.target)[0]))
                    .then(response => {
                    $('#modal-default').modal('hide');
                    _this.table.ajax.reload();
                });
            },

        }
    });
</script>   
@endsection
