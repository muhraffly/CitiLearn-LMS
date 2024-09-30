@extends('layouts.login')
@section('content')

<!-- Content -->
<section class="login d-flex">
    <input type="hidden" id="success-message" value="{{ session('successRegister') }}">
    <input type="hidden" id="error-message" value="{{ session('loginFailed') }}">
    <div class="login-left w-50 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-6">
                <div class="header">
                    <h1>Citi<span>Learn</span></h1>
                    <P>Hello, welcome to CitiLearn - Learning Managemenet System (LMS)</P>
                    <P>Login with your account</P>
                </div>
                <div class="login-form">
                    <form class="login-form" action="/" method="post">
                        @csrf
                        <div class="form-floating">
                            <input class="form-control rounded-bottom" type="text" id="username" name="username" placeholder="Username" required autofocus value="{{ old('username')}}">
                            <label for="username">Username</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control rounded-bottom" type="password" id="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <button class="login-btn" type="submit">Login</button>
                    </form>
                    <div class="text-center">
                        <span class="d-inline span-acc">Don't have an account? <a class="create-account d-inline" href="/register">Create Account</a></span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="login-right w-50 h-100">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="/img/cover-login-4.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Explore new knowledge</h5>
                </div>
                </div>
                <div class="carousel-item">
                <img src="/img/cover-login-3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Discover your potential</h5>
                </div>
                </div>
                <div class="carousel-item">
                <img src="/img/cover-login-1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Elevate your career</h5>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>    
    </div>
</section>


<!-- Modal untuk Login Failed -->
<div class="modal fade" id="errorLoginModal" tabindex="-1" aria-labelledby="errorLoginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorLoginModal">Login Failed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Make sure to input your correct account!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Register Success -->
<div class="modal fade" id="successRegisterModal" tabindex="-1" aria-labelledby="successRegisterModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successRegisterModal">Registration Success!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Now you can login with your account
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Script Js Modal -->
<script src="{{ asset('/js/errorLoginModal.js') }}"></script>
<script src="{{ asset('/js/successRegisterModal.js') }}"></script>

@endsection