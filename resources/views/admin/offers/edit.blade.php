@extends('layouts.admin')

@section('content')

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left mb-20">
            <h4 class="text-dark h4">Update Offer</h4>
            
        </div>
        
    </div>
    <form class="form-horizontal"  action="{{ route('offer.update',$offer) }}" method="POST" enctype="multipart/form-data">      
       @method('PUT')
       @csrf
       <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Offer Title</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" value="{{ $offer->title }}" type="text" name="title" placeholder="Title" required>
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-12 col-md-2 col-form-label">Product</label>
            <div class="col-sm-12 col-md-10">
              <select class="custom-select col-12" name="products[]" multiple required>
                @foreach($products as $product)
                <option value="{{$product->id}}" {{in_array($product->id,$selected_products)?"selected":""}}>{{$product->name}}</option>
                @endforeach
              </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Start Date</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" value="{{$offer->start_date}}" type="date" name="start_date" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">End Date</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" value="{{$offer->end_date}}" type="date" name="end_date" required>
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-12 col-md-2 col-form-label">Discount Type</label>
            <div class="col-sm-12 col-md-10">
              <select class="custom-select col-12" name="discount_type" required>
                <option selected disabled>Select</option>           
                <option value="flat" {{$offer->discount_type=="flat"?'selected':''}}>Percentage</option>
                <option value="discount" {{$offer->discount_type=="discount"?'selected':''}}>Number</option>
              </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Discount</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" value="{{$offer->discount}}" type="number" name="discount" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Maximum Discount</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" value="{{$offer->max_discount}}" type="number" name="max_discount" required>
            </div>
        </div>

        <div class="form-group row">
         <label class="col-sm-12 col-md-2 col-form-label">Image (optional)</label>
         <div class="col-sm-12 col-md-10">
               <input type="file" name="image" class="form-control-file form-control height-auto">
         </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Status</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select2 form-control" name="status" style="width: 100%;">
                    
                    <option value="1" {{$offer->status=='1'?'Selected': ''}}>Active</option>
                    <option value="0" {{$offer->status=='0'?'Selected': ''}}>Not Active</option>
                    
                </select>
            </div>
        </div>


        <button class="btn btn-success" type="submit">Update</button>

    </form>
    
</div>

@stop
