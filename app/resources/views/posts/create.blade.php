@extends('layouts.app')

@section('content')
  <div class="row" style="justify-content:space-between; align-items:center;">
    <h1 style="margin:0;">Create Post</h1>
    <a class="btn secondary" href="{{ route('posts.index') }}">Back</a>
  </div>

  <div class="card" style="margin-top:12px;">
    <form method="POST" action="{{ route('posts.store') }}" class="stack">
      @csrf

      <div>
        <label>Title</label>
        <input name="title" value="{{ old('title') }}" placeholder="A">
        @error('title') <div class="muted">{{ $message }}</div> @enderror
      </div>

      <div>
        <label>Password (mask demo)</label>
        <input name="password" value="{{ old('password') }}" placeholder="old">
        @error('password') <div class="muted">{{ $message }}</div> @enderror
      </div>

      <div class="row">
        <button class="btn" type="submit">Save</button>
      </div>
    </form>
  </div>
@endsection
