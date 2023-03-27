@extends('layouts.app')

@section('content')
 
 
<div class="card">
  <div class="card-header">Challenge Details</div>
  <div class="card-body">
 
        <div class="card-body">
        <h5 class="card-title">Title : {{ $challenge->title }}</h5>
        <p class="card-text">Organiser : {{ $challenge->organiser }}</p>
        <p class="card-text">Status : {{ $challenge->status }}</p>
        <p class="card-text">Description : {{ $challenge->description }}</p>
        <p class="card-text">Start Date : {{ $challenge->start_date }}</p>
        <p class="card-text">End Daet : {{ $challenge->end_date }}</p>
        <p class="card-text">Goal : {{ $challenge->challenge_goal }}</p>
        <p class="card-text">Reward : {{ $challenge->reward }}</p>

  </div>
       
    </hr>
  
  </div>
</div>