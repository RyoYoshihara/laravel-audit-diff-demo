@extends('layouts.app')

@section('content')
  <div class="row" style="justify-content:space-between; align-items:center;">
    <h1 style="margin:0;">Posts</h1>
    <a class="btn" href="{{ route('posts.create') }}">Create</a>
  </div>

  <div class="card" style="margin-top:12px;">
    <table>
      <thead>
        <tr>
          <th style="width:90px;">ID</th>
          <th>Title</th>
          <th style="width:180px;">Updated</th>
          <th style="width:120px;"></th>
        </tr>
      </thead>
      <tbody>
        @forelse($posts as $post)
          <tr>
            <td>#{{ $post->id }}</td>
            <td>{{ $post->title ?? '—' }}</td>
            <td class="muted">{{ $post->updated_at }}</td>
            <td>
              <a class="btn secondary" href="{{ route('posts.edit', $post) }}">Edit</a>
            </td>
          </tr>
        @empty
          <tr><td colspan="4" class="muted">No posts.</td></tr>
        @endforelse
      </tbody>
    </table>

    <div style="margin-top:12px;">
      {{ $posts->links() }}
    </div>
  </div>

  <p class="muted" style="margin-top:10px;">
    Post を更新すると audit_logs に diff が保存されます。password は *** にマスクされます。
  </p>
@endsection
