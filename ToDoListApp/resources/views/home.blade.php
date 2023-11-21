@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('content')    
    <div class="container" id="controller">
        <div class="card">
            <div class="card-header">
                <h1>To-Do List</h1><br>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-default" @click="addData()">Create New</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Schedule</th>
                            <th>Deadline</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New List To Do</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" :action="actionUrl" @submit="submitForm($event, data.id)">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus" >
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" v-model="data.title" placeholder="Enter Title" >
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" v-model="data.description" placeholder="Enter Description" >
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label>Scehdule</label>
                                    <input type="dateTime" name="time_start" class="form-control" v-model="data.time_start" placeholder="Enter Scehdule" >
                                    @error('time_start')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label>Deadline</label>
                                    <input type="dateTime" name="time_end" class="form-control" v-model="data.time_end" placeholder="Enter Deadline" >
                                    @error('time_end')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-check form-switch" v-show="editStatus">
                                        <input class="form-check-input" type="checkbox" id="status" v-model="data.status">
                                        <label class="form-check-label" for="status">Done</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
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
@endsection

@section('js')
<script>
    var actionUrl = "{{ url('home') }}";
    var apiUrl = "{{ url('api/home') }}";
    
    var columns = [
        {data: 'DT_RowIndex',class: 'text-center', orderable: false},
        {data: 'title',class: 'text-center', orderable: false},
        {data: 'description',class: 'text-center', orderable: false},
        {data: 'status',class: 'text-center', orderable: false},
        {data: 'time_start',class: 'text-center', orderable: false},
        {data: 'time_end',class: 'text-center', orderable: false},
        {
            data: null,
            className: 'text-center',
            orderable: false,
            render: function(data, type, row, meta) {
                let actionButtons = `<a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-default" onclick="controller.editData(event, ${meta.row})">Edit</a>
                                    <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${row.id}, ${meta.row})">Delete</a>`;
                
                return actionButtons;
            }
        },
    ];

    var controller = new Vue({
        el: '#controller',
        data: {
            datas: [],
            data: {},
            actionUrl,
            apiUrl,
            editStatus: false,
        },
        mounted: function() {
            this.datatable();
        },
        methods: {
            datatable() {
                const _this = this;
                axios.get(this.apiUrl)
                    .then(response => {
                        _this.datas = response.data.data;
                        $('#datatable').DataTable({
                            data: _this.datas,
                            columns: columns,
                        });
                    })
                    .then(response=> {
                        _this.checkDeadlineStatus();
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    })
            },
            checkDeadlineStatus() {
                const now = new Date();
                
                this.datas.forEach(data => {
                    if (data.status === 'pending') {
                        const deadline = new Date(data.time_end);
                        if (now > deadline) {
                            alert(`The task "${data.title}" has exceeded the deadline!`);
                        }
                    }
                });
            },
            addData() {
                this.data = {};
                this.editStatus = false;
            },
            editData(event, row) {
                this.data = { ...this.datas[row] };
                this.editStatus = true;

                this.data.status === 'done' ? this.data.status = true : this.data.status = false;
            },
            deleteData(event, id, index) {
                if (confirm("Are you sure you want to delete this item?")) {
                    const _this = this;
                        axios.post(this.actionUrl + '/' + id, { _method: 'DELETE' })
                        .then(response => {
                            alert('Data has been removed');
                            location.reload();
                        })
                        .catch(error => {
                            console.error('Error deleting data:', error);
                        });
                }
            },
            submitForm(event, id) {
                event.preventDefault();
                const _this = this;
                
                const status = this.data.status ? 'done' : 'pending';

                const formData = new FormData($(event.target)[0]);
                formData.append('status', status);

                const actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
                axios.post(actionUrl, formData)
                    .then(response => {
                        $('#modal-default').modal('hide');
                        _this.updateStatusLocally(id, status);
                    })
                    .catch(error => {
                        console.error('Error submitting form:', error);
                    });
            },
            updateStatusLocally(id, status) {
                const index = this.datas.findIndex(item => item.id === id);
                if (index !== -1) {
                    this.datas[index].status = status;
                    location.reload();
                }
            },
        }
    });
</script>
@endsection
