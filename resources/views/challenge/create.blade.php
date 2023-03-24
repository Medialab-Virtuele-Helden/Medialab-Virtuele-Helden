@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">Challenge Page</div>
  <div class="card-body">

      <form action="{{ url('challenge') }}" method="post">
        {!! csrf_field() !!}
        <label>Title</label></br>
        <input type="text" name="title" id="title" class="form-control"></br>
        <label>Organiser</label></br>
        <input type="text" name="organiser" id="organiser" class="form-control"></br>
        <label>Status</label></br>
        <input type="number" name="status" id="status" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <label>Start Date</label></br>
        <input type="date" name="start_date" id="start_date" class="form-control"></br>
        <label>End Date</label></br>
        <input type="date" name="end_date" id="end_date" class="form-control"></br>
        <label>Goal</label></br>
        <input type="text" name="challenge_goal" id="challenge_goal" class="form-control"></br>
        <label>Reward</label></br>
        <input type="text" name="reward" id="reward" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop