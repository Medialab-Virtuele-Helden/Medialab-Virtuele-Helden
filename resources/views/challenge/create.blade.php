@extends('layouts.app')

@section('content')
  <div class="container-xxl card shadow bg-white mt-4 p-3">
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
      <h1 class="">Challenge aanmaken</h1>

      <div>
        <form action="{{ url('challenges/store') }}" method="post">
          @csrf
          <div class="mt-3">
            <h2 class="o-card-create-challenge-header mb-0">Content</h2>
            <div class="o-card-create-challenge">
              <div class="row mb-3">
                <label for="challenge-title" class="col-sm-2 col-form-label">Titel</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="challenge-title" name="title">
                </div>
              </div>
              <div class="row mb-3">
                <label for="challenge-description" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                  <textarea class="text-editor form-control" id="challenge-content" name="content"></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label for="challenge-image" class="col-sm-2 col-form-label">Afbeelding</label>
                <div class="col-sm-auto">
                  <input type="file" class="form-control" id="challenge-image" name="image" disabled>
                </div>
              </div>
              <div class="row mb-3">
                <label for="challenge-start-date" class="col-sm-2 col-form-label">Begindatum</label>
                <div class="col-sm-auto">
                  <input type="datetime-local" class="form-control" id="challenge-start-date" name="start-date">
                </div>
              </div>
              <div class="row mb-3">
                <label for="challenge-end-date" class="col-sm-2 col-form-label">Einddatum</label>
                <div class="col-sm-auto">
                  <input type="datetime-local" class="form-control" id="challenge-end-date" name="end-date">
                </div>
              </div>
              <div class="row mb-0">
                <label for="challenge-title" class="col-sm-2 col-form-label">Goal aantal</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="challenge-goal" name="challenge-goal" placeholder="300">
                </div>
              </div>
            </div>
          </div>
          <div class="">
            <h2 class="o-card-create-challenge-header mb-0 mt-3">Beloningen</h2>
            <div class="o-card-create-challenge">
              <div class="row mb-0">
                <label for="challenge-title" class="col-sm-2 col-form-label">Titel</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="challenge-reward" name="reward">
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-secondary float-end mt-5">Opslaan</button>
        </form>
      </div>
  </div>
@endsection
