@extends("admin.master")

@section("body")
    <section class="py-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">Add Product</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{route("new-product")}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Category Name</label>
                                    <div class="col-md-8">
                                        <select name="category_id" id="categoryId" class="form-control">
                                            <option value="" disabled selected>Select a Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Sub Category Name</label>
                                    <div class="col-md-8">
                                        <select name="sub_category_id" id="subCategoryId" class="form-control">
                                            <option value="" disabled selected>Select a Sub Category</option>
                                            @foreach($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Brand Name</label>
                                    <div class="col-md-8">
                                        <select name="brand_id" id="brandId" class="form-control">
                                            <option value="" disabled selected>Select Brand</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">unit Name</label>
                                    <div class="col-md-8">
                                        <select name="unit_id" id="unitId" class="form-control">
                                            <option value="" disabled selected>Select unit</option>
                                            @foreach($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Product Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="" class="col-md-4 text-right ">Regular Price</label>
                                    <div class="col-md-8">
                                        <input type="text" name="regular_price" class="form-control">
                                    </div>
                                </div>
                                <div class="form-groupl row mb-3">
                                    <label for="" class="col-md-4 text-right">Selling Price</label>
                                    <div class="col-md-8">
                                        <input type="text" name="selling_price" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="" class="col-md-4 text-right">Product Short Description</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control summernote" name="short_description" id="" cols="20" rows="6"></textarea>
                                    </div>
                                </div><div class="form-group row mb-3">
                                    <label for="" class="col-md-4 text-right">Product Long Description</label>
                                    <div class="col-md-8">
                                        <textarea name="long_description" class="form-control summernote " id="" cols="20" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Product Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" class="form-control-file">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Product Outher Images</label>
                                    <div class="col-md-8">
                                        <input type="file" name="sub_image[]" class="form-control-file" multiple>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Product Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" value="1"> Published</label>
                                        <label for=""><input type="radio" name="status" value="0"> Unpublished</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right"></label>
                                    <div class="col-md-8">
                                        <input type="submit" value="New Product" class="btn btn-outline-success form-control">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section("admin-js")
    <script>
        $(document).on("change", "#categoryId", function () {

            var categoryId = $(this).val();

            $.ajax({
                method: "GET",
                url: "{{url('/get-sub-category-by-category-id')}}",
                data: {id:categoryId},
                dataType: "JSON",

                success:function(res){
                    var option =  "";
               option += '<option value="" disabled selected>Select a SubCategory</option>';
               $.each(res, function(key, value) {
                        option += '<option value=" '+value.id+'"> '+value.name+'</option>';
                    })

                    $("#subCategoryId").empty().append(option);

                },
                error: function (e) {
                    console.log(e);
                }
            });

        })
    </script>
@endsection
