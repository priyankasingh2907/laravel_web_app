@extends('Layouts.app')

@section('content')

<section class="hero-small" >
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="background-image: url({{url('uploads/temp/'.$service->Image)}})">
                        <div class="hero-background-overlay"></div>
                        <div class="container  h-100">
                            <div class="row align-items-center d-flex h-100">
                                <div class="col-md-12">
                                    <div class="block text-center">
                                        <span class="text-uppercase text-sm letter-spacing"></span>
                                        <h1 class="mb-3 mt-3 text-center">Services</h1>        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </section>


                        
        <section class="section-2  py-5">
            <div class="container py-2">
                <div class="row">
                    <div class="col-md-6 align-items-center d-flex">
                        <div class="about-block">
                            <h1 class="title-color">{{ $service->name}}</h1>
                            <div class="mt-2 mb-3 text-muted">{{$service->short_description}}</div>
                            <p>{{ $service->description}}.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="image-red-background">
                            <img src="{{  asset('uploads/temp/'.$service->Image)}}" alt="" class="w-100">
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

            

                   </div>
                </div>                
            </div>
        </section>

@endsection