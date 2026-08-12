<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAuditLogController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\UserAuditLog::with('user')->orderBy('id', 'desc');
        
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function($q) use ($keyword) {
                $q->where('cAccName', 'like', "%{$keyword}%")
                  ->orWhere('ip_address', 'like', "%{$keyword}%");
            });
        }
        
        if ($request->filled('action_type')) {
            $query->where('action_type', $request->action_type);
        }

        $logs = $query->paginate(20);
        return view('backend.user_audit_logs.index', compact('logs'));
    }
}
