@extends('layouts.app')
@section('content')

@guest
<div class="container mt-3">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://picsum.photos/id/923/600/300" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/id/659/600/300" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/id/407/600/300" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/id/433/600/300" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="px-5 py-2 my-4 bg-light rounded-3">
    <div class="container text-center">
        <h1 class="display-5 fw-bold pb-2">Welcome to Boolfolio</h1>
        <p class="col-12 fs-5 px-5 pb-2">Explore all projects Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo iusto, tenetur unde tempore fugiat nobis aliquid quibusdam eveniet sed placeat veritatis ullam tempora! Bootstrap 5 views for laravel projects including laravel breeze/blade.</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg" type="button"><i class="fa-solid fa-user pe-2"></i>{{ __('Login') }}</a>
    </div>
</div>

@else
<div class="content">
    <div class="container">
        @include("admin.projects.index");
    </div>
</div>
@endguest

@endsection
