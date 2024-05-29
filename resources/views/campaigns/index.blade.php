@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Email Campaigns</div>

                <div class="card-body">
                    <div class="container">
                        <a href="{{ route('campaigns.create') }}" class="btn btn-primary">Create Campaign</a>
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($campaigns as $campaign)
                                <tr>
                                    <td>{{ $campaign->id }}</td>
                                    <td>{{ $campaign->name }}</td>
                                    <td>{{ $campaign->description }}</td>
                                    <td>
                                        <a href="{{ route('campaigns.edit', $campaign) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('campaigns.destroy', $campaign) }}" method="POST" style="display:inline;">
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
