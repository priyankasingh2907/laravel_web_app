@extends('admin.layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Faq / List</h1>
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

  @if(Session::has('errors'))
  <div class="alert alert-danger">
  {{ Session::get('errors')}}
  </div>
  @endif
  @if(Session::has('successc'))
<div class="alert alert-success">
    {{ Session::get('successc')}}
</div>
@endif

  @if(Session::has('successd'))
<div class="alert alert-success">
    {{ Session::get('successd')}}
</div>
@endif
@if(Session::has('errord'))
<div class="alert alert-danger">
    {{ Session::get('errord')}}
</div>
@endif

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <a href="{{ route('faq.create') }}" class="btn btn-primary">Create</a>
                        </div>
                        <div class="card-tools">

                        <form action="#" method="get">

                        <div class="input-group mb-0 mt-0" style="width: 250px;">
                            <input value="{{ (!empty(Request::get('keyword')) ? Request::get('keyword'):'')}}" type="text" name="keyword" class="form-control float-right" placeholder="Search" >
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                        </div>
                        </form>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table">
                            <tr>
                                <th width="100">Id</th>
                                <th width="250">Question</th>
                                <th width="240">Answer</th>
                                <th width="50">CreatedAt</th>
                                <th width="50">Status</th>
                                <th width="50">Edit</th>
                                <th width="50">Delete</th>
                            </tr>
                  
                            @if (!empty($faq) )
                            @foreach($faq as $faqs)
                            <tr>
                                 <td>{{ $faqs->id }}</td>
                                
                                <td>{{ $faqs->question }}</td>
                                <td>{{ $faqs->answer }}</td>
                                <td>{{date('d/m/y' , strtotime($faqs->created_at)) }}</td>
                                <td>

                                @if($faqs->active ==1)
                                <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-danger ">Block</span>
                                @endif
                                </td>
                                <td>
                                    <a href="{{ route('faq.edit', $faqs->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                <a href="{{route('faq.delete' , $faqs->id)  }}" onclick="return myFunction();" class="btn btn-danger" >Delete</a>
                               </td>  
                             </tr>
                             @endforeach
                            @else
                            <tr>
                                <td colspan="6">Records Not Found</td>
                            </tr>
                            @endif
                        </table>
                        {{ $faq->links()  }}
                    </div>
                </div>
            </div>
        </div>
     
    </div>
    
    </div>
    <!-- /.row -->
    <div class="row">
     
  @if(!empty($faq))

  {{ $faq->links()  }}

  @endif
     
     </div>

    <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


@endsection
@section('extraJs')
<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>
@endsection