@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit category</div>

                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-group">
                                    @foreach($errors->all() as $error)
                                        <li class="list-group-item">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <form action = "/categories/{{$category->id}}}/update" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control"name = "name" value = {{$category->name}}>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-success">Update category</button>
                                </div>
                            </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
