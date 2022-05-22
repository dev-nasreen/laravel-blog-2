@extends('layouts.admin')
@section('style')
<link rel="stylesheet" href="{{asset('admin')}}/css/summernote-bs4.min.css">    
@endsection
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post</a></li>
                    <li class="breadcrumb-item active">Create Post</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Post</h3>
                        <div class="float-right">
                            <a href="{{ route('post.index') }}" class="btn btn-primary ms-auto">Go Back To Post
                                List</a>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-10 offset-md-1">

                                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div>
                                            @include('layouts.inc.errors')
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Post Title</label>
                                            <input type="text" name="title" class="form-control" id="name"
                                                placeholder="Enter Post Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Select Post Category</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="" class="d-none" slected>Select Category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <div class="custom-file">
                                                <input type="file" name="image" id="image" class="custom-file-input">
                                                <label for="image" class="custom-file-label" id="custom-file">Feature
                                                    Image</label>

                                            </div>
                                        </div>
                                        <div>
                                            <label class="d-block">Tags</label>
                                            @foreach ($tags as $tag)
                                            <input type="checkbox" class="" name="tags[]" value="{{$tag->id}}" id="tag{{$tag->id}}">
                                            <label for="tag{{$tag->id}}">{{$tag->name}}</label>

                                            @endforeach

                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="4"
                                                placeholder="Enter Category Description"></textarea>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->

@endsection
@section('script')
<script src="{{asset('admin')}}/js/summernote-bs4.min.js"></script>  
<script>
      $('#description').summernote({
        placeholder: 'Write post description here',
        tabsize: 2,
        height: 200
      });
    </script>  
@endsection