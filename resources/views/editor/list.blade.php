@extends('editor.index')

@section('form')
<style>
  #img {
    width: 150px;
    height:80px;
  }

</style>
<div class="container mt-3 mb-5">
  <div class="" style="margin-left: -50px;margin-right: 5px;">
    <div class="row">
        <div class="col"><h1 style="font-size: 50px;font-family: sans-serif;font-weight: 900;">{{ __('BLOGS') }}</h1>
    </div>
    <div class="col"><span><button type="submit" class="btn btn-primary mt-3 me-3 " style="float:right;">Back</button></span></div>
        
    </div>
  </div>
</div>

<div class="card">
    <div class="card-body">
    <table class="table table-bordered">
    <thead>
      <tr>
        <th class="text-center">S.No</th>
        <th class="w-40 text-center">Image</th>
        <th class="w-50 text-center">Title</th>
        <th class="text-center">Author</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td><img src="{{ asset('thumbnails/'.$post->thumbnail) }}" alt="thumbnail" id="img"></td>
        <td>{{$post->title}}</td>
        <td>{{$post->author}}</td>
        <td>
          <button class="btn btn-success" style="margin-left:65px"><a href="{{ url('edit/' . $post->id) }}">Edit</a></button>
          <span><button class="btn btn-danger" style="margin-right: -64px;"><a href="">Delete</a></button></span>
      </td>
      </tr>
      @endforeach
    </tbody>
  </table>
    </div>
</div>
@endsection