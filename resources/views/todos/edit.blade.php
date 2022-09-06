@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                @include('sections.errors')
                <div class="card">
                    <div class="card-header">
                        ویرایش تسک
                    </div>
                    <div class="card-body">
                        <form action="{{ route('todos.update' , ['todo' => $todo->id]) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" id="title" name="title" class="form-control 
                                    @error('title') form-control-invalid @enderror" value="{{ $todo->title }}">
                            </div>
                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea id="description" name="description" class="form-control 
                                    @error('description') form-control-invalid @enderror">{{ $todo->description }}</textarea>
                            </div>
                            <div class="d-flex justify-content-between align-items-center my-3">
                                <button class="btn btn-dark" type="submit">ویرایش</button>
                                <a class="btn btn-outline-dark" href="{{route('todos.index')}}">انصراف</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection