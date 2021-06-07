
<div class="form-group row ">
    <label class="col-sm-12 col-md-2 col-form-label">Select Sub category</label>
    <div class="col-sm-12 col-md-10">
      <select class="custom-select col-12 subcategory_select" id="subcategory_id" name="sub_category_id" required>
        <option value="" selected disabled>Select</option>
        @foreach($subcategories as $subcategory)
        <option value="{{$subcategory->id}}" {{$subcategory->id==$sub_category_id?'Selected':''}}>{{$subcategory->name}}</option>
        @endforeach
      </select>
    </div>
</div>

<div class="form-group row ">
    <label class="col-sm-12 col-md-2 col-form-label">Brand</label>
    <div class="col-sm-12 col-md-10">
        <select class="custom-select col-12 brand_select" name="brand_id" required>
        <option selected disabled>Select</option>
        @foreach($brands as $brand)
        <option value="{{$brand->id}}" {{$brand->id==$brand_id?'Selected':''}}>{{$brand->title}}</option>
        @endforeach
        </select>
    </div>
</div>

