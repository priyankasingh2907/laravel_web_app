@extends('Layouts.app')
@section('content')

<section class="hero-small">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url({{url('uploads/temp/'.$blogs->Image)}})">
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


<section class="section-3 py-5" id='logo'>
    <div class="container">
        <h2>{{ $blogs->name}}</h2>
        <div>
            <small>{{ date('d/m/y',strtotime($blogs->created_at)) }}</small>
        </div>

        <div class="mt-2">
        </div>
        <div class="mt-5">
            {!! $blogs->description !!}
        </div>
        <div class="comment-box mb-4">
            <h5>Comment Here</h5>
            <form action="{{route('save.blog')}}" method="post">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control mb-4">
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" name="blog_id" value="{{ $blogs->id}}">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="row">
                            <div class="col-md-6">
                                <textarea placeholder="Enter your comment" name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                        </div>

                    </div>
                    <button class="btn btn-primary mt-3" type="submit">
                        Submit
                    </button>
            </form>

        </div>
        <hr>
        <h5>Comments</h5>
        <div class="comments-box">
            @if(!empty($comment))
            @foreach($comment as $comments)
            <div class="card ">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="h5 m-4"> {{$comments->name}}</div>
                        <div>
                            {{date('d/m/y' , strtotime($comment->created_at))}}
                        </div>
                    </div>


                    <div class="m-4">
                        {{$comments->comment}}
                    </div>
                </div>
            </div>
            @endforeach
            @endif



        </div>
</section>
@endsection