@extends('layouts.admin')

@section('header', 'Book')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-md-5 offset-md-3">
            <div class="input-group md-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" class="form-control" autocomplete="off" placeholder="Search From The Title" v-model="search">
            </div>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary" @click="addData()">Create New Book</button>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12" v-for="book in filter" v-on:click="editData(book)">
            <div class="info-box">
                <div class="info-box-content">
                    <span class="info-box-text h3" v-if="book && book.title && book.qty">@{{ book.title }} (@{{ book.qty }})</span></span>
                    <span class="info-box-number" v-if="book && book.price">Rp. @{{ numberWithSpaces(book.price) }},-</span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Book</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" :action="actionUrl">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus" >
                        <div class="card-body">
                            <div class="form-group">
                                <label>ISBN</label>
                                <input type="number" name="isbn" class="form-control" placeholder="Enter ISBN" :value="book.isbn" >
                                @error('isbn')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter title" :value="book.title" >
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Year</label>
                                <input type="number" name="year" class="form-control"  placeholder="Enter year" :value="book.year" >
                                @error('year')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Publisher</label>
                                <select name="publisher_id" class="form-control">
                                    @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                    @endforeach
                                </select>
                                @error('publisher')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Author</label>
                                <select name="author_id" class="form-control">
                                    @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                @error('author')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Catalog</label>
                                <select name="catalog_id" class="form-control">
                                    @foreach ($catalogs as $catalog)
                                    <option value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                                    @endforeach
                                </select>
                                @error('catalog')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Quantity</label>
                                <input type="number" name="qty" class="form-control" placeholder="Enter quantity" :value="book.qty" >
                                @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label>Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Enter price" :value="book.price" >
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" v-on:click="deleteData(book.id)" v-if="editStatus">Delete</button>
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
    var actionUrl = "{{ url('books') }}";
    var apiUrl = "{{ url('api/books') }}";

    var app = new Vue({
        el: '#controller',
        data: {
            books: [],
            book: {},
            actionUrl,
            apiUrl,
            editStatus:false,
            search: '',
        },
        mounted: function() {
            this.get_books();
        },
        methods: {
            get_books() {
                const _this = this;
                $.ajax({
                    url: apiUrl,
                    method: 'GET',
                    success: function(data) {
                        _this.books = JSON.parse(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            },
            addData() {
                this.book = {};
                this.editStatus = false;
                this.actionUrl = '{{ url('books') }}';
                $('#modal-default').modal();
            },
            editData(book) {
                this.book = book;
                this.editStatus = true;
                this.actionUrl = '{{ url('books') }}' + '/' + book.id;
                $('#modal-default').modal();
            },
            deleteData(id) {
                this.actionUrl = '{{ url('books') }}'+'/'+id;
                if (confirm("Are you sure?")) {
                    axios.delete(this.actionUrl, { data: { _method: 'DELETE' } })
                    .then(response => {
                            location.reload();
                        });
                }
            },
            numberWithSpaces(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            },
        },
        computed: {
            filter() {
                return this.books.filter(book => {
                    if (this.search) {
                        return book.title.toLowerCase().includes(this.search.toLowerCase());
                    } else {
                        return true;
                    }
                });
            }
        }
    });
</script>

@endsection
