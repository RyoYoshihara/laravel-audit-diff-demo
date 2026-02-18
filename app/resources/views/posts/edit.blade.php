@extends('layouts.app')

@section('content')
  <div class="row" style="justify-content:space-between; align-items:center;">
    <h1 style="margin:0;">Edit Post #{{ $post->id }}</h1>
    <a class="btn secondary" href="{{ route('posts.index') }}">Back</a>
  </div>

  <div class="card" style="margin-top:12px;">
    <form method="POST" action="{{ route('posts.update', $post) }}" class="stack">
      @csrf
      @method('PUT')

      <div>
        <label>Title</label>
        <input name="title" value="{{ old('title', $post->title) }}" placeholder="B">
        @error('title') <div class="muted">{{ $message }}</div> @enderror
      </div>

      <div>
        <label>Password (mask demo)</label>
        <input name="password" value="{{ old('password', $post->password) }}" placeholder="new">
        @error('password') <div class="muted">{{ $message }}</div> @enderror
      </div>

      <div class="row">
        <button class="btn" type="submit">Update</button>
      </div>
    </form>
  </div>

  <p class="muted" style="margin-top:10px;">
    更新後、Audit Logs を開いて diff の記録を確認してください。
  </p>
@endsection
