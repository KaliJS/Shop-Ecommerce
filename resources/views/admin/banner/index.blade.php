@extends('layouts.admin')

@section('content')

<!-- Simple Datatable start -->
   <div class="card-box mb-30">
      <div class="pd-20">
         <h4 class="text-dark h4">Banners List</h4>
         <div class="row">
            <div class="col-md-6">
               <a href="{{ route('banner.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Banner</a>
            </div>
         </div>
      </div>
      <div class="pb-20">
         <table class="data-table table stripe hover nowrap">
            <thead>
               <tr>
                  <th class="table-plus datatable-nosort">Id</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Url</th>
                  <th>Image</th>
                  <th class="datatable-nosort">Action</th>
               </tr>
            </thead>
            <tbody>
               
               @foreach($banners as $c)
               <tr>
                  <td class="table-plus">{{$c->id}}</td>
                  
                  <td>{{$c->title}} </td>
                  <td>{{$c->description}}</td>
                  <td>{{$c->link_url}} </td>
                  <td>
                     
                     <img src="{{ asset('uploads/banners/'.$c->image) }}" class="img-fluid d-block" width="120px;">

                  </td>
                  <td>
                     <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                           <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                           <a class="dropdown-item" href="{{ route('banner.edit',$c) }}"><i class="dw dw-edit2"></i> Edit</a>
                        
                           <form action="{{ route('banner.destroy',$c) }}" method="POST" onsubmit="return confirm('Are you sure , you want to delete this?')">
                             @method('DELETE')
                             @csrf
                             <button type="submit" class="dropdown-item" ><i class="dw dw-delete-3"></i> Delete</button>
                           </form>
                        </div>
                     </div>
                  </td>
               </tr>
               @endforeach
               
            </tbody>
         </table>
      </div>
   </div>


   

@stop