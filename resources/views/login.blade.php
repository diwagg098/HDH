@include('layout.app')

<div class="cover">
    <a href="{{ url('/')}}"><img src="{{asset('images/logo.svg')}}" alt=""></a>
</div>
<div class="reservation">
    <div class="reservation-col">
        <div class="res1">
            <img src="{{asset('images/cvr.jpg')}}" alt="">
        </div>
        <div class="res2">
            <div class="res3">
                <h1>Login To Make Reservation</h1>
                <form action="{{ url('/login')}}" method="POST">
                    @csrf
                    <input type="text" placeholder="Email or Phone" name="username">
                    <input type="password" placeholder="Password" name="password"  id="myInput">
                    <div class="cb1">    
                        <input type="checkbox" id="cb1" onclick="myFunction()">
                        <p>
                            Show Password
                        </p>
                    </div>
                    <button type="submit">Choose the reservation</button> 
                </form>
                    

                <div class="lainny">
                    <div class="add">
                        <a href="#"><b>Forgot Email</b></a>
                    </div>
                    <div class="add">
                        <a href="/create"><b>Create Account</b></a>
                    </div>
                    <div class="add2">
                        <p>By login in, you agree to the Terms of Service
                            and Privacy Policy, including Cookie Use.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>