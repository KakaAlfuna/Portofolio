@extends('layouts.admin')

@section('header', 'Member')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div id="controller">
    <a class="btn btn-primary" @click="addData()" >Create New Member</a>
    <div class="card-body">
        <table id="datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone Number</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>    
        </table>
    </div>        
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" :action="actionUrl" @submit="submitForm($event, data.id)">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus" >
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" :value="data.name" placeholder="Enter name" >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Gender</label>
                                <br>
                                <select name="gender" class="form-select form-select-lg" :value="data.gender">
                                <option value="P">Perempuan</option>
                                <option value="L">Laki-laki</option>
                                </select>
                                <br>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" :value="data.email" placeholder="Enter email" >
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" :value="data.phone_number" placeholder="Enter phone number" >
                                @error('phone_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" :value="data.address" placeholder="Enter address" >
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Page specific script -->
<script type="text/javascript">
    var actionUrl = "{{ url('members') }}";
    var apiUrl = "{{ url('api/members') }}";
    
    var columns = [
        {data: 'DT_RowIndex',class: 'text-center', orderable: false},
        {data: 'name',class: 'text-center', orderable: false},
        {data: 'gender',class: 'text-center', orderable: false},
        {data: 'email',class: 'text-center', orderable: false},
        {data: 'phone_number',class: 'text-center', orderable: false},
        {data: 'address',class: 'text-center', orderable: false},
        {render: function(index, row, data, meta) {
            return `<a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">Edit</a>`;
            },
            orderable: false,
            class: "text-center"
        },
        {render: function(index, row, data, meta) {
            return `<a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">Delete</a>`;
            },
            orderable: false,
            class: "text-center"
        }
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
