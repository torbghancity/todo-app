@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                @include('sections.errors')
                <div class="card">
                    <div class="card-header">
                        ایجاد تسک جدید
                    </div>
                    <div class="card-body">
                        <form action="{{ route('todos.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" id="title" name="title" class="form-control 
                                    @error('title') form-control-invalid @enderror" value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea id="description" name="description" class="form-control 
                                    @error('description') form-control-invalid @enderror">{{ old('description') }}</textarea>
                            </div>
                            <div class="d-flex justify-content-between align-items-center my-3">
                                <button class="btn btn-dark" type="submit">ارسال</button>
                                <a class="btn btn-outline-dark" href="{{route('todos.index')}}">انصراف</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection