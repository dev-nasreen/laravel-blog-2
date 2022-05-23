@extends('layouts.admin')
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
                    <li class="breadcrumb-item active">Post</li>
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
                        <h3 class="card-title">Post List</h3>
                        <div class="float-right">
                            <a href="{{ route('post.create') }}" class="btn btn-primary ms-auto">Create Post</a>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Tag</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($posts->count())
                                    @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>
                                        <div>
                                            <img src="{{ asset('uploads/post/' . $post->image)}}" style="width: 48px;" alt="">
                                        </div>
                                    </td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->category->name}}</td>
                                    <td>
                                        @foreach ($post->tags as $tag)
                                            <span class="badge badge-primary">{{$tag->name}}</span>
                                        @endforeach
                                    </td>
                                    <td>{{$post->user->name}}</td>
                                    <td class="d-flex">
                                        <a class="mr-2 btn btn-sm btn-success" href="{{ route('post.show', $post->id) }}"><i class="fas fa-eye"></i></a>
                                      <a class="mr-2 btn btn-sm btn-primary" href="{{ route('post.edit', $post->id) }}"><i class="fas fa-edit"></i></a>
                                      <form action="{{ route('post.destroy', $post->id) }}" class="mr-1" method="POST">
                                                @method('DELETE')
                                                @csrf 
                                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                      </form>
                                      
                                    </td>
                                </tr>    
                              @endforeach
                                @else
                                    <tr>
                                    <td colspan="6">
                                        <h5 class="text-center">No post found</h5>
                                    </td>
                                </tr>
                                @endif
                              
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->

@endsection