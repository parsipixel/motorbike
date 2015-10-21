@extends('partials.default')

@section('content')

    <form action="{{ route('motorbike.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>

            <div class="col-sm-10">
                <input type="text" class="col-sm-10 form-control" id="name" placeholder="Name" name="name">
            </div>
        </div>
        <div class="form-group">
            <label for="cc" class="col-sm-2 control-label">CC</label>

            <div class="col-sm-10">
                <input type="text" class="col-sm-10 form-control" id="cc" placeholder="CC" name="cc">
            </div>
        </div>
        <div class="form-group">
            <label for="color" class="col-sm-2 control-label">Color</label>

            <div class="col-sm-10">
                <input type="text" class="col-sm-10 form-control" id="color" placeholder="Color" name="color">
            </div>
        </div>
        <div class="form-group">
            <label for="weight" class="col-sm-2 control-label">Weight</label>

            <div class="col-sm-10">
                <input type="text" class="col-sm-10 form-control" id="weight" placeholder="Weight" name="weight">
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-sm-2 control-label">Price</label>

            <div class="col-sm-10">
                <input type="text" class="col-sm-10 form-control" id="price" placeholder="Price" name="price">
            </div>
        </div>
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Image</label>

            <div class="col-sm-10">
                <input type="file" name="image" accept="image/*">
            </div>
        </div>

        <div class="col-sm-offset-6">
            <button class="btn btn-primary col-sm-4" type="submit">
                <i class="glyphicon glyphicon-plus"></i> Add
            </button>
        </div>
    </form>

@endsection