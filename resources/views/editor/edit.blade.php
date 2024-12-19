@extends('editor.index')

@section('form') 

<div class="container mt-3 mb-5">
  <div class="" style="margin-left: -50px;margin-right: 5px;">
    <div class="row">
        <div class="col"><h1 style="font-size: 50px;font-family: sans-serif;font-weight: 900;">{{ __('EDIT BLOGS') }}</h1>
    </div>
    <div class="col"><span><button type="submit" class="btn btn-primary mt-3 me-3 " style="float:right;">Back</button></span></div>
        
    </div>
  </div>
</div>
<?php 
//dd($posts->content);
?>

<div class="card" style="width: 85rem; margin-left:100px;">
    <!-- <img class="card-img-top" src=".../100px180/" alt="Card image cap"> -->
    <div class="card-body">
        <!-- <h5 class="card-title">{{ __('CREATE BLOGS') }}</h5> -->
        <form action="{{ route('editor.update') }}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">TITLE:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" value="{{$posts->title}}" name="title">
            </div>
            <div class="mb-3 mt-3">
                <label for="author" class="form-label">Author:</label>
                <input type="text" class="form-control" id="author" placeholder="Enter author name" value="{{$posts->author}}" name="author">
            </div>
            <div class="mb-3 mt-3">
                <label for="content" class="form-label">CONTENT:</label>
                <textarea class="form-control summernote" id="content" name="content">{{$posts->content}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>


<!-- Summernote Initialization -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300, // Set editor height
            minHeight: null, // Set minimum height of editor
            maxHeight: null, // Set maximum height of editor
            focus: true, // Set focus to editable area after initializing summernote
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endsection
