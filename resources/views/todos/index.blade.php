@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center my-3">
                    <h4>تسک ها</h4>
                    <a class="btn btn-sm btn-outline-dark" href="{{route('todos.create')}}">ایجاد تسک</a>
                </div>
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            تسک ها
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                
                                @foreach ($todos as $todo)
                                    <li class="list-group-item d-flex justify-content-between">
                                        {{$todo->title}} 
                                        <div>
                                            <a class="btn btn-sm btn-outline-dark" href="{{route( 'todos.show' , ['todo' => $todo->id])}}">نمایش</a>
                                            <form action="{{route( 'todos.complete' , ['todo' => $todo->id])}}" id="complete{{$todo->id}}" method="POST">
                                                @if (!$todo->completed)
                                                    @csrf
                                                    <div class="form-check form-switch">
                                                        <input name="{{$todo->id}}" class="form-check-input" type="checkbox" role="switch" id="takenBefore"
                                                                    onclick="event.preventDefault();
                                                                    document.getElementById('complete{{$todo->id}}').submit();">
                                                    </div>
                                                @else
                                                    @csrf
                                                    <div class="form-check form-switch">
                                                        <input name="{{$todo->id}}" class="form-check-input" type="checkbox" role="switch" id="Checked" checked
                                                                    onclick="event.preventDefault();
                                                                    document.getElementById('complete{{$todo->id}}').submit();">
                                                    </div>
                                                @endif
                                            </form>
                                            
                                            {{--<template>
                                                <div>
                                                  <b-form-checkbox
                                                    id="checkbox-1"
                                                    
                                                    name="checkbox-1"
                                                    value="accepted"
                                                    unchecked-value="not_accepted"
                                                  >
                                                    I accept the terms and use
                                                  </b-form-checkbox>
                                              
                                                  
                                                </div>
                                              </template>
                                              
                                              <script>
                                                export default {
                                                  data() {
                                                    return {
                                                      status: 'not_accepted'
                                                    }
                                                  }
                                                }
                                              </script>--}}
                                              
                                            {{--<a class="btn btn-sm btn-outline-info" href="{{route( 'todos.complete' , ['todo' => $todo->id])}}">انجام شد</a>--}}
                                        </div>
                                    </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5"> {{ $todos->links() }} </div>
            </div>
        </div>
    </div>

    <script>
        checkBox = document.getElementById('takenBefore').addEventListener('change', event => {
            console.log(event.submit);
        });
    </script>
@endsection