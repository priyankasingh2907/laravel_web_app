@extends('admin.layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Setting / Create</h1>
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
                <form enctype="multipart/form-data" action="{{ route('setting.save')}}" method="post" name="createsettingForm" id="createsettingForm">
                @csrf    
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('setting.list')}}" class="btn btn-primary">Back</a>
                    </div>
                <div class="card-body">
                <div class="form-group">
                                <label for="website_title">Website_title</label>
                                <input type="text"  value="{{$web_setting->website_title}}" name="website_title" id="website_title" class="form-control">
                                </div>
                           
                          <div class="row">
                            <div class="col-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" value="{{$web_setting->email}}" name="email" id="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" value="{{$web_setting->phone}}" name="phone" id="phone" class="form-control">
                                </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                <label for="facebook_url">Facebook_url</label>
                                <input type="text" value="{{$web_setting->facebook_url}}" name="facebook_url" id="facebook_url" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                <label for="twitter_url">Twitter_url</label>
                                <input type="text" value="{{$web_setting->twitter_url}}" name="twitter_url" id="twitter_url" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                <label for="instagram_url">Instagram_url</label>
                                <input type="text" value="{{$web_setting->instagram_url}}" name="instagram_url" id="instagram_url" class="form-control">
                                </div>
                            </div>
                          </div>

                            <div class="row">
                                <div class="col-6">
                                <div class="form-group">
                                <label for="contact_card_one">Contact_card_one</label>
                                <textarea name="contact_card_one" id="contact_card_one" cols="70" rows="5" class="summernote">
                                {{$web_setting->contact_card_one}}
                                </textarea>
                            </div>
                                </div>
                                <div class="col-6">
                                <div class="form-group">
                                <label for="contact_card_two">Contact_card_two</label>
                                <textarea name="contact_card_two" id="contact_card_two" cols="70" rows="5" class="summernote">
                                {{$web_setting->contact_card_two}}
                                </textarea>
                            </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-6">
                               
                                <div class="form-group">
                                <label for="contact_card_three">contact_card_three</label>
                                <textarea name="contact_card_three" id="contact_card_three"cols="70" rows="5" class="summernote">
                                {{$web_setting->contact_card_three}}
                                </textarea>
                            </div>
                               

                                </div>
                                <div class="col-6">
                                    
                                </div>
                            </div>
                        </div>

                       
                        <div class="form-group">
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