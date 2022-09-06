@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 class="text-center mt-5 mb3"> {{ $todo->title }} </h4>
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            توضیحات
                        </div>
                        <div class="card-body">
                            {{ $todo->description }}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex mr-5 mb-3">
                    <a class="btn btn-sm btn-outline-dark" href="{{route( 'todos.edit' , ['todo' => $todo->id])}}">ویرایش</a>
                    <form class="mr-2" action="{{ route('todos.delete' , ['todo' =>$todo->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                    </form>
                </div>            
            </div>
        </div>
    </div>
@endsection