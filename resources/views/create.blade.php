@include('layout.app')



<div class="cover">
    <a href="/"><img src="{{asset('images/logo.svg')}}" alt=""></a>
</div>
<div class="reservation">
    <div class="reservation-col">
        <div class="res1">
            <img src="{{asset('images/cvr.jpg')}}" alt="">
        </div>
        <div class="res2">
            <div class="res3">
                <h1>Create Account</h1>
                <form action="{{ url('/register')}}" method="POST">
                    @csrf
                    <input type="text" placeholder="Nama" name="nama" value="{{ old('nama')}}">
                    <input type="text" placeholder="Username" name="username" value="{{ old('username')}}">
                    @error('username')
                    <small style="color: red; font-style: italic">{{ $message}}</small>
                    @enderror
                    <input type="email" placeholder="Email" name="email" value="{{ old('email')}}">
                    @error('email')
                    <small style="color: red; font-style: italic">{{ $message}}</small>
                    @enderror
                    <input type="number" placeholder="Phone Number" name="telp" value="{{ old('telp')}}">
                    @error('telp')
                    <small style="color: red; font-style: italic">{{ $message}}</small>
                    @enderror
                    <input type="password" placeholder="Password"  id="myInput" name="password" value="">
                    @error('password')
                    <small style="color: red; font-style: italic">{{ $message}}</small>
                    @enderror
                    <input type="password" placeholder="Confirm Password"  name="password_confirm">
                    @error('password_confirm')
                    <small style="color: red; font-style: italic">{{ $message}}</small>
                    @enderror
                    <button type="submit">CREATE ACCOUNT</button> 
                </form>

                <div class="lainny">
                    <div class="add2">
                        <p>By log in, you agree to the Terms of Service
                            and Privacy Policy, including Cookie Use.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>