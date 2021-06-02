@extends('layouts.admin')

@section('content')

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left mb-20">
            <h4 class="text-dark h4">Update Banner</h4>
            
        </div>
        
    </div>
    <form class="form-horizontal"  action="{{ route('banner.update',$banner) }}" method="POST" enctype="multipart/form-data">      
       @method('PUT')
       @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Banner Title</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{{$banner->title}}" name="title" placeholder="Title">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Banner url</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="url" value="{{$banner->link_url}}" name="link_url" placeholder="link_url" placeholder="Url" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Description</label>
            <div class="col-sm-12 col-md-10 html-editor">
                <textarea rows="2" name="description" class="textarea_editor form-control border-radius-0" required>{{$banner->description}}</textarea>
            </div>
         </div>
        
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Images</label>
            <div class="col-sm-12 col-md-10">
               <input type="file" name="image" value="{{$banner->image}}" class="form-control-file form-control height-auto">
            </div>
         </div>

        <button class="btn btn-success" type="submit">Update</button>

    </form>
    
</div>

@stop

