@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Campaign</div>

                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('campaigns.update', $campaign->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Campaign Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', ($campaign->name ?? '')) }}" required>
                                @if($errors->has('name'))
                                    <div class="error"><small>{{ $errors->first('name') }}</small></div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Campaign Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $campaign->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Campaign</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
