@extends('layouts.admin')

@section('content')

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left mb-20">
            <h4 class="text-dark h4">Update Wish List</h4>
            
        </div>
        
    </div>
    <form class="form-horizontal"  action="{{ route('wishlist.update',$wishlist) }}" method="POST">      
       @method('PUT')
       @csrf
       <div class="form-group row ">
            <label class="col-sm-12 col-md-2 col-form-label">user</label>
            <div class="col-sm-12 col-md-10">
            <select class="custom-select col-12" id="user_id" name="user_id" required>
                <option selected disabled>Select</option>
                @foreach($users as $user)
                <option value="{{$user->id}}" {{$user->id==$wishlist->user_id?'Selected':''}}>{{$user->first_name}} {{$user->first_name}}</option>
                @endforeach
            </select>
            </div>
        </div>
        
        <div class="form-group row ">
            <label class="col-sm-12 col-md-2 col-form-label">Product</label>
            <div class="col-sm-12 col-md-10">
              <select class="custom-select col-12" name="product_id[]" multiple required>
                @foreach($products as $product)
                <option value="{{$product->id}}" {{in_array($product->id,$selected_products)?"selected":""}}>{{$product->name}}</option>
                @endforeach
              </select>
            </div>
        </div>

        <button class="btn btn-success" type="submit">Update</button>

    </form>
    
</div>

@stop

