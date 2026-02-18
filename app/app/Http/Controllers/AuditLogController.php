<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AuditLogController extends Controller
{
    public function index()
    {
        $logs = DB::table('audit_logs')
            ->orderByDesc('id')
            ->paginate(20);

        return view('audit_logs.index', compact('logs'));
    }

    public function show(int $id)
    {
        $log = DB::table('audit_logs')->where('id', $id)->first();
        abort_unless($log, 404);

        $diff = json_decode($log->diff ?? 'null', true);
        $before = json_decode($log->before ?? 'null', true);
        $after = json_decode($log->after ?? 'null', true);

        $rows = [];

        // updated: diff から rows を作る
        if (is_array($diff)) {
            foreach ($diff as $field => $pair) {
                $rows[] = [
                    'field' => (string)$field,
                    'before' => $pair['before'] ?? null,
                    'after' => $pair['after'] ?? null,
                ];
            }
        }

        // created: after snapshot を rows 化（全項目）
        if (($log->event ?? '') === 'created' && is_array($after)) {
            foreach ($after as $field => $val) {
                $rows[] = [
                    'field' => (string)$field,
                    'before' => null,
                    'after' => $val,
                ];
            }
        }

        // deleted: before snapshot を rows 化（全項目）
        if (($log->event ?? '') === 'deleted' && is_array($before)) {
            foreach ($before as $field => $val) {
                $rows[] = [
                    'field' => (string)$field,
                    'before' => $val,
                    'after' => null,
                ];
            }
        }

        return view('audit_logs.show', compact('log', 'rows'));
    }

}
