@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{isset($category) ? 'Edit category' : 'Create category'}}
                    </div>

                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-group">
                                    @foreach($errors->all() as $error)
                                        <li class="list-group-item text-danger">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action = {{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }} method="POST">
                            @csrf
                            @if (isset($category))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder = "Name" name = "name" value = " {{ isset($category) ? $category ->name : '' }}">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">
                                    {{ isset($category) ? 'Update category' : 'Create category' }}
                                </button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
