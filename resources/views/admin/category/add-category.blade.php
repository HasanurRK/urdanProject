@extends("admin.master")

@section("body")
    <section class="py-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">Add Category</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route("new-category") }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Category Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Category Description</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="description" id="" cols="20" rows="15"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Category Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right">Category Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" value="1"> Published</label>
                                        <label for=""><input type="radio" name="status" value="0"> Unpublished</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 text-right"></label>
                                    <div class="col-md-8">
                                        <input type="submit" value="New Category" class="btn btn-outline-success form-control">
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
