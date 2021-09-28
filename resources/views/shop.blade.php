@include('layout.app')
@include('layout.nav')


@section('shop')

<div class="judulshop">
    <img src="{{asset('images/bg.jpg')}}" alt="">
</div>
<div class="shop">
    <div class="shop-col">
        @foreach ($content as $row)
        <div class="barang">
                <form action="{{ url('checkout/makecart')}}" method="POST">
                    @csrf
                <img src="{{ 'http://localhost/dashboard-hdh/public/images/product/' . $row->foto}}" alt="">
                <div class="shop-col1">
                    <h1>{{ $row->nama_product}}</h1>
                    <div class="rate"> 
                        {{-- <form action=""> --}}
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    {{-- </form> --}}
                        
                      </div>
                      <p>Rp. {{ number_format($row->harga,0,',','.')}}</p>
                      <input type="hidden" name="id_guest" value="{{ session('guest_id')}}">
                      <input type="hidden" name="id_product" value="{{ $row->product_id}}">
                      <button>Buy</button>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
</div>


<div class="footer">
    <div class="foot">
        <div class="foot1">
            <h1>Payment Partner</h1>
            <a href="">Bank</a>
            <a href="">Bank</a>
            <a href="">Bank</a>
        </div>
        <div class="foot2">
            <h1>Find us on</h1>
            <a href="">Traveloka</a>
            <a href="">Instagram</a>
            <a href="">Facebook</a>
        </div>
        <div class="foot2">
            <h1>Find us on</h1>
            <a href="">Traveloka</a>
            <a href="">Instagram</a>
            <a href="">Facebook</a>
        </div>
        <div class="foot2">
            <img src="{{asset('images/logo.svg')}}" alt="">
        </div>
    </div>
    <div class="cp">
        <p>Copyright © 2021 <a href=""> Causcode Studio Padang</a> & Reserved.</p>
    </div>
</div>