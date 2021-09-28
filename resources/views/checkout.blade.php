    @include('layout.app')
    <link rel="stylesheet" href="{{ asset('css/table.css')}}">
    @include('layout.nav')


    @section('checkout')
<style>
    .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button:hover {
  background-color: #008CBA;
  color: white;
}
</style>

        <div class="checkout">
            <div class="checkout-col">
                <div class="checkout-item">
                    <h1>ITEM</h1>
                    <div class="shop">
                        <div class="shop-col">
                            @foreach ($product as $row)
                            <div class="barang">
                            <img src="{{ 'http://localhost/dashboard-hdh/public/images/product/' . $row->foto}}" alt="">
                            <div class="shop-col1">
                                <h1>{{ $row->nama_product}}</h1>
                                <div class="rate"> 
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" checked />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                    
                                  </div>
                                  <p>Rp. {{ number_format($row->harga,0,',','.')}}</p>
                                  <button>Payment</button>
                            </div>
                        </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
                <div class="checkout-item">
                    <h1>ROOMS</h1>
                    <table>
    <caption>Pemesanan Kamar</caption>
    <thead>
        <tr>
        <th scope="col">Tipe Kamar</th>
        <th scope="col">Jumlah Tamu</th>
        <th scope="col">Harga</th>
        <th scope="col">Checkin</th>
        <th scope="col">Checkout</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($room as $row)
        <tr>
        <td data-label="Tipe Kamar">{{ $row->tipe_kamar}}</td>
        <td data-label="Jumlah Tamu">{{ $row->jumlah_tamu}}</td>
        <td data-label="Harga">Rp. {{ number_format($row->price,0,',','.')}}</td>
        <td data-label="Checkin">{{ $row->checkin}}</td>
        <td data-label="Checkout">{{ $row->checkout}}</td>
        <td data-label=""><a href="{{ url('payment/' . $row->id_guest . '/' . $row->cartr_id)}}" class="button"> PAY </a></td>
        </tr>
    </tbody>
    @endforeach
    </table>
                </div>
            </div>
        </div>
        


