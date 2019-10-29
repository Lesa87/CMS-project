@extends('layouts.app');
@section('content')
    <div class="d-flex justify-content-end">
        <a href={{ route('categories.create') }} class="btn btn-success mb-small">Add category</a>
    </div>

    <div class="card card-default">
        <div class="card-header">
            Categories
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                <th>Name</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td>
                                <a href="{{route('categories.edit', $category -> id)}}" class="btn btn-info btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <!--
             <ul class ="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item ">
                        {{$category->name}}
                        <a href = "categories/{{$category->id}}/edit"  class="btn btn-primary btn-sm float-right">Edit</a>
                        <a href = "categories/{{ $category->id }}/delete" class="btn btn-warning btn-sm float-right mr-2">Delete</a>
                    </li>
                @endforeach
            </ul>
           -->

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method = "POST" id = "deleteCategoryForm">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">
                                    Are you sure you want to delete this category?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                                <button type="submit" class="btn btn-danger">Yes, delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteCategoryForm')
            form.action = '/categories/' + id
            console.log('Deleting...' + id, form)
            $('#deleteModal').modal('show')
        }
    </script>
@endsection

