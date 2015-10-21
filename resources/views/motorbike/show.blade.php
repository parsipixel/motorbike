@extends('partials.default')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $motorbike->name }}</h3>
        </div>
        <div class="panel-body">
            {{--<h3>{{  $motorbike->name }}</h3>--}}
            <div class="col-sm-3">
                <img src="{{ $motorbike->image ? route('image.show', $motorbike->image->filename) : asset('assets/images/motorbike.jpg') }}"
                     alt="{{ $motorbike->name }}" class="img-responsive" style="width: 100%">
            </div>

            <p class="col-sm-9">
                <strong class="col-sm-3 text-right">CC:</strong>
                <span class="col-sm-9">{{ $motorbike->cc }}</span>
                <strong class="col-sm-3 text-right">Weight:</strong>
                <span class="col-sm-9">{{ $motorbike->weight }} </span>
                <strong class="col-sm-3 text-right">Price:</strong>
                <span class="col-sm-9">{{ $motorbike->price }}</span>
            </p>

        </div>
    </div>

@endsection