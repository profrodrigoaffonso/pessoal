@extends('layouts.login')

@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login.login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div> --}}
                        <button type="submit" class="btn btn-primary d-block w-100 mt-3">Login</button>
                    </form>
                </div>
                {{--<div class="card-footer">
                    <p class="text-center">Don't have an account? <a href="#">Register now</a></p>
                </div> --}}
            </div>
        </div>
    </div>
</div>
  @endsection
