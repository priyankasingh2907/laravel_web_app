@extends('admin.layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Faq / Edit</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content  h-100">
    <div class=" container-fluid h-100 ">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12  ">
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success')}}
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger">
    {{ Session::get('error')}}
</div>
@endif

                <form enctype="multipart/form-data" action="{{ route('faq.update',$faq->id)}}" method="post" name="editfaqForm" id="createfaqForm">
                @csrf    
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('faq.list')}}" class="btn btn-primary">Back</a>
                    </div>
                <div class="card-body">
                            <div class="form-group">
                                <label for="question">Question</label>
                                <input type="text" name="question" id="question" class="form-control" value="{{ $faq->question}}">

                                <p class="  error name-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <textarea name="answer" id="answer" cols="20"rows="10" class="summernote" >
                                {{ $faq->answer}}
                                </textarea>
                            </div>

                              

                                
                      <div class="form-group m-2">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" >
                               
                            <option value="1"  {{ ($faq->active) == 1 ? 'selected' : ''}}>Active</option>
                            <option value="0"  {{ ($faq->active) == 0 ? 'selected' : ''}}>Block</option>
                            </select>
                        </div>
                        <div class="form-group m-2">
                           <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </div></div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- /.row -->
    <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
@if(Session::has('success'))
                <div class="alert alert-success">
                    {{\Session::get('success');}}
                </div>
                @endif