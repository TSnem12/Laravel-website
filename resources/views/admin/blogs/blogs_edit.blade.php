@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Blog Page</h4> <br> <br>
                       
                        <form method="POST" action="{{ route('update.blog') }}" enctype="multipart/form-data">
                            
                            @csrf

                            <input type="hidden" name="id" value="{{ $blogs->id }}">

                            <div class="row mb-3">
                                <label for="blog_category_id" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="col-sm-10">
                                    
                                    <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                        
                                        <option selected="">Open this select menu</option>
                                        
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $blogs->blog_category_id ? 'selected' : '' }}>{{ $category->blog_category }}</option>
                                        @endforeach
                                    </select>
                                
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="blog_title" class="col-sm-2 col-form-label">Blog Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="blog_title" type="text" id="blog_title" value="{{ $blogs->blog_title }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="blog_tags" class="col-sm-2 col-form-label">Blog Tags</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="blog_tags" type="text" id="blog_tags" value="{{ $blogs->blog_tags }}" data-role="tagsinput">
                            
                                </div>
                            </div>

                            
                            <div class="row mb-3">
                                <label for="blog_description" class="col-sm-2 col-form-label">Blog Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="blog_description" rows="5" id="elm1">{!! $blogs->blog_description !!}</textarea>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="blog_image" class="col-sm-2 col-form-label">Blog Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="blog_image" type="file" id="blog_image">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/blog/'.$blogs->blog_image) }}" alt="Blog Image">
                                </div>    
                            </div>

                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">Update Blog Data</button>

                        </form>    
                    
                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div>
</div>   


<script type="text/javascript">
    
    $(document).ready(function(){
        $('#blog_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>


@endsection