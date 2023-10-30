@extends('layouts.admin')

@section('header', 'Author')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div id="controller">
    <a class="btn btn-primary" @click="addData()" >Create New Author</a>
    <div class="card-body">
        <table id="example1" class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone Number</th>
                    <th class="text-center">Address</th> 
                    <th class="text-center">Total Books</th>
                    <th class="text-center">Join At</th>
                    <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $key => $author)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->email }}</td>
                <td>{{ $author->phone_number }}</td>
                <td>{{ $author->address }}</td>
                <td class="text-center">{{ COUNT($author->books) }}</td>
                <td class="text-center">{{ convertDate($author->created_at) }}</td>
                <td class="text-center">
                    <a @click="editData({{ $author }})" class="btn btn-warning">Edit</a>
                </td>
                <td class="text-center" >
                    <a @click="deleteData({{ $author->id }})" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>    
        
    </table>
</div>        
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Author</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" :action="actionUrl">
                    @csrf
                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" :value="data.name" placeholder="Enter name" >
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
@endsection

@section('js')
<script type="text/javascript">
    var controller = new Vue({
        el: '#controller',
        data: {
            data: {},
            actionUrl: '{{ url('authors') }}',
            editStatus: false
        },
        mounted: function () {
            // Metode yang akan dijalankan setelah komponen Vue dimuat
        },
        methods: {
            addData() {
                this.data = {};
                this.actionUrl = '{{ url('authors') }}';
                this.editStatus = false;
                $('#modal-default').modal();
            },
            editData(data){
                this.data = data;
                this.actionUrl = '{{ url('authors') }}'+'/'+data.id;
                this.editStatus = true;
                $('#modal-default').modal();
            },
            deleteData(id) {
                this.actionUrl = '{{ url('authors') }}'+'/'+id;
                if (confirm("Are you sure?")) {
                    axios.delete(this.actionUrl, { data: { _method: 'DELETE' } })
                    .then(response => {
                            location.reload();
                        });
                }
            },
        }
    });
</script>
<!-- DataTables  & Plugins -->
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
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    //   $('#example2').DataTable({
    //     "paging": true,
    //     "lengthChange": false,
    //     "searching": false,
    //     "ordering": true,
    //     "info": true,
    //     "autoWidth": false,
    //     "responsive": true,
    //   });
    });
</script>
@endsection
