@extends('partials.layout')

@section('title', 'Landing')

@section('content')
    <!-- Hero Section -->
    <header class="hero bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Welcome to Our Website</h1>
            <p class="lead">Your success is our priority.</p>
            <a href="#" class="btn btn-light btn-lg">Get Started</a>
        </div>
    </header>

    <!-- Content Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Our Services</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Service One</h5>
                            <p class="card-text">Description of service one. Brief details about what we offer.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Service Two</h5>
                            <p class="card-text">Description of service two. Brief details about what we offer.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Service Three</h5>
                            <p class="card-text">Description of service three. Brief details about what we offer.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
