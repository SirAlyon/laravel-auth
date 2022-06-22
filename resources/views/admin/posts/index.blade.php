@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between py-3">
    <h1>All Posts</h1>
    <div><a href="{{route('admin.posts.create')}}" class="btn btn-primary">Add Post</a></div>
</div>

<table class="table table-striped  table-responsive table-dark">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Cover Image</th>
          <th scope="col">Slug</th>
          <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        
        @forelse($posts as $post)

        <tr>
            <th scope="row">{{$post->id}}</th>
            <th>{{$post->title}}</th>
            <th>{{$post->slug}}</th>
            <th><img width="150" heigth="75" src="{{$post->cover_image}}" alt="{{$post->title}}"></th>
            <th>
              <a class="btn btn-primary" href="{{route('admin.posts.show', $post->id)}}">views</a> 
              <a class="btn btn-secondary" href="{{route('admin.posts.edit', $post->id)}}">Edit</a>  

              
                  <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{$post->id}}">
                    Delete
                </button>
            

                <!-- Modal -->
                <div class="modal fade" id="delete-post-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitle-{{$post->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark">Delete current</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark">
                                Are you sure you want to delete this post?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


                                <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </th>
        </tr>

        @empty
        <tr>
            <th scope="row">No Posts</th>
        </tr>

        @endforelse
    </tbody>
</table>
@endsection