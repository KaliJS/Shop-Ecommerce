@extends('layouts.admin')

@section('content')

<!-- Simple Datatable start -->
   <div class="card-box mb-30">
      <div class="pd-20">
         <h4 class="text-dark h4">Offer List</h4>
         <div class="row">
            <div class="col-md-6">
               <a href="{{ route('offer.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Offer</a>
            </div>
         </div>
      </div>
      <div class="pb-20">
         <table class="data-table table stripe hover nowrap">
            <thead>
               <tr>
                  <th class="table-plus datatable-nosort">Id</th>
                  <th>Title</th>
                  <th>Product List</th>
                  <th>Start Date</th>
                  <th>End Date</th>            
                  <th>Discount Type</th>
                  <th>Discount</th>
                  <th>Status</th>
                  <th>Image</th>
                  <th class="datatable-nosort">Action</th>
               </tr>
            </thead>
            <tbody>
               
               @foreach($offers as $c)
               <tr>
                  <td class="table-plus">{{$c->id}}</td>
                  
                  <td>{{$c->title}} </td>
                  
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
                                       <h6 class="modal-title" id="myLargeModalLabel">Products List</h6>
                                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="table-responsive">
                                          <table class="table table-striped">
                                             <tbody>
                                                
                                                @foreach($c->products as $v)                          
                                                   <th>{{$v->name}}</th>                                                                                               
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
                  <td>{{$c->start_date}}</td>
                  <td>{{$c->end_date}}</td>
                  <td>{{$c->discount_type}}</td>
                  <td>{{$c->discount}}</td>
                  <td>{{$c->status=='1'?'Active':'Not Active'}}</td>
                  
                  <td>         
                     <img src="{{ asset('uploads/offers/'.$c->image) }}" class="img-fluid d-block" width="80px;">
                  </td>
                  
                  <td>
                     <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                           <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                           <a class="dropdown-item" href="{{ route('offer.edit',$c) }}"><i class="dw dw-edit2"></i> Edit</a>
                        
                           <form action="{{ route('offer.destroy',$c) }}" method="POST" onsubmit="return confirm('Are you sure , you want to delete this?')">
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