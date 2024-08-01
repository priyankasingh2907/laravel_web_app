@extends('admin.layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Blog / Edit</h1>
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

                <form enctype="multipart/form-data" action="{{ route('blog.update',$Blog->id)}}" method="post" name="editBlogForm" id="createBlogForm">
                @csrf    
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('blog.list')}}" class="btn btn-primary">Back</a>
                    </div>
                <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $Blog->name}}">

                                <p class="  error name-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="20" class="summernote" rows="10">
                                {{ $Blog->description}}
                                </textarea>
                            </div>

                              <div class="form-group">
                              <div class="row">
                                <div class="col-md-6">
                                   <div class="text-start m-4">
                                   <img class="text-center" src="{{ asset('uploads/temp/'.$Blog->Image) }}" alt="image" width="200px" height="200px" />
                             
                                   </div>   
                                </div>

                                <div class="col-md-6">
                                <div class="text-start m-3">
                                <label for="Image">Image</label>
                                <input type="file" name="Image" id="Image" class="form-control" value="{{ $Blog->Image}}">
                                <p class="error name-error"></p>
                          
                                </div>
                            </div>
                               </div>
                              </div>
                        
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea name="short_description" id="short_description" cols="20" rows="5" class="summernote">
                                {{ $Blog->short_description}}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group m-2">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" >
                               
                            <option value="1"  {{ ($Blog->active) == 1 ? 'selected' : ''}}>Active</option>
                            <option value="0"  {{ ($Blog->active) == 0 ? 'selected' : ''}}>Block</option>
                            </select>
                        </div>
                        <div class="form-group m-2">
                           <button type="submit" class="btn btn-primary">Submit</button>
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