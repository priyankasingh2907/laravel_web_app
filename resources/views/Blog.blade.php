@extends('Layouts.app')
@section('content')

<section class="hero-small">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="background-image: url({{url('assets/images/friends-g6ef0f9beb_1920.jpg')}})">
                        <div class="hero-small-background-overlay"></div>
                        <div class="container  h-100">
                            <div class="row align-items-center d-flex h-100">
                                <div class="col-md-12">
                                    <div class="block text-center">
                                        <span class="text-uppercase text-sm letter-spacing"></span>
                                        <h1 class="mb-3 mt-3 text-center">Blog & News</h1>        
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>                                                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </section>
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif
      
        <section class="section-3 py-5" id='logo'>
            <div class="container">
                <div class="divider mb-3"></div>
                <h2 class="title-color mb-4 h1">Services</h2>
                <div class="cards">
                   <div class="row">                       
                      


@foreach($blogs as $blog)
                        <div class="col-md-4 mb-4">
                            <div class="card border-0">
                                <img class="text-center" src="{{ asset('uploads/temp/'.$blog->Image) }}" class="card-img-top" alt="">
                                <div class="card-body p-3">
                                    <h1 class="card-title mt-2"><a href="#">{{ $blog->name }}</a></h1>
                                    <div class="content pt-2">
                                        <p class="card-text">{{ $blog->description}}</p>
                                    </div>                                
                                    <a href="{{route('blog.detail',$blog->id)}}" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                                </div>
                            </div> 
                        </div>
@endforeach


            

                   </div>
                </div>                
            </div>
        </section>
@endsection