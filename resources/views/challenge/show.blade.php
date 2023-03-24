@extends('layouts.app')

@section('content')
 
 
<div class="card">
  <div class="card-header">Challenge Details</div>
  <div class="card-body">
 
        <div class="card-body">
        <h5 class="card-title">Title : {{ $challenges->title }}</h5>
        <p class="card-text">Organiser : {{ $challenges->organiser }}</p>
        <p class="card-text">Status : {{ $challenges->status }}</p>
        <p class="card-text">Description : {{ $challenges->description }}</p>
        <p class="card-text">Start Date : {{ $challenges->start_date }}</p>
        <p class="card-text">End Daet : {{ $challenges->end_date }}</p>
        <p class="card-text">Goal : {{ $challenges->challenge_goal }}</p>
        <p class="card-text">Reward : {{ $challenges->reward }}</p>

  </div>
       
    </hr>
  
  </div>
</div>