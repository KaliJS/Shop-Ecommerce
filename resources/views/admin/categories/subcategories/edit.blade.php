@extends('layouts.admin')

@section('content')

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left mb-20">
            <h4 class="text-dark h4">Update Sub Category</h4>
            
        </div>
        
    </div>
    <form class="form-horizontal"  action="{{ route('sub-categories.update',$sub_category) }}" method="POST" enctype="multipart/form-data">      
       @method('PUT')
       @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Sub Category Name</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{{$sub_category->name}}" name="name" placeholder="Name">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Category</label>
            <div class="col-sm-12 col-md-10">
              <select class="custom-select col-12" name="category_id" required>
                <option selected disabled>Select</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id==$sub_category->category_id?'Selected':''}}>{{$category->name}}</option>
                @endforeach
              </select>
            </div>
         </div>


        <button class="btn btn-success" type="submit">Update</button>

    </form>
    
</div>

@stop

