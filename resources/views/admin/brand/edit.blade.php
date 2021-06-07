@extends('layouts.admin')

@section('content')

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left mb-20">
            <h4 class="text-dark h4">Update Brand</h4>
            
        </div>
        
    </div>
    <form class="form-horizontal"  action="{{ route('brand.update',$brand) }}" method="POST" enctype="multipart/form-data">      
       @method('PUT')
       @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Brand Title</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{{$brand->title}}" name="title" placeholder="Title">
            </div>
        </div>

        <div class="form-group row ">
            <label class="col-sm-12 col-md-2 col-form-label">Categories</label>
            <div class="col-sm-12 col-md-10">
              <select class="custom-select col-12" name="categories[]" multiple required>
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{in_array($category->id,$selected_categories)?"selected":""}}>{{$category->name}}</option>
                @endforeach
              </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Description</label>
            <div class="col-sm-12 col-md-10 html-editor">
                <textarea rows="2" name="description" class="textarea_editor form-control border-radius-0" required>{{$brand->description}}</textarea>
            </div>
         </div>
        
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Image</label>
            <div class="col-sm-12 col-md-10">
               <input type="file" name="image" value="{{$brand->image}}" class="form-control-file form-control height-auto">
            </div>
         </div>

        <button class="btn btn-success" type="submit">Update</button>

    </form>
    
</div>

@stop

