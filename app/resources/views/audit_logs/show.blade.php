@extends('layouts.app')

@section('content')
  <div class="row" style="justify-content:space-between; align-items:center;">
    <h1 style="margin:0;">Audit Log #{{ $log->id }}</h1>
    <a class="btn secondary" href="{{ route('audit-logs.index') }}">Back</a>
  </div>

  <div class="card" style="margin-top:12px;">
    <div class="row">
      <div>
        <div class="muted">Auditable</div>
        <div><strong>{{ $log->auditable_type }}</strong> <span class="muted">#{{ $log->auditable_id }}</span></div>
      </div>
      <div>
        <div class="muted">Event</div>
        @php
          $event = $log->event;
          $class = match($event) {
              'created' => 'pill pill-success',
              'updated' => 'pill pill-info',
              'deleted' => 'pill pill-danger',
              default => 'pill'
          };
        @endphp
        <span class="{{ $class }}">{{ strtoupper($event) }}</span>
      </div>
      <div>
        <div class="muted">Actor</div>
        <div class="muted">{{ $log->actor_type ? $log->actor_type . ' #' . $log->actor_id : '—' }}</div>
      </div>
      <div>
        <div class="muted">Created</div>
        <div class="muted">{{ $log->created_at }}</div>
      </div>
    </div>

    <hr style="border:none; border-top:1px solid #e5e7eb; margin:14px 0;">

    @php
    $event = $log->event ?? '';
    $title = $event === 'updated'
        ? 'Diff'
        : ($event === 'created'
            ? 'Created Snapshot'
            : ($event === 'deleted'
                ? 'Deleted Snapshot'
                : 'Changes'));
    @endphp

    <h3 style="margin:0 0 10px;">{{ $title }}</h3>

    <table>
      <thead>
        <tr>
          <th style="width:200px;">Field</th>
          <th>Before</th>
          <th>After</th>
        </tr>
      </thead>
      <tbody>
        @forelse($rows as $r)
          <tr>
            <td><strong>{{ $r['field'] }}</strong></td>
            <td class="muted">{{ is_scalar($r['before']) || is_null($r['before']) ? var_export($r['before'], true) : json_encode($r['before'], JSON_UNESCAPED_UNICODE) }}</td>
            <td class="muted">{{ is_scalar($r['after']) || is_null($r['after']) ? var_export($r['after'], true) : json_encode($r['after'], JSON_UNESCAPED_UNICODE) }}</td>
          </tr>
        @empty
          <tr><td colspan="3" class="muted">No diff.</td></tr>
        @endforelse
      </tbody>
    </table>

    <h3 style="margin:18px 0 10px;">Request Meta</h3>
    <div class="muted">URL: {{ $log->url ?? '—' }}</div>
    <div class="muted">Method: {{ $log->method ?? '—' }}</div>
    <div class="muted">IP: {{ $log->ip ?? '—' }}</div>
    <div class="muted">UA: {{ $log->user_agent ?? '—' }}</div>

    <h3 style="margin:18px 0 10px;">Raw JSON</h3>
    <pre>{{ $log->diff }}</pre>
  </div>
@endsection
