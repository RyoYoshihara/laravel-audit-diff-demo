@extends('layouts.app')

@section('content')
  <div class="row" style="justify-content:space-between; align-items:center;">
    <h1 style="margin:0;">Audit Logs</h1>
    <span class="pill">table: audit_logs</span>
  </div>

  <div class="card" style="margin-top:12px;">
    <table>
      <thead>
        <tr>
          <th style="width:80px;">ID</th>
          <th>Auditable</th>
          <th style="width:120px;">Event</th>
          <th style="width:240px;">Actor</th>
          <th style="width:180px;">Created</th>
          <th style="width:110px;"></th>
        </tr>
      </thead>
      <tbody>
        @forelse($logs as $log)
          <tr>
            <td>#{{ $log->id }}</td>
            <td>
              <div><strong>{{ $log->auditable_type }}</strong></div>
              <div class="muted">id: {{ $log->auditable_id }}</div>
            </td>
            <td>
              @php
                $event = $log->event ?? '';
                $label = strtoupper($event);
              @endphp
              <span class="pill">{{ $label }}</span>
            </td>
            <td class="muted">
              @if($log->actor_type && $log->actor_id)
                <span class="pill">{{ $log->actor_type }}</span>
                <span style="margin-left:6px;">{{ $log->actor_id }}</span>
              @else
                —
              @endif
            </td>
            <td class="muted">{{ $log->created_at }}</td>
            <td>
              <a class="btn secondary" href="{{ route('audit-logs.show', $log->id) }}">View</a>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="muted">No logs.</td></tr>
        @endforelse
      </tbody>
    </table>

    <div style="margin-top:12px;">
      {{ $logs->links() }}
    </div>
  </div>
@endsection
