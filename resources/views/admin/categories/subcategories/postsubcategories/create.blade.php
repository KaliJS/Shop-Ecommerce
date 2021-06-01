@extends('layouts.admin')

@section('content')

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left mb-20">
            <h4 class="text-dark h4">Create Post Sub Category</h4>
            
        </div>
        
    </div>
    <form class="form-horizontal" action="{{route('post-sub-categories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Post Sub Category Name</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="name" placeholder="Name">
            </div>
        </div>
 

        <div class="form-group row ">
            <label class="col-sm-12 col-md-2 col-form-label">Sub Category</label>
            <div class="col-sm-12 col-md-10">
              <select class="custom-select col-12" name="sub_category_id" required>
                <option selected disabled>Select</option>
                @foreach($sub_categories as $category)
                <option value="{{$category->id}}" {{$category->id==Request::old('category_id')?"selected":""}}>{{$category->name}}</option>
                @endforeach
              </select>
            </div>
         </div>

         
        <button class="btn btn-success" type="submit">Create</button>

    </form>
    
</div>

@stop

