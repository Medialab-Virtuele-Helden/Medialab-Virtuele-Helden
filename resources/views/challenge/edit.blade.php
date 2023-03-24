@extends('layouts.app')

@section('content')
 
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('challenge/' .$challenges->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")

        <input type="hidden" name="id" id="id" value="{{$challenges->id}}" id="id" />
        <label>Title</label></br>
        <input type="text" name="title" id="title" value="{{$challenges->title}}" class="form-control"></br>
        <label>Organiser</label></br>
        <input type="text" name="organiser" id="organiser" value="{{$challenges->organiser}}" class="form-control"></br>
        <label>Status</label></br>
        <input type="number" name="status" id="status" value="{{$challenges->status}}" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" value="{{$challenges->description}}" class="form-control"></br>
        <label>Start Date</label></br>
        <input type="date" name="start_date" id="start_date" value="{{$challenges->start_date}}" class="form-control"></br>
        <label>End Date</label></br>
        <input type="date" name="end_date" id="end_date" value="{{$challenges->end_date}}" class="form-control"></br>
        <label>Goal</label></br>
        <input type="text" name="challenge_goal" id="challenge_goal" value="{{$challenges->challenge_goal}}" class="form-control"></br>
        <label>Reward</label></br>
        <input type="date" name="reward" id="reward" value="{{$challenges->reward}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop