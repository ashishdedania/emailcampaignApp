@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Email Template</div>

                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('email-templates.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Template Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                @if($errors->has('name'))
                                    <div class="error"><small>{{ $errors->first('name') }}</small></div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="subject">Template Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="body">Template Body</label>
                                <textarea class="form-control" id="body" name="body" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Template</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
