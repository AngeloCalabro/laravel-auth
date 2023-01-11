@extends('layouts.admin')
@section('content')
    <h1>{{$project->name_project}}</h1>
    <p>{{$project->description}}</p>
@endsection
