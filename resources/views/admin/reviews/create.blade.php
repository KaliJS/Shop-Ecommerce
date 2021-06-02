@extends('layouts.admin')

@section('content')

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left mb-20">
            <h4 class="text-dark h4">Create Review</h4>   
        </div>
        
    </div>
    <form class="form-horizontal" action="{{route('review.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group row ">
            <label class="col-sm-12 col-md-2 col-form-label">product</label>
            <div class="col-sm-12 col-md-10">
              <select class="custom-select col-12" name="product_id" required>
                <option selected disabled>Select</option>
                @foreach($products as $product)
                <option value="{{$product->id}}" {{$product->id==Request::old('product_id')?"selected":""}}>{{$product->name}}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Title</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="title" placeholder="Title" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Description</label>
            <div class="col-sm-12 col-md-10 html-editor">
                <textarea rows="2" name="description" class="textarea_editor form-control border-radius-0" required></textarea>
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-12 col-md-2 col-form-label">Ratings</label>
            <div class="col-sm-12 col-md-10">
              <select class="custom-select col-12" name="ratings" required>
                <option selected disabled>Select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Image (optional)</label>
            <div class="col-sm-12 col-md-10">
               <input type="file" name="image" class="form-control-file form-control height-auto">
            </div>
         </div>

        <button class="btn btn-success" type="submit">Create</button>

    </form>
    
</div>

@stop

