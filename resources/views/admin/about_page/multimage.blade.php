@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Multi Images</h4> <br> <br>
                       
                        <form method="POST" action="{{ route('store.multi.image') }}" enctype="multipart/form-data">
                            
                            @csrf

                            
                            <div class="row mb-3">
                                <label for="multi_image" class="col-sm-2 col-form-label">About Multi Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="multi_image[]" type="file" id="multi_image" multiple>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="About Image">
                                </div>    
                            </div>

                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">Add Multi Images</button>

                        </form>    
                    
                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div>
</div>   


<script type="text/javascript">
    
    $(document).ready(function(){
        $('#multi_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>


@endsection