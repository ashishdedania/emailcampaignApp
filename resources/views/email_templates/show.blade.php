@extends('layouts.app')

@section('content')
<div class="container">
    <h1>View Email Template</h1>
    <div class="form-group">
        <label for="name">Template Name</label>
        <input type="text" class="form-control" id="name" value="{{ $emailTemplate->name }}" disabled>
    </div>
    <div class="form-group">
        <label for="subject">Template Subject</label>
        <input type="text" class="form-control" id="subject" value="{{ $emailTemplate->subject }}" disabled>
    </div>
    <div class="form-group">
        <label for="body">Template Body</label>
        <textarea class="form-control" id="body" rows="4" disabled>{{ $emailTemplate->body }}</textarea>
    </div>
    <a href="{{ route('email-templates.index') }}" class="btn btn-primary">Back to Templates</a>
</div>
@endsection
