@extends('partials.default')

@section('content')
    <h1>Welcome to Motorbikes</h1>

    @if(count($motorbikes) > 0)
        <div class="well well-sm">
            <form action="{{ route('home') }}" method="GET" class="pull-right form-inline" style="margin-bottom: 0;">
                {{-- SORT BY PRICE OR DATE --}}
                <select class="form-control " name="order" id="order">
                    <option value="">Sort by</option>
                    <option {{ Input::get('order') == 'price' ? 'selected' : '' }} value="price">Price</option>
                    <option {{ Input::get('order') == 'created_at' ? 'selected' : '' }} value="created_at">Date</option>
                </select>

                {{-- FILTER BY COLOR --}}
                <select class="form-control" name="color" id="color">
                    <option value="">Filter by color</option>
                    @foreach($colors as $color)
                        <option {{ Input::get('color') == $color ? 'selected' : '' }} value="{{ $color }}">{{ $color }}</option>
                    @endforeach
                </select>

                <button class="btn btn-info btn-sm"><i class="glyphicon glyphicon-filter"></i> Filter</button>
            </form>
            <div class="clearfix"></div>
        </div>
    @endif

    <div class="row">
        {{-- List of motorbikes --}}
        @foreach($motorbikes as $motorbike)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a href="{{ route('motorbike.show', $motorbike->id) }}">
                        <img src="{{ $motorbike->image ? route('image.show', $motorbike->image->filename) : asset('assets/images/motorbike.jpg') }}"
                             alt="{{ $motorbike->name }}" class="img-responsive" style="width: 100%">
                    </a>

                    <div class="caption">
                        <h3>{{  $motorbike->name }}</h3>

                        <p>
                            <strong class="col-sm-3 text-right">CC:</strong>
                            <span class="col-sm-9">{{ $motorbike->cc }}</span>
                            <strong class="col-sm-3 text-right">Weight:</strong>
                            <span class="col-sm-9">{{ $motorbike->weight }} </span>
                            <strong class="col-sm-3 text-right">Price:</strong>
                            <span class="col-sm-9">{{ $motorbike->price }}</span>
                        </p>

                        <p>
                            <a href="{{ route('motorbike.show', $motorbike->id) }}" class="btn btn-primary pull-right" role="button">Read more ...</a>
                        </p>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        @endforeach

        @if(! count($motorbikes) > 0)
            <div class="">
                <h3 class="text-center">There's not any registered motorbike, yet!</h3>

                <div class="text-center">
                    <a class="btn btn-lg btn-primary" href="{{ route('motorbike.create') }}">
                        <i class="glyphicon glyphicon-plus-sign"></i>
                        Add A Motorbike
                    </a>
                </div>
            </div>
        @endif
    </div>

    <div class="text-center">
        {!! $motorbikes->render() !!}
    </div>
@endsection