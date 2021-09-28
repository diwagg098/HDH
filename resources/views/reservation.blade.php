@include('layout.app')
@include('layout.nav')

@section('reservation')
    


<div class="room" >
    <div class="room-col">
        @foreach ($content as $row)
        <div class="room1">
            <h2>{{ $row->nama_kamar}}</h2>
            <p>Available</p>
            <img src="{{ 'http://localhost/dashboard-hdh/public/images/rooms/' . $row->foto}}" alt="">
            <a href="{{ url('rooms/makereserv/' . $row->id_kamar)}}">Make reservation</a>
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