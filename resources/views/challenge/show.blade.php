@extends('layouts.app')

@section('header-scripts')
    @vite(['resources/js/timer.js'])
@endsection

@section('content')
    <div class="container-xxl mt-4 p-3">
        <div class="row g-5">
            <div class="col-9">
                <div class="row mb-5">
                    <div class="card shadow bg-white d-flex flex-row justify-content-between p-4">
                        <div>
                            <h2 class="mb-0">{{ $challenge-> title }}</h1>
                        </div>
                        <div class="float-end d-flex flex-row">
                            <h2><i class="fa-sharp fa-regular fa-clock o-text mx-2 align-items-center"></i></h2>
                            <h2 class="o-timer mb-0" id="timer" data-startDate="{{ $challenge->start_date }}" data-endDate="{{$challenge->end_date}}">{{ $challenge-> end_date }}</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card shadow bg-white p-4">
                        <img src="{{ asset('images/challenge-example-image.png') }}" alt="Afbeelding vor de uitdaging" class="">
                        <div>
                            <div>
                                <h1 class="mb-1 mt-3">Uitdaging</h1>
                                <h4>{!! $challenge-> content !!}</h4>
                            </div>
                            <div>
                                <h4 class="mt-5"><b>Prijs: </b>{{ $challenge-> reward }}</h4>
                            </div>
                        </div>
                        <div class="progress mt-5">
                            <div class="progress-bar d-flex flex-row justify-content-between" role="progressbar" style="width: {{$progress}}%">
                                <h4 class="o-text"><b class="float-end me-3 mt-2">{{$progress}}%</b></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card shadow bg-white p-4 h-100">
                    <div id="leaderboard">
                        <h2 class="mb-0">Leaderboard</h2>
                    </div>
                    <div class="mt-2">
                        @if (count($rest) > 0)
                            <div class="d-flex flex-row align-items-center mt-3">
                                <div class="o-leaderboard-medal">
                                    <img src="{{ asset('images/user-avatar.png') }}" alt="Gebruikers afbeelding" class="o-leaderboard-avatar">
                                    <img src="{{ asset('icons/medal-solid-gold.svg') }}" alt="Gebruikers afbeelding" class="o-leaderboard-medal-position-top-right">
                                </div>
                                <div class="ms-3">
                                    <p class="mb-0">{{ $first->name }}</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mt-3">
                            <div class="o-leaderboard-medal">
                                <img src="{{ asset('images/user-avatar.png') }}" alt="Gebruikers afbeelding" class="o-leaderboard-avatar">
                                <img src="{{ asset('icons/medal-solid-silver.svg') }}" alt="Gebruikers afbeelding" class="o-leaderboard-medal-position-top-right">
                            </div>
                            <div class="ms-3">
                                <p class="mb-0">{{ $second->name }}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mt-3">
                            <div class="o-leaderboard-medal">
                                <img src="{{ asset('images/user-avatar.png') }}" alt="Gebruikers afbeelding" class="o-leaderboard-avatar">
                                <img src="{{ asset('icons/medal-solid-bronze.svg') }}" alt="Gebruikers afbeelding" class="o-leaderboard-medal-position-top-right">
                            </div>
                            <div class="ms-3">
                                <p class="mb-0">{{ $third->name }}</p>
                            </div>
                        </div>
                            @foreach($rest as $p)
                            <div class="d-flex flex-row align-items-center mt-3">
                                <img src="{{ asset('images/user-avatar.png') }}" alt="Gebruikers afbeelding" class="o-leaderboard-avatar">
                                <div class="ms-3">
                                    <p class="mb-0">{{ $p->name }}</p>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <p>No participants yets.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')

        const alert = (message, type) => {
        const wrapper = document.createElement('div')
        wrapper.innerHTML = [
            `<div class="alert alert-${type} alert-dismissible" role="alert">`,
            `   <div>${message}</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('')

        alertPlaceholder.append(wrapper)
        }

        const alertTrigger = document.getElementById('liveAlertBtn')
        if (alertTrigger) {
        alertTrigger.addEventListener('click', () => {
            alert('Nice, you triggered this alert message!', 'success')
        })
        }
    </script>
@endsection
