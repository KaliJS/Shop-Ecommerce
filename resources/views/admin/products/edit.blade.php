@extends('layouts.admin')


@section('css')

<style>
    .variant_remove{
        margin-top: 33px;
    }
    .product_variant{
       margin-bottom: 30px;
       padding-bottom: 20px;
       border-bottom: 2px solid rebeccapurple;
    }
</style>

@stop


@section('content')

<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left mb-20">
            <h4 class="text-dark h4">Update Product</h4>
            
        </div>
        
    </div>
    <form class="form-horizontal"  action="{{ route('products.update',$product) }}" method="POST" enctype="multipart/form-data">      
       @method('PUT')
       @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Product Name</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{{$product->name}}" name="name" placeholder="Name" required>
            </div>
        </div>

        <input type="hidden" id="get_sub_category_id" value="{{$product->subcategory->id}}">
        
        <div class="form-group row ">
            <label class="col-sm-12 col-md-2 col-form-label">Category</label>
            <div class="col-sm-12 col-md-10">
              <select class="custom-select col-12" id="category_id" name="category_id" required>
                <option selected disabled>Select</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{$category->id==$product->subcategory->category_id?'Selected':''}}>{{$category->name}}</option>
                @endforeach
              </select>
            </div>
         </div>

         <div class="product_subcategory">

         </div>

         <div class="form-group row ">
            <label class="col-sm-12 col-md-2 col-form-label">Brand</label>
            <div class="col-sm-12 col-md-10">
              <select class="custom-select col-12" name="brand_id" required>
                <option selected disabled>Select</option>
                @foreach($brands as $brand)
                <option value="{{$brand->id}}" {{$brand->id==$product->brand_id?'Selected':''}}>{{$brand->title}}</option>
                @endforeach
              </select>
            </div>
         </div>
         
         <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Description</label>
            <div class="col-sm-12 col-md-10 html-editor">
                <textarea rows="2" name="description" class="textarea_editor form-control border-radius-0" required>{{$product->description}}</textarea>
            </div>
         </div>

         <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Additional Information</label>
            <div class="col-sm-12 col-md-10 html-editor">
            <input class="form-control" value="{{$product->additional_info}}" type="text" name="additional_info" required>
            </div>
        </div>

         <div class="form-group row">
               <label class="col-sm-12 col-md-2 col-form-label">SKU</label>
               <div class="col-sm-12 col-md-10">
                  <input class="form-control" value="{{$product->sku}}" type="text" name="sku" required>
               </div>
         </div>

         <div class="add_varient">

            @foreach($product->variants as $v)
            <div class='row product_variant'>
               <div class='col-md-2 col-sm-6'>
                  <div class='form-group'><label>Quantity</label><input type='number' name='quantity[]' class='form-control' value="{{$v->quantity}}" required></div>
               </div>
               <div class='col-md-2 col-sm-6'>
                  <div class='form-group'><label>Variant</label><input type='text' name='variant[]' class='form-control' value="{{$v->variant}}" required></div>
               </div>
               <div class='col-md-2 col-sm-6'>
                  <div class='form-group'><label>Max Delivery Days</label><input type='number' name='max_delivery_days[]' class='form-control' value="{{$v->max_delivery_days}}" required></div>
               </div>
               <div class='col-md-2 col-sm-6'>
                  <div class='form-group'><label>MRP Price</label><input type='number' name='mrp_price[]' class='form-control' value="{{$v->mrp_price}}" required></div>
               </div>
               <div class='col-md-2 col-sm-6'>
                  <div class='form-group'><label>Selling Price</label><input type='number' name='selling_price[]' class='form-control' value="{{$v->selling_price}}" required></div>
               </div>
               
               <div class='col-md-2 col-sm-6'>
                  <div class='form-group'><label>In Stock</label>
                    
                          <select class="custom-select2 form-control" name="in_stock[]" style="width: 100%;">
                              
                              <option value="1" {{$v->in_stock=='1'?'Selected': ''}}>Yes</option>
                              <option value="0" {{$v->in_stock=='0'?'Selected': ''}}>No</option>
                              
                          </select>
                      
                  </div>
               </div>

               <div class='col-md-1 col-sm-12'>
                  <button class="btn btn-danger variant_remove mx-auto"  type="button"><i class="icon-copy dw dw-trash"></i></button>
               </div>
            

            </div>
            @endforeach


         </div>


         <div class="row text-center">
            <button class="btn btn-primary variant mx-auto mb-20" type="button"><i class="icon-copy dw dw-add"></i> Add Product Variants</button>
         </div>

         <div class="row my-3">
          <div class=" col-md-3">All Images</div>
          <div class=" col-md-9">
            @foreach(explode(',',$product->images) as $image)
            <div class="d-flex flex-row">
              <div class="col-md-8">
                <img src="{{ asset('uploads/products/'.$image) }}" class="img-fluid" width="100px">
              </div>
              <div class="col-md-4">
                <input type="" class="get_product_id" value="{{$product->id}}" hidden>
                <button class="btn btn-danger deleteImage" id="{{$image}}" type="button">Remove</button>
              </div>
            </div>
            @endforeach
          </div>
        </div>

         <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Images</label>
            <div class="col-sm-12 col-md-10">
               <input type="file" multiple name="images[]" class="form-control-file form-control height-auto">
            </div>
         </div>

         <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Status</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select2 form-control" name="status" style="width: 100%;">
                    
                    <option value="1" {{$product->status=='1'?'Selected': ''}}>Active</option>
                    <option value="0" {{$product->status=='0'?'Selected': ''}}>Not Active</option>
                    
                </select>
            </div>
        </div>

        <button class="btn btn-success" type="submit">Update</button>

    </form>
    
