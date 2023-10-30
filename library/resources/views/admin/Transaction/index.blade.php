@extends('layouts.admin')

@section('header', 'Transaction')

@section('content')
<div id="controller">
    <a class="btn btn-primary" href="{{ url('transactions/create') }}" >Create New Transaction</a>
    <div class="card-body">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input type="text" class="form-control" autocomplete="off" placeholder="Search From The Title" v-model="search">
            <select class="form-control form-select" v-model="statusFilter" name="status">
                <option selected disabled>Filter Status</option>
                <option class="form-control" value="borrowing">Belum Dikembalikan</option>
                <option class="form-control" value="done">Sudah Dikembalikan</option>
            </select>
            <select class="form-control form-select" v-model="dateFilter" name="date">
                <option selected disabled>Filter Tanggal Kembali</option>
                <option class="form-control" value="More than Month">Sebelum Bulan Ini</option>
                <option class="form-control" value="Less than Month">Bulan ini</option>
            </select>
        </div>
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
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="transaction in filter">
                    <td class="text-center" v-if="transaction && transaction.transaction.date_start">@{{transaction.transaction.date_start}}</td>
                    <td class="text-center" v-else>-</td>
                    <td class="text-center" v-if="transaction && transaction.transaction.date_end">@{{transaction.transaction.date_end}}</td>
                    <td class="text-center" v-else>-</td>
                    <td class="text-center" v-if="transaction && transaction.transaction.member.name">@{{transaction.transaction.member.name}}</td>
                    <td class="text-center" v-else>-</td>
                    <td class="text-center" v-if="transaction && transaction.transaction.date_start && transaction.transaction.date_end">@{{ lamaPeminjaman(transaction.transaction.date_start , transaction.transaction.date_end) }}</td>
                    <td class="text-center" v-else>-</td>
                    <td class="text-center" v-if="transaction && transaction.totalBooks">@{{transaction.totalBooks}}</td>
                    <td class="text-center" v-else>-</td>
                    <td class="text-center" v-if="transaction && transaction.totalPrice">@{{transaction.totalPrice}}</td>
                    <td class="text-center" v-else>-</td>
                    <td class="text-center" v-if="transaction && transaction.status">@{{transaction.status}}</td>
                    <td class="text-center" v-else>-</td>
                    <td style="display: flex; justify-content: center; align-items: center;" v-if="transaction && transaction.transaction.id">
                        <a :href="'http://localhost/library/public/transactions/' + transaction.transaction.id"><button class="btn btn-primary" style="margin-right: 10px;">Details</button></a>     
                        <a :href="'http://localhost/library/public/transactions/' + transaction.transaction.id + '/edit'"><button class="btn btn-warning" style="margin-right: 10px;">Edit</button></a> 
                        <form :action="'http://localhost/library/public/transactions/' + transaction.transaction.id" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                        </form>
                    </td>                                 
                    <td class="text-center" v-else>-</td>
                </tr>
            </tbody>    
        </table>      
</div>
@endsection()

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

    var app = new Vue({
        el: '#controller',
        data: {
            transactions: [],
            transaction: {},
            actionUrl,
            apiUrl,
            editStatus:false,
            search: '',
            statusFilter: "Filter Status",
            dateFilter: "Filter Tanggal Kembali",
        },
        mounted: function() {
            this.get_transactions();
        },
        methods: {
            get_transactions() {
                const _this = this;
                $.ajax({
                    url: apiUrl,
                    method: 'GET',
                    success: function(data) {
                        _this.transactions = JSON.parse(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            },
            numberWithSpaces(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            },
            lamaPeminjaman(date_start,date_end)  {
                const start = new Date(date_start);
                const end = new Date(date_end);
                const diffTime = Math.abs(end - start);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                return diffDays + ' days';
            }
        },
        computed: {
            filter() {
                return this.transactions.filter(transaction => {
                    if (this.search) {
                        return (
                            transaction.transaction.member.name.toLowerCase().includes(this.search.toLowerCase()) ||
                            transaction.status.toLowerCase().includes(this.search.toLowerCase()) ||
                            transaction.transaction.date_start.toLowerCase().includes(this.search.toLowerCase())
                        );
                    } else {
                        let statusFilter = true;
                        if (this.statusFilter && this.statusFilter !== "Filter Status") {
                            statusFilter = transaction.status.toLowerCase() === this.statusFilter.toLowerCase();
                        }

                        let dateFilter = true;
                        if (this.dateFilter && this.dateFilter !== "Filter Tanggal Kembali") {
                            const today = new Date();
                            const end = new Date(transaction.transaction.date_end);
                            const diffTime = Math.abs(end - today);
                            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                            if (this.dateFilter === "More than Month") {
                                dateFilter = diffDays > 30;
                            } else if (this.dateFilter === "Less than Month") {
                                dateFilter = diffDays < 30;
                            }
                        }

                        return statusFilter && dateFilter;
                    }
                });
            }
        }
    });
</script>
    
@endsection