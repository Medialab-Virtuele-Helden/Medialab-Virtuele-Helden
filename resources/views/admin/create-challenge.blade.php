@extends('layouts.app')

@section('content')
    <div class="container-xxl card shadow bg-white mt-4 p-3">
        <h1 class="">Challenge aanmaken</h1>

        <div>
            <form>
                <div class="mt-3">
                    <h2 class="o-card-create-challenge-header mb-0">Content</h2>
                    <div class="o-card-create-challenge">
                        <div class="row mb-3">
                            <label for="challenge-title" class="col-sm-2 col-form-label">Titel</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="challenge-title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="challenge-description" class="col-sm-2 col-form-label">Beschrijving</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="challenge-description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="challenge-image" class="col-sm-2 col-form-label">Afbeelding</label>
                            <div class="col-sm-auto">
                                <input type="file" class="form-control" id="challenge-image">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="challenge-start-date" class="col-sm-2 col-form-label">Begindatum</label>
                            <div class="col-sm-auto">
                                <input type="datetime-local" class="form-control" id="challenge-start-date">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <label for="challenge-end-date" class="col-sm-2 col-form-label">Einddatum</label>
                            <div class="col-sm-auto">
                                <input type="datetime-local" class="form-control" id="challenge-end-date">
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
                                <input type="email" class="form-control" id="challenge-title">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary float-end mt-5">Opslaan</button>
            </form>
        </div>
    </div>
@endsection
