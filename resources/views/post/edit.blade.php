@extends('layouts.app')

@section('content')
    <div class="container-xxl card shadow bg-white mt-4 p-3">
      @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
      @endif
      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <h1 class="">Bericht aanpassen</h1>

      <div>
        <form method="post" action="{{url('posts/store')}}" enctype="multipart/form-data">
        @csrf
          <div class="mt-3">
            <h2 class="o-card-create-challenge-header mb-0">Content</h2>
              <div class="o-card-create-challenge">
                <div class="row mb-3">
                  <label for="challenge-title" class="col-sm-2 col-form-label">Titel</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="post-title" name="title" value=" {{ $post->title }}" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="challenge-description" class="col-sm-2 col-form-label">Beschrijving</label>
                  <div class="col-sm-10">
                      <textarea class="text-editor form-control" id="post-content" name="content">{{ $post->content }}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-secondary float-end mt-5">Opslaan</button>
          </form>
        </div>
    </div>
@endsection