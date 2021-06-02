@extends('layouts.admin')

@section('content')

<!-- Simple Datatable start -->
   <div class="card-box mb-30">
      <div class="pd-20">
         <h4 class="text-dark h4">Brands List</h4>
         <div class="row">
            <div class="col-md-6">
               <a href="{{ route('brand.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Brand</a>
            </div>
         </div>
      </div>
      <div class="pb-20">
         <table class="data-table table stripe hover nowrap">
            <thead>
               <tr>
                  <th class="table-plus datatable-nosort">Id</th>
                  <th>Title</th>
                  <th>Is Popular</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th class="datatable-nosort">Action</th>
               </tr>
            </thead>
            <tbody>
               
               @foreach($brands as $c)
               <tr>
                  <td class="table-plus">{{$c->id}}</td>
                  
                  <td>{{$c->title}} </td>
                  <td><input type="checkbox"  class="form-control changePopularity" data-id="{{$c->id}}" {{$c->popularity?"checked":""}} style="height:30px;"></td>
                  <td>{{$c->description}} </td>
                  <td>
                     
                     <img src="{{ asset('uploads/brands/'.$c->image) }}" class="img-fluid d-block" width="120px;">

                  </td>
                  <td>
                     <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                           <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                           <a class="dropdown-item" href="{{ route('brand.edit',$c) }}"><i class="dw dw-edit2"></i> Edit</a>
                        
                           <form action="{{ route('brand.destroy',$c) }}" method="POST" onsubmit="return confirm('Are you sure , you want to delete this?')">
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

@section('js')

   <script>

       $(document).on("change",".changePopularity",function(){
         const brand_id = $(this).data("id");
         const value = $(this).val() == 0?1:0;
         const me = $(this);
         $.ajax({
               url: "{{url('/admin/brands/changeBrandPopularity')}}"+`/${brand_id}`,
               method: 'post',
               data: {'value':value,'_token':"{{csrf_token()}}"}
         }).then(response=>me.val(response.status)).fail(err=>console.log(err));
       });

   </script>

@stop