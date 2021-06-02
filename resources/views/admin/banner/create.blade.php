@extends('layouts.admin')

@section('content')

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left mb-20">
            <h4 class="text-dark h4">Create Banner</h4>
            
        </div>
        
    </div>
    <form class="form-horizontal" action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Banner Title</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" name="title" placeholder="Title" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Banner url</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="url" name="link_url" placeholder="Url" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Description</label>
            <div class="col-sm-12 col-md-10 html-editor">
                <textarea rows="2" name="description" class="textarea_editor form-control border-radius-0" required></textarea>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Images</label>
            <div class="col-sm-12 col-md-10">
               <input type="file" name="image" class="form-control-file form-control height-auto" required>
            </div>
         </div>

        <button class="btn btn-success" type="submit">Create</button>

    </form>
    
</div>

@stop

