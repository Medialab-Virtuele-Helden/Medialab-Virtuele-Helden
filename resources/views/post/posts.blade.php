@extends('layouts.app')

@section('content')
    <div class="container-xxl mt-4 p-3">
        <div class="row g-5">
            <div class="col-2">
                <p><i class="fa-solid fa-signs-post"></i> Boards</p>
                <div>
                    <p>| Algemeen</p>
                    <p>| Feedback gevraagd</p>
                    <p>| Vragen over Huddle</p>
                </div>
            </div>

            <div class="col-7">
                @foreach($posts as $post)
                    <a class="card-link" href="{{route('challenge.show', [$post->id])}}">
                        <div class="card shadow bg-white p-4 m-4 mt-0">
                            <div class="row g-3">
                                <div class="col-1">
                                    <img src="{{ asset('images/user-avatar.png') }}" alt="Gebruikers afbeelding" class="card-post-avatar">
                                </div>
                                <div class="col-10 ms-4">
                                    <div class="d-flex flex-row">
                                        <h1 class="card-post-title">{{ $post->title }}</h1>
                                        <p class="badge badge-primary ms-3 mt-1">Challenge</p>
                                    </div>
                                    <p>{{ $post->user->name }}</p>
                                    <div>
                                        <p>{!! $post->content !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="col-3 pe-0">
                <div class="card shadow bg-white p-4 m-4 mt-0">
                    <div class="d-flex flex-row justify-content-between">
                        <p>Level</p>
                        <p>0 <i class="fa-regular fa-star"></i></p>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar d-flex flex-row justify-content-between" role="progressbar" style="width: 10%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
