@extends('admin.layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Page / Create</h1>
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
    <div class=" container-fluid h-100">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12  ">
                <form enctype="multipart/form-data" action="{{ route('page.save')}}" method="post" name="createpageForm" id="createpageForm">
                @csrf    
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('page.list')}}" class="btn btn-primary">Back</a>
                    </div>
                <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">

                                <p class="  error name-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" cols="30" rows="10" class="summernote" ></textarea>
                            </div>

                            <div class="form-group">
                                <label for="Image">Image</label>
                                <input type="file" name="Image" id="Image" class="form-control">
                                <p class="error name-error"></p>

                            </div>
                          

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Block</option>
                            </select>
                        </div>
                        <div class="form-group">
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