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
                <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">News Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title or Headline">
                    </div>

                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" class="form-control-file" name="thumbnail" id="thumbnail"
                            placeholder="News Thumbnail" aria-describedby="thumbnailId">
                        <small id="thumbnailId" class="form-text text-muted">Select thumbnail image</small>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"
                            placeholder="News content"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="DRAFT">DRAFT</option>
                            <option value="UNPUBLISH">UNPUBLISH</option>
                            <option value="PUBLISH">PUBLISH</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
