@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="social-bar mx-auto">
                    <div class="social-links">
                        <i class="fab fa-facebook-square fa-3x"></i>
                        <i class="fab fa-whatsapp-square fa-3x"></i>
                        <i class="fab fa-instagram fa-3x"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <h1 class="text-center">Profile page</h1>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <img src="/storage/user.png"  class="rounded-circle mx-auto" style="height: 200px; width: 200px" alt="">
                    <hr>
                    <h2 class="text-center">{{ucwords($user->name)}} {{ucwords($user->surname)}}</h2>
                    <hr class="bg-success">
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
