@extends('layouts.admin')

@section('content')

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left mb-20">
            <h4 class="text-dark h4">Create Wish List</h4>
            
        </div>
        
    </div>
    <form class="form-horizontal" action="{{route('wishlist.store')}}" method="POST">
        @csrf
        <div class="form-group row ">
            <label class="col-sm-12 col-md-2 col-form-label">User name</label>
            <div class="col-sm-12 col-md-10">
              <select class="custom-select select col-12" name="user_id" required>
                <option selected disabled>Select</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}" {{$user->id==Request::old('user_id')?"selected":""}}>{{$user->first_name}} {{$user->last_name}}</option>
                @endforeach
              </select>
            </div>
        </div>
        
        <div class="form-group row ">
            <label class="col-sm-12 col-md-2 col-form-label">Products</label>
            <div class="col-sm-12 col-md-10">
              <select class="custom-select select col-12" name="product_id[]" multiple required>
                @foreach($products as $product)
                <option value="{{$product->id}}" {{$product->id==Request::old('product_id')?"selected":""}}>{{$product->name}}</option>
                @endforeach
              </select>
            </div>
        </div>

        <button class="btn btn-success" type="submit">Create</button>

    </form>
    
</div>

@stop

