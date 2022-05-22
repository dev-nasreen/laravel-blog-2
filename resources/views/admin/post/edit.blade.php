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
                <h1 class="m-0 text-dark">Edit Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post list</a></li>
                    <li class="breadcrumb-item active">Edit Post</li>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Edit Post - {{ $post->title }}</h3>
                            <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back to Post List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                <form action="{{ route('post.update', [$post->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="card-body">
                                        <div>
                                            @include('layouts.inc.errors')
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Post Title</label>
                                            <input type="text" name="title" class="form-control" id="name"
                                                value="{{$post->title}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Select Post Category</label>
                                            <select name="category_id" id="category_id" class="form-control">

                                                @foreach ($categories as $category)
                                                <option {{ ($post->category_id == $category->id) ? 'selected':''}}
                                                    value="{{$category->id}}">
                                                    {{$category->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <div class="row p-0 m-0 align-items-center">
                                                <div class="custom-file col-10">
                                                    <input type="file" name="image" id="image" value=""
                                                        class="custom-file-input">
                                                    <label for="image" class="custom-file-label"
                                                        id="custom-file">Feature Image</label>
                                                </div>
                                                <div class="col-2">
                                                    <img src="{{asset('uploads/post/'.$post->image)}}" class="img-fluid"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="d-block">Tags</label>
                                            @foreach ($tags as $tag)
                                            <input type="checkbox" class="" name="tags[]" value="{{$tag->id}}"
                                                id="tag{{$tag->id}}"  @foreach ($post->tags as $t)
                                                @if($tag->id == $t->id) checked
                                                @endif
                                            @endforeach >
                                            <label for="tag{{$tag->id}}">{{$tag->name}}</label>

                                            @endforeach

                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description"
                                                rows="4">{{$post->description}}</textarea>
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