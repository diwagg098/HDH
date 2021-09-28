<header>
    <div class="header">
        <div class="head">
            <img src="{{asset('images/logo.svg')}}" alt="">
        </div>
        <div class="headnav">
            
                <a href="{{ url('/')}}">Home</a>
                <a href="{{ url('/about')}}">About</a>
                <a href="{{ url('/shop')}}">Shop</a>
                <a href="#near" id="hidenav">Nearby</a>
                <a href="{{ url('/reservation')}}">Room</a>
                @if (session('is_login') == 1)
                    <a href="#" style="color: #17b3e0">{{ session('nama')}}</a>
                @else
                    <a href="{{ url('/login')}}" style="color: #17b3e0">Login</a>
                @endif
            
        </div>
    </div>
</header>



<div class="chat">
    <div class="tooltip"><a href="https://wa.me/6285735501035?text=haii%2C%20apakah%20masih%20ada%20kamar%20yang%20tersedia%20%3F"><i class="fas fa-comment-dots fa-2x"></i></a>
    <span class="tooltiptext">Click To Chat</span>
    </div>
    @if (session('is_login') == 1)
    <div class="tooltip"><a href="{{ url('checkout/' . session('guest_id') )}}"><i class="fas fa-shopping-cart fa-2x"></i></a>
        <span class="tooltiptext">Checkout</span>
    </div>
    @endif
</div>



