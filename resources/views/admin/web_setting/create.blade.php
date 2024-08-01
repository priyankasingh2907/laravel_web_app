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
                    <div class="breadcrumb-item"><a href="#">Home</a></div>
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
                                <label for="website_title">Website Title</label>
                                <input type="text" name="website_title" id="website_title" class="form-control">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">Twitter_url</label>
                                        <input type="text" name="twitter_url" id="twitter_url" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="instagram_url">Instagram_url</label>
                                        <input type="text" name="instagram_url" id="instagram_url" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="contact_card_one">Contact_Card_One</label>
                                        <textarea name="contact_card_one" id="contact_card_one" cols="70" rows="5" class="summernote"></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="contact_card_two">Contact_Card_Two</label>
                                        <textarea name="contact_card_two" id="contact_card_two" cols="50" rows="5" class="summernote"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="contact_card_three">Contact_Card_Three</label>
                                        <textarea name="contact_card_three" id="contact_card_three" cols="70" rows="5" class="summernote"></textarea>
                                    </div>
                                </div>
                                <div class="col-6">

                                    <label for="">Featured Services</label>
                                    <div class="row">
                                        <div class="col">
                                            <select name="service" id="service" class="form-control">

                                                @if(!empty($services))
                                                @foreach($services as $service)
                                                <option value="{{$service->id}}">{{$service->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col">
                                            <button onClick="addService();" type="button" class="btn btn-primary">Select Services</button>
                                        </div>
                                    </div>
                                    <div class="ror">
                                        <div class="col-md-12" id="sortable">

                                            <!-- <div class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</div>
                                            <div class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</div>
                                            <div class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</div>
                                            <div class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</div>
                                            <div class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</div>
                                            <div class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</div>
                                            <div class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</div> -->



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                        {{ $services->links()  }}
                    </div>
            </div>
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
@section('extraJs')
<script>
    $(function() {
        $("#sortable").sortable();
    });

    function addService() {
        var serviceId = $("#service").val()
        var serviceName = $("#service option:selected").text()
        var html = `<div class="ui-state-default" id=service-${serviceId} data-id='${serviceId}'><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>${serviceName}</div>`;

        var isFound = false;

        $("#sortable .ui-state-default").each(
            function() {
                var id = $(this).attr('data-id');
                if (id == serviceId) {
                    isFound = true;
                }
            }
        );
        if (isFound == true) {
            alert("You con not select same service again.")

        }else{
            $("#sortable").append(html);
        }
       
    }
</script>
@endsection