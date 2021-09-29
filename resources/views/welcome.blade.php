@include('layout.app')
@include('layout.nav')

@section('home')
<style>
    ul {
    list-style-image: url('sqpurple.gif') !important;
}
</style>


<div class="bg1">
    <img src="{{asset('images/bg.jpg')}}" alt="">
</div>



<div class="home">
    <div class="home-col">
        <img src="{{asset('images/logop.svg')}}" alt="">
        <p>(Put some foreword, introduction or something else such as annoucement, terms 
        and policy, etc.)</p>
    </div>
</div>


{{-- room   --}}
<div class="gallery">
    <h1>Gallery</h1>
</div>
<div class="wrapper">
    <div class="carousel">
        @foreach ($gallery as $row)
        <div><img src="{{ 'http://localhost/dashboard-hdh/public/images/gallery/' . $row->upload_path }}"></div>
        @endforeach
    </div>
  </div>

{{-- book --}}


<div id="mySidenav" class="sidenav">
    <div class="col-a">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <h1 id="type"></h1> <br>
        <p>n/a Room(s) available</p>

        <br>
        @foreach ($rooms as $row)
        <div class="{{ $row->nama_kamar}} deskripsi" style="display: none;">
            <div class="fitur">
                @foreach (explode(",",$row->fitur) as $fiture)
                <p>&#x2713;{{ $fiture}}</p>
                @endforeach
            </div>
        </div>
        @endforeach
        <form action="{{ url('/checkout/makereserv')}}" method="POST">
            @csrf
        <div class="cal">
            <p>Check-in</p>
            <input type="date" value="{{date('Y-m-d')}}" name="checkin">


            <p>Check-out</p>
            <input type="date" value="{{date('Y-m-d')}}" name="checkout">
        </div>

        <div class="guest">
            <div class="guest1">
                <p>Guests</p> <br>
                <input type="number" min="1" value="1" name="jumlah_tamu">
            </div>
            <div class="guest2">
                <p>Rooms</p> <br>
                
                <select name="type_kamar" id="selectkamar" onchange="gettype()" required>
                    <option value="">-- Pilih tipe kamar --</option>
                    @foreach ($rooms as $row)
                    <option value="{{ $row->nama_kamar}}">{{ $row->nama_kamar}}</option>
                    @endforeach
                </select>
            </div>

            
        </div>
        <input type="hidden" name="id_guest" value="{{ session('guest_id')}}">
        <button type="submit">Book now!</button>
        </form>
    </div>
</div>


{{-- kamar --}}
<div class="img-slider">
    @foreach ($rooms as $row)
    <div class="slide active">
        <img src="{{ 'http://localhost/dashboard-hdh/public/images/rooms/' . $row->foto}}" alt="">
        <div class="info">
            <h1>{{ $row->nama_kamar}}</h1>
            <div style="">
                @foreach (explode(",",$row->fitur) as $fiture)
                <p>&#x2713;{{ $fiture}}</p>
                @endforeach
            </div>
            <button onclick="openNav()"> Book</button>
        </div>
    </div>
    @endforeach
    <div class="navigation">
        <div class="btnx active"></div>
        <div class="btnx"></div>
        <div class="btnx"></div>
    </div>
</div>


{{-- end kamar --}}

  <div class="near" id="near"></div>


<div class="location">
    <div class="nearby">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6898351912214!2d100.39557361457193!3d-0.45982089966452017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd525cc38a32833%3A0xd6367cc5fa11f8f2!2sHDH%20Hotel!5e0!3m2!1sen!2sid!4v1630911508544!5m2!1sen!2sid" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="loc">
            <h1>NEARBY <br> PLACE</h1>

            <div class="item">
                <h4>Bukittinggi</h4>
                <p>Lorem, ipsum dolor.</p>
            </div>
            <div class="item">
                <h4>Bukittinggi</h4>
                <p>Lorem, ipsum dolor.</p>
            </div>
            <div class="item">
                <h4>Bukittinggi</h4>
                <p>Lorem, ipsum dolor.</p>
            </div>
            <div class="item">
                <h4>Bukittinggi</h4>
                <p>Lorem, ipsum dolor.</p>
            </div>
        </div>
    </div>

</div>


<div class="shoptittle">
    <h1>SHOP</h1>
</div>
<div class="shop">
    <div class="shop-col">
        @foreach ($products as $product)
        <div class="barang">
                <form action="{{ url('checkout/makecart')}}" method="POST">
                    @csrf
                <img src="{{ 'http://localhost/dashboard-hdh/public/images/product/' . $product->foto}}" alt="" width="100">
                <div class="shop-col1">
                    <h1>{{ $product->nama_product}}</h1>
                    <div class="rate">
                        <p>Rating : 5 / 5</p>
                    
                </div>
                <p>Rp. {{ number_format($product->harga,0,',','.')}}</p>
                <input type="hidden" name="id_guest" value="{{ session('guest_id')}}">
                <input type="hidden" name="id_product" value="{{ $product->product_id}}">
                <button type="submit">Buy</button>
            </div>
        </form>
        </div>
        @endforeach
        
    </div>
    
</div>

<div class="btnshop">   
    <a href="/shop"> See more &#8594;</a>
</div>





<div class="resto">
    <div class="resto-col">
        <div class="resto1">
            <h1>HDH Restaurant</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita nihil itaque impedit deserunt dolore obcaecati repudiandae quae, rem vitae illum soluta cumque odit id! Minus ipsa officiis doloribus delectus distinctio!</p>
        </div>
        <div class="resto2">
            <img src="{{asset('images/bg.jpg')}}" alt="">
        </div>
    </div>
</div>


{{-- footer --}}

    


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

<script type="text/javascript">

    function gettype() {
        var selectkamar = $('#selectkamar').val();
            $('#type').text(selectkamar);
            var cek = $('div').hasClass(selectkamar);
            $('.deskripsi').css("display","none");
            if(cek == true) {
                $('.' + selectkamar).css("display","block");
            }
    }
</script>