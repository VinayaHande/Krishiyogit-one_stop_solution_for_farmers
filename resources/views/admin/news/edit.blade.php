@extends('layouts.admin')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Create news</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.news.update',$news->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">News Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title or Headline" value="{{ old('title',$news->title) }}">
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control-file" name="thumbnail" id="thumbnail"
                        placeholder="News Thumbnail" aria-describedby="thumbnailId">
                        <img src="{{ asset('storage/'.$news->thumbnail) }}" alt="" class="img-thumbnail m-2 p-2" style="width:100px;">
                    <small id="thumbnailId" class="form-text text-muted">Select new thumbnail image</small>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"
                        placeholder="News content">{{ old('description',$news->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="DRAFT" @if($news->status =="DRAFT") selected @endif>DRAFT</option>
                        <option value="UNPUBLISH" @if($news->status =="UNPUBLISH") selected @endif>UNPUBLISH</option>
                        <option value="PUBLISH" @if($news->status =="PUBLISH") selected @endif>PUBLISH</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>





@endsection
