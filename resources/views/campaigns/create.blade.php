@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Campaign</div>

                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('campaigns.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Campaign Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                @if($errors->has('name'))
                                    <div class="error"><small>{{ $errors->first('name') }}</small></div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Campaign Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Campaign</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
