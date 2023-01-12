@extends('layouts.admin')
@section('content')
     {{-- <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div> --}}
        <h1>Edit Project: {{$project->name_project}}</h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" enctype="multipart/form-data" class="p-4">
                    @csrf
                    @method('PUT')
                      <div class="mb-3">
                        <label for="name_project" class="form-label">Titolo</label>
                        <input type="text" class="form-control @error('name_project') is-invalid @enderror" id="name_project" name="name_project" value="{{old('name_project', $project->name_project)}}">
                        @error('name_project')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{old('description', $project->description)}}</textarea>
                      </div>
                      <div class="mb-3">
                        <label for="dev_lang" class="form-label">dev lang</label>
                        <input type="text" class="form-control" id="dev_lang" name="dev_lang" value="{{old('description', $project->dev_lang)}}">
                      </div>
                      <div class="d-flex">
                        <div class="media me-4">
                            <img class="shadow" width="150" src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->name_project}}">
                        </div>
                        <div class="mb-3">
                            <label for="cover_image" class="form-label">Replace project image</label>
                            <input type="file" name="cover_image" id="cover_image" class="form-control  @error('cover_image') is-invalid @enderror" >
                            @error('cover_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Seleziona categoria</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                          <option value="">Select category</option>
                          @foreach ($categories as $category)
                              <option value="{{$category->id}}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{$category->name}}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-success">Submit</button>
                      <button type="reset" class="btn btn-primary">Reset</button>
                </form>
            </div>
        </div>
@endsection
