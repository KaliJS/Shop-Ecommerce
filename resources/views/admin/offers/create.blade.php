@extends('layouts.admin')

@section('content')

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left mb-20">
            <h4 class="text-dark h4">Create Offer</h4>      
        </div>
        
    </div>
    <form class="form-horizontal" action="{{route('offer.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Offer Title</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="title" placeholder="Title" required>
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-12 col-md-2 col-form-label">Products</label>
            <div class="col-sm-12 col-md-10">
              <select class="custom-select col-12" name="products[]" multiple required>
                @foreach($products as $product)
                <option value="{{$product->id}}" {{$product->id==Request::old('product_id')?"selected":""}}>{{$product->name}}</option>
                @endforeach
              </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Start Date</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="date" name="start_date" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">End Date</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="date" name="end_date" required>
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-12 col-md-2 col-form-label">Discount Type</label>
            <div class="col-sm-12 col-md-10">
              <select class="custom-select col-12" name="discount_type" required>
                <option selected disabled>Select</option>           
                <option value="flat" >Percentage</option>
                <option value="discount" >Number</option>
              </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Discount</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" name="discount" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Maximum Discount</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" name="max_discount" required>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Image (optional)</label>
        <div class="col-sm-12 col-md-10">
            <input type="file" name="image" class="form-control-file form-control height-auto" required>
        </div>
        </div>

        <button class="btn btn-success" type="submit">Create</button>

    </form>
    
</div>

@stop
