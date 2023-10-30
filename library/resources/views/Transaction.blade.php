@extends('layouts.admin')

@section('header', 'Transaction')

@section('content')
<div id="controller">
    <a class="btn btn-primary" @click="addData()" >Create New Publisher</a>
    <div class="card-body">
        <table id="datatable" class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Tanggal Pinjam</th>
                    <th class="text-center">Tanggal Kembali</th>
                    <th class="text-center">Nama Peminjam</th>
                    <th class="text-center">Lama Pinjam</th>
                    <th class="text-center">Total Buku</th>
                    <th class="text-center">Total Bayar</th>
                    <th class="text-center">Status</th>
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
                    <h4 class="modal-title">Transaction</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" :action="actionUrl" @submit="submitForm($event, data.transaction.id)">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus" >
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama peminjam</label>
                                <select name="member_name" class="form-control" >
                                    @foreach ($members as $member)
                                        <option :selected="transaction.member.id == {{ $member->id }}" value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                                @error('member_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Tanggal Pinjam</label>
                                <input type="date" name="date_start" class="form-control" :value="data.date_start" placeholder="Masukkan Tanggal Pinjam" >
                                @error('date_start')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Tanggal Kembali</label>
                                <input type="date" name="date_end" class="form-control" :value="data.date_end" placeholder="Masukkan Tanggal Kembali" >
                                @error('date_end')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Buku</label>
                                <select name="book.id" class="form-control">
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                                    @endforeach
                                </select>
                                @error('book_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                {{-- <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="borrowing" @if($data->status === 'borrowing') selected @endif>Borrowing</option>
                                    <option value="done" @if($data->status === 'done') selected @endif>Done</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
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
<script type="text/javascript">
    var actionUrl = "{{ url('transactions') }}";
    var apiUrl = "{{ url('api/transactions') }}";
    
    var columns = [
        {data: 'transaction.date_start',class: 'text-center', orderable: false},
        {data: 'transaction.date_end',class: 'text-center', orderable: false},
        {data: 'transaction.member.name',class: 'text-center', orderable: false},
        {
            data: null,
            class: 'text-center',
            orderable: false,
            render: function(data, type, row) {
                // Ambil tanggal dari kolom date_start dan date_end
                var dateStart = new Date(row.transaction.date_start);
                var dateEnd = new Date(row.transaction.date_end);

                // Hitung selisih dalam milidetik
                var difference = dateEnd - dateStart;

                // Ubah selisih dalam milidetik menjadi hari
                var daysDifference = difference / (1000 * 60 * 60 * 24);

                // Kembalikan hasil dalam format yang sesuai
                return daysDifference + ' days';
            }
        },
        {data: 'totalBooks', class: 'text-center', orderable: false},
        {data: 'totalPrice', class: 'text-center', orderable: false},
        {data: 'status', class: 'text-center', orderable: false},
        {render: function(transaction) {
            return `<a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">Edit</a>`;
            },
            orderable: false,
            class: "text-center"
        },
        {render: function(index, row, data, meta) {
            return `<a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.transaction.id})">Delete</a>`;
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