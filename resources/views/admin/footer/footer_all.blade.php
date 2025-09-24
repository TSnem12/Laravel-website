@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Footer Page</h4>
                       
                        <form method="POST" action="{{ route('update.footer') }}">
                            
                            @csrf

                            <input type="hidden" name="id" value="{{ $allFooter->id }}">
                            
                            <div class="row mb-3">
                                <label for="number" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="number" type="text" id="number" value="{{ $allFooter->number }}">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" class="form-control" rows="5" name="short_description">{{ $allFooter->short_description }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->

                              
                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="address" type="text" id="address" value="{{ $allFooter->address }}">
                                </div>
                            </div>
                            <!-- end row -->

                              
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="email" type="email" id="email" value="{{ $allFooter->email }}">
                                </div>
                            </div>
                            <!-- end row -->

                              
                            <div class="row mb-3">
                                <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="facebook" type="text" id="facebook" value="{{ $allFooter->facebook }}">
                                </div>
                            </div>
                            <!-- end row -->

                              
                            <div class="row mb-3">
                                <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="twitter" type="text" id="twitter" value="{{ $allFooter->twitter }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="copyright" class="col-sm-2 col-form-label">Copyright</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="copyright" type="text" id="copyright" value="{{ $allFooter->copyright }}">
                                </div>
                            </div>
                            <!-- end row -->

                        
                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light">Update Footer Page</button>

                        </form>    
                    
                    </div>
                </div>
            </div> <!-- end col -->
        </div>


    </div>
</div>   



@endsection