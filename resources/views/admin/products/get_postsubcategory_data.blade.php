
<div class="form-group row ">
    <label class="col-sm-12 col-md-2 col-form-label">Select Post Sub category</label>
    <div class="col-sm-12 col-md-10">
      <select class="custom-select col-12" id="post_sub_category_id" name="post_sub_category_id" required>
        <option value="" selected disabled>Select</option>
        @foreach($postsubcategories as $postsubcategory)
        <option value="{{$postsubcategory->id}}" {{$postsubcategory->id==$post_sub_category_id?'Selected':''}}>{{$postsubcategory->name}}</option>
        @endforeach
      </select>
    </div>
</div>
