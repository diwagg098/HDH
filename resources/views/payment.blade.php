@include('layout.app')
<link rel="stylesheet" href="{{ asset('css/app2.css')}}">

@include('layout.nav')


@section('name')
    

<div class="payment">
    <div class="payment1">
        <div class="payment-col">
            <h1>Payment</h1>
            <div class="toggle">
                <p>Login / Register for easier information filling</p>

                <form action="{{ url('/finishpayment')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_guest" value="{{ session('guest_id')}}">
                    <input type="hidden" name="tipe_kamar" value="{{ $content->nama_kamar}}">
                    <div class="switch-toggle">
                        <label>
                            <input type="checkbox" checked name="bookingby" value="my self">
                            <span></span>
                        </label>
                        <p>I’m booking for myself</p>
                    </div>
            </div>

            <div class="formpayment">
                <div class="collapse-content">
                    <div class="collapse" id="instagram">
                      <a class="instagram" href="#instagram"
                        >Contact detail</a>
                      <div class="content">
                        <div class="inner-content">
                            <p>Reservation information will be sent to this contact detail</p>
                            <div class="ic">
                                <input type="text" name="email"  placeholder="Email"><br>
                                @error('email')
                                    <span style="color: red; font-style:italic; text-align: ">{{ $message}} </span>
                                @enderror
                                <small></small>
                            </div>
                            <div class="ic">
                                <input type="text" name="nama" placeholder="Full Name">
                                @error('nama')
                                    <span style="color: red; font-style:italic; text-align: ">{{ $message}} </span>
                                @enderror
                            </div>
                            <div class="ic">
                                <input type="text" name="telp" placeholder="Phone Number">
                                @error('telp')
                                    <span style="color: red; font-style:italic; text-align: ">{{ $message}} </span>
                                @enderror
                            </div>
                                
                            
                        </div>
                      </div>
                    </div>
                    <div class="collapse" id="twitter">
                      <a class="twitter" href="#twitter"
                        >Guest detail</a
                      >
                      <div class="content">
                        <div class="inner-content">
                            <p>Guest Information is needed to help us follow uo the reservation</p>
                            <div class="ic">
                                <input type="text" name="emailother" placeholder="Email">
                                @error('emailother')
                                    <span style="color: red; font-style:italic; text-align: ">{{ $message}} </span>
                                @enderror
                            </div>
                            <div class="ic">
                                <input type="text" name="namaother" placeholder="Full Name">
                                @error('namaother')
                                    <span style="color: red; font-style:italic; text-align: ">{{ $message}} </span>
                                @enderror
                            </div>
                            <div class="ic">
                                <input type="text" name="telpother" placeholder="Phone Number">
                                @error('telpother')
                                    <span style="color: red; font-style:italic; text-align: ">{{ $message}} </span>
                                @enderror
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="collapse" id="dribbble">
                      <a class="dribbble" href="#dribbble"
                        >Special Request</a
                      >
                      <div class="content">
                        <div class="inner-content">
                            <p>Do you have any particular preferences to make your stay more comfortable</p>
                          <div class="ic1">
                              <textarea name="" id="" name="note" cols="30" rows="10"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="wrapper">
                        <p>Choose metode payment :</p>
                        <input type="radio" name="payment_metode" id="option-1" value="pembayaran online">
                        <input type="radio" name="payment_metode" id="option-2" value="bayar ditempat">
                        <label for="option-1" class="option option-1">
                            <div class="dot"></div>
                            <span style="font-size: 14px">Pembayaran Online</span>
                        </label>
                        <label for="option-2" class="option option-2">
                            <div class="dot"></div>
                            <span style="font-size: 14px;">Pembayaran di tempat</span>
                        </label>
                    </div>
                    {{-- <span>Jika metode pembayaran anda bayar ditempat maka anda harus membayar 50%</span> --}}
                    @error('payment_metode')
                        <span style="color: red; font-style:italic; text-align: ">{{ $message}} </span>
                    @enderror
                </div>
            </div>
        
        
    </div>

    
    <div class="payment-col1">
        <div class="payment-col2">
            <div class="paymenttype">
                <h1>Booking Detail</h1>
            </div>
            <div class="paymenttype2">
                <div class="typekamarhdh">
                    <img src="{{ 'http://localhost/dashboard-hdh/public/images/rooms/' . $content
                    ->foto}}" alt="" >
                </div>
                <div class="paymenttype3">
                    <div class="desctype">
                        <h1>HDH Hotel Padang Panjang</h1>
                        <p>Padang Panjang, Sumatra Barat</p>
                    </div>
                    <div class="desctype1">
                        <h1>{{ $content->nama_kamar}}</h1>

                    </div>
                </div>
            </div>
        </div>
        <div class="payment-col3">
            <div class="detailp">
                <p>Check-in</p>
                <input type="date" id="date1" value="{{ date('Y-m-d')}}" name="checkin">
                @error('checkin')
                <span style="color: red; font-style:italic; text-align: ">{{ $message}} </span>
            @enderror
            </div>
            <div class="detailp">
                <p>Check-out</p>
                <input type="date" id="date2" value="" name="checkout" onchange="getDays()" value="{{ $content->checkout}}">
                @error('checkout')
                <span style="color: red; font-style:italic; text-align: ">{{ $message}} </span>
            @enderror
            </div>
            <div class="detailp">
                <p>Jumlah Tamu</p>
                <input type="number" value="1" min="1" name="jumlah_tamu">
                @error('jumlah_tamu')
                <span style="color: red; font-style:italic; text-align: ">{{ $message}} </span>
            @enderror
            </div>
            <p id="total" style="display: none;">{{ $content->price }}</p>
            <p id="result"></p>
            <div class="total">
                <div class="total1"><h1>Total Price</h1></div>
                <div class="total1"><h1 id="result2">Rp. {{ number_format($content->price)}} </h1></div>
            </div>
            <div>
            <input type="text
            " id="subtotal" name="gross_amount" readonly>
            <button style=" background-color: #17b3e0;
    width: 100%;
    padding: 10px 30px;
    outline: none;
    color: white;
    border: 0;
    border-radius: 20px;
    cursor: pointer;
    margin-top: 30px;
    transition: .2s;" id="button-payment" type="submit">BAYAR</button>
    </form>
        </div>
        </div>
    </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

function getDays(){
    var $firstDate = $('#date1');
    var $secondDate= $('#date2');
    var $submit = $('#submit');
    var $result = $('#result');
    var total2= $('#total2');
    var $days;
    var $firstDateVal = new Date($firstDate.val());
    var $secondDateVal = new Date($secondDate.val());
    var $firstTime = $firstDateVal.getTime();
    var $secondTime = $secondDateVal.getTime();
    var days = 1000 * 60 *60 * 24;
    
    $days = $secondTime - $firstTime;
    $days = Math.floor($days / days);
    $firstDate = $firstDateVal;
    $secondDate = $secondDateVal;
    // $result.html( "Days between  " + $days);
    $total = $('#total').text();
    $sum = $total * $days;

    $('#result2').text('Rp. ' + $sum);
    $('#subtotal').val($sum);
    //   getNthMonth(9);
}
</script>