</div>

@stop


@section('js')

        <script type="text/javascript">

           $(document).on("click",".variant",function(){
                
               $(".add_varient").append(`<div class='row product_variant'>
                  <input type='hidden' name='in_stock[]' value='1' class='form-control'>
                  <div class='col-md-2 col-sm-6'>
                     <div class='form-group'><label>Quantity</label><input type='number' name='quantity[]' class='form-control' required></div>
                  </div>
                  <div class='col-md-2 col-sm-6'>
                     <div class='form-group'><label>Variant</label><input type='text' name='variant[]' class='form-control' required></div>
                  </div>
                  <div class='col-md-2 col-sm-6'>
                     <div class='form-group'><label>Max Delivery Days</label><input type='number' name='max_delivery_days[]' class='form-control' required></div>
                  </div>
                  <div class='col-md-2 col-sm-6'>
                     <div class='form-group'><label>MRP Price</label><input type='number' name='mrp_price[]' class='form-control' required></div>
                  </div>
                  <div class='col-md-2 col-sm-6'>
                     <div class='form-group'><label>Selling Price</label><input type='number' name='selling_price[]' class='form-control' required></div>
                  </div>            
                  <div class='col-md-2 col-sm-12'>
                     <button class="btn btn-danger variant_remove mx-auto" type="button"><i class="icon-copy dw dw-trash"></i></button>
                  </div>
                  
               </div>`);

                //$("select").select2();
            });


            $(document).on("click",".variant_remove",function(){
               
               $(this).parent().parent().fadeOut(function(){
                  $(this).remove();
               }); 
            });

            $(document).on("click",".deleteImage",function(){
                const el = this;
                const product_id = $('.get_product_id').val();
                const image_name=this.id;
                $.ajax({
                    method:'POST',
                    url:`/admin/products/getDeleteSelectedImages`,
                    data:{image_name,product_id,"_token":"{{csrf_token()}}"},
                    encode  : true
                }).then(response=>{
                    if(response){
                         $(el).parent().parent().css('background','tomato');
                         $(el).parent().parent().fadeOut(function(){
                            $(this).remove();
                         });            
                    }
                }).fail(error=>{
                    console.log('error',error);
                });
            });

            $(document).on("change","#category_id",function(){
                const category_id=$(this).val();
                const sub_category_id=$('#get_sub_category_id').val();
                $.ajax({
                    method:'POST',
                    url:`/admin/products/getCategoryData?category_id=${category_id}`,
                    data:{category_id,sub_category_id,"_token":"{{csrf_token()}}"}
                }).then(response=>{
                    if(response){
                        
                        $('.product_subcategory').html(response);
                        $(".subcategory_select").select2();
                    }
                }).fail(error=>{
                    console.log('error',error);
                });
            });

            $("#category_id").trigger("change");
            
        </script>

@stop