@extends('layouts.admin')

@section('content')

<!-- Simple Datatable start -->
   <div class="card-box mb-30">
      <div class="pd-20">
         <h4 class="text-dark h4">Products List</h4>
         <div class="row">
            <div class="col-md-6">
               <a href="{{ route('products.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Product</a>
            </div>
         </div>
      </div>
      <div class="pb-20">
         <table class="data-table table stripe hover nowrap">
            <thead>
               <tr>
                  <th class="table-plus datatable-nosort">Id</th>
                  <th>Name</th>
                  <th>Brand</th>
                  <th>Variants</th>
                  <th>Type</th>
                  <th>SKU</th>
                  <th>Status</th>            
                  <th>Category</th>
                  <th>Images</th>
                  <th class="datatable-nosort">Action</th>
               </tr>
            </thead>
            <tbody>
               
               @foreach($products as $c)
               <tr>
                  <td class="table-plus">{{$c->id}}</td>
                  
                  <td>{{$c->name}} </td>
                  <td>{{$c->brand->title}} </td>
                  
                  <td>


                    <div class="col-md-4 col-sm-12">
                        <div class="pd-20 height-100-p">
                          <div class="badge badge-success">
                           <a href="#" class="btn-block text-white" data-toggle="modal" data-target="#success-modal{{$c->id}}" type="button">
                              <i class="dw dw-eye"></i> View
                           </a>
                         </div>
                           <div class="modal fade" id="success-modal{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h6 class="modal-title" id="myLargeModalLabel">Variants List</h6>
                                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="table-responsive">
                                          <table class="table table-striped">
                                             <thead>
                                                <tr>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Variant</th>
                                                <th scope="col">Max. Delivery Days</th>
                                                <th scope="col">MRP Price</th>
                                                <th scope="col">Selling Price</th>
                                                <th scope="col">In Stock</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                             @foreach($c->variants as $v)
                                                <tr>
                                                <th>{{$v->quantity}}</th>
                                                <th>{{$v->variant}}</th>
                                                <th>{{$v->max_delivery_days}}</th>
                                                <th>${{$v->mrp_price}}</th>
                                                <th>${{$v->selling_price}}</th>
                                                <th class="badge {{$v->in_stock=='1'? 'badge-success':'badge-danger'}}">{{$v->in_stock=='1'?'Yes':'No'}}</th>
                                                </tr>
                                                @endforeach
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>


                  </td>
                  <td>
                     <div class="form-group">
                        <select class="selectpicker form-control" id="product_type" data-id="{{$c->id}}" data-style="btn-outline-primary">
                           <option value="ordinary" {{$c->product_type=='ordinary'?'Selected': ''}}>Ordinary</option>
                           <option value="new" {{$c->product_type=='new'?'Selected': ''}}>New</option>
                           <option value="top" {{$c->product_type=='top'?'Selected': ''}}>Top</option>
                           <option value="trend" {{$c->product_type=='trend'?'Selected': ''}}>Trend</option>             
                        </select>
                     </div>
                  </td>
                  <td>{{$c->sku}}</td>
                  <td>{{$c->status=='1'?'Active':'Not Active'}}</td>
                  
                  <td>{{$c->subcategory->category->name}} | {{$c->subcategory->name}}</td>

                  <td>
                     @foreach(explode(',',$c->images) as $image)
                        @if ($loop->first)
                           <img src="{{ asset('uploads/products/'.$image) }}" class="img-fluid d-block" width="80px;">
                        @endif
                     @endforeach

                  </td>
                  
                  <td>
                     <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                           <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                           <a class="dropdown-item" href="{{ route('products.edit',$c) }}"><i class="dw dw-edit2"></i> Edit</a>
                        
                           <form action="{{ route('products.destroy',$c) }}" method="POST" onsubmit="return confirm('Are you sure , you want to delete this?')">
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

        <script type="text/javascript">

            $(document).on("change","#product_type",function(){
                const type=$(this).val();
                const product_id=$(this).data('id');
               
                $.ajax({
                    method:'POST',
                    url:`products/setProductType`,
                    data:{product_id,type,"_token":"{{csrf_token()}}"}
                }).then(response=>{
                   //
                }).fail(error=>{
                    console.log('error',error);
                });
            });

        </script>

@stop