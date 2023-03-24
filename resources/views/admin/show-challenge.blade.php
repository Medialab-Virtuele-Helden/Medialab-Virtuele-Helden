@extends('layouts.app')

@section('content')
    <div class="container-xxl mt-4 p-3">
        <div class="row g-5">
            <div class="col-9">
                <div class="row mb-5">
                    <div class="card shadow bg-white d-flex flex-row justify-content-between p-4">
                        <div>
                            <h2 class="mb-0">Challenge titel</h1>
                        </div>
                        <div class="float-end">
                            <h2 class="o-timer mb-0"><i class="fa-sharp fa-regular fa-clock o-text"></i> 00:00:10:00</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card shadow bg-white p-4">
                        <h2 class="mb-0">Uitdaging</h1>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card shadow bg-white p-4 h-100">
                    <h2 class="mb-0">Leaderboard</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
