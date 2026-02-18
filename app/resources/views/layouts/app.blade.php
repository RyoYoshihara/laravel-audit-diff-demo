<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>laravel-audit-diff demo</title>
  <style>
    body { font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto; margin: 0; background:#f6f7f9; }
    header { background:#111827; color:#fff; padding:16px 20px; }
    header a { color:#fff; text-decoration:none; margin-right:12px; opacity:.9; }
    header a:hover { opacity:1; text-decoration:underline; }
    main { max-width: 1100px; margin: 20px auto; padding: 0 16px; }
    .card { background:#fff; border:1px solid #e5e7eb; border-radius:12px; padding:16px; }
    .row { display:flex; gap:12px; flex-wrap:wrap; }
    .btn { display:inline-block; padding:8px 12px; border-radius:10px; border:1px solid #111827; background:#111827; color:#fff; text-decoration:none; }
    .btn.secondary { background:#fff; color:#111827; }
    table { width:100%; border-collapse: collapse; }
    th, td { padding:10px; border-bottom:1px solid #e5e7eb; text-align:left; vertical-align: top; }
    th { background:#f9fafb; font-weight:600; }
    .muted { color:#6b7280; font-size: 12px; }
    .flash { padding:10px 12px; border-radius:10px; background:#ecfeff; border:1px solid #a5f3fc; margin-bottom:12px; }
    input { width:100%; padding:10px; border-radius:10px; border:1px solid #d1d5db; }
    label { display:block; font-size: 12px; color:#374151; margin-bottom:6px; }
    .stack { display:grid; gap:12px; }
    .pill { display:inline-block; padding:2px 8px; border:1px solid #e5e7eb; border-radius:999px; font-size:12px; background:#fff; }
    pre { background:#0b1020; color:#e5e7eb; padding:12px; border-radius:10px; overflow:auto; }
    .pill-success { background:#dcfce7; color:#166534; }
    .pill-info { background:#dbeafe; color:#1e40af; }
    .pill-danger { background:#fee2e2; color:#991b1b; }
  </style>
</head>
<body>
<header>
  <div style="display:flex; align-items:center; justify-content:space-between;">
    <div>
      <strong>laravel-audit-diff demo</strong>
      <span class="muted" style="margin-left:10px; color:#cbd5e1;">AuditDiff\\Laravel</span>
    </div>
    <nav>
      <a href="{{ route('posts.index') }}">Posts</a>
      <a href="{{ route('audit-logs.index') }}">Audit Logs</a>
    </nav>
  </div>
</header>

<main>
  @if (session('status'))
    <div class="flash">{{ session('status') }}</div>
  @endif

  @yield('content')
</main>
</body>
</html>
