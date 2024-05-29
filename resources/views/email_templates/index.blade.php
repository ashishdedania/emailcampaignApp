@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Email Templates</div>

                <div class="card-body">
                    <div class="container">
                        
                        <a href="{{ route('email-templates.create') }}" class="btn btn-primary">Create Email Template</a>
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($emailTemplates as $template)
                                <tr>
                                    <td>{{ $template->id }}</td>
                                    <td>{{ $template->name }}</td>
                                    <td>{{ $template->subject }}</td>
                                    <td>
                                        <a href="{{ route('email-templates.edit', $template) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('email-templates.destroy', $template) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
