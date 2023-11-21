@extends('layouts.admin')

@section('css')

@endsection

@section('content')
    <h1>BOOTCAMP</h1>

    <div id="controller">

        {{-- pilih anggota --}}
        <div class="row">
            <label for="member_id">Member</label>
            <select name="member_id" id="member_id" class="form-select" v-model="selectedMemberId">
                @foreach ($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>            
        </div>

        <!-- product -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12" v-for="classItem in classes" :key="classItem.id">
                <div class="info-box">
                    <div class="container">
                        <div class="card my-4">
                            <div class="card-body">
                                <h5 class="card-title">@{{ classItem.name_class }}</h5>
                                <p class="card-text">Rp. 100,00</p>
                                <button class="btn btn-primary" style="" @click="addToCart(classItem)">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bagian Keranjang Belanja dan Checkout -->
        <div class="row" v-if="cart.length > 0">
            <div class="col-md-6">
                @csrf
                <h2>Keranjang Belanja</h2>       
                <ul class="list-group">
                    <li class="list-group-item" v-for="(item, index) in cart" :key="index">
                        @{{ item.name_class }} - Rp. @{{ item.price }}
                        <button class="btn btn-danger btn-sm float-right" @click="removeFromCart(index)">Hapus</button>
                    </li>
                </ul>
                <p>Total Harga: Rp. @{{ totalCartPrice }}</p>
                <button class="btn btn-success" @click="checkout()">Checkout</button>
            </div>
        </div>


    </div>
@endsection

@section('js')
    <script type="text/javascript">
        var app = new Vue({
            el: '#controller',
            data: {
                apiUrl: "{{ url('api/bootcamps') }}", 
                classes: [],
                cart: [],
                selectedMemberId: null,
            },

            mounted: function () {
                this.get_classes();
            },

            methods: {
                get_classes() {
                    const _this = this;
                    $.ajax({
                        url: _this.apiUrl,
                        method: 'GET',
                        success: function (response) {
                            _this.classes = response.data;
                        },
                        error: function (error) {
                            console.error(error);
                        },
                    });
                },
                addToCart(classItem) {
                    const selectedMemberId = this.selectedMemberId;
                    if (this.selectedMemberId) {
                        this.cart.push({
                            member_id: this.selectedMemberId,
                            id: classItem.id,
                            name_class: classItem.name_class,
                            price: 100
                        });
                    } else {
                        alert('Pilih anggota sebelum menambahkan ke keranjang belanja.');
                    }
                },
                removeFromCart(index) {
                    this.cart.splice(index, 1);
                },
                checkout() {
                    if (this.cart.length > 0) {
                        axios.post('/checkout', { cart: this.cart })
                            .then(response => {
                                console.log('Checkout berhasil:', this.cart);
                                this.cart = []; // Kosongkan keranjang setelah checkout berhasil
                                // Tambahkan logika lain sesuai kebutuhan, misalnya navigasi halaman, dll.
                            })
                            .catch(error => {
                                console.error('Error saat checkout:', error);
                                // Tambahkan penanganan kesalahan jika diperlukan
                            });
                    } else {
                        alert('Keranjang belanja kosong. Tambahkan item sebelum checkout.');
                    }
                },
            },
            computed: {
                totalCartPrice() {
                    return this.cart.reduce((total, item) => total + item.price, 0);
                }
            },
        });
    </script>
@endsection
