    @extends('layouts.register')
    @section('content')

    <!-- Content -->
    <div class="container">
        <div class="left-container">
            <form class="form-register" action="/register" method="post">
                @csrf
                <h2>Create New Account</h2>
                <p> <span class="span-1">Citi</span><span class="span-2">Learn</span> - Learning Managemenet System (LMS)</p>
                <div class="form-floating">
                    <input class="form-control rounded-bottom @error('fullname') is-invalid @enderror" type="text" id="fullname" name="fullname" placeholder="Fullname" required value="{{ old('fullname')}}">
                    <label for="fullname">Full Name</label>
                    @error('fullname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input class="form-control rounded-bottom @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="Email" required value="{{ old('email')}}">
                    <label for="email">Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-floating">
                    <input class="form-control rounded-bottom @error('username') is-invalid @enderror" type="text" id="username" name="username" placeholder="Username" required value="{{ old('username')}}">
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input class="form-control rounded-bottom @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="register-btn" type="submit">Register</button>
                <div class="text-center">
                    <span class="d-inline span-acc">Have an account? <a class="login-account d-inline" href="/">Login here</a></span>
                </div>
            </form>
        </div>
        <div class="right-container">
            <img src="/img/image-register.png" alt="">
        </div>
    </div>

    @endsection
    
 