
<div class="form-group row ">
    <label class="col-sm-12 col-md-2 col-form-label">Select Sub category</label>
    <div class="col-sm-12 col-md-10">
      <select class="custom-select col-12" id="subcategory_id" name="sub_category_id" required>
        <option value="" selected disabled>Select</option>
        @foreach($subcategories as $subcategory)
        <option value="{{$subcategory->id}}" {{$subcategory->id==$sub_category_id?'Selected':''}}>{{$subcategory->name}}</option>
        @endforeach
      </select>
    </div>
</div>
