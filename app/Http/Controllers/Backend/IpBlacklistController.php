<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\IpBlacklist;
use Illuminate\Http\Request;

class IpBlacklistController extends Controller
{
    /**
     * Display a listing of blacklisted IPs.
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $query = IpBlacklist::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('ip', 'like', "%{$search}%")
                  ->orWhere('reason', 'like', "%{$search}%");
            });
        }

        $blacklists = $query->orderBy('created_at', 'desc')->paginate(15);
        $blacklists->appends(['search' => $search]);

        return view('backend.ip_blacklists.index', compact('blacklists', 'search'));
    }

    /**
     * Show the form for creating a new blacklisted IP.
     */
    public function create(Request $request)
    {
        $ip = $request->get('ip', '');
        return view('backend.ip_blacklists.create', compact('ip'));
    }

    /**
     * Store a newly created blacklisted IP in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'ip' => ['required', 'ip', 'unique:ip_blacklists,ip'],
            'reason' => ['nullable', 'string', 'max:255'],
        ];

        $messages = [
            'required' => ':attribute không được để trống.',
            'ip' => ':attribute không đúng định dạng IPv4/IPv6.',
            'unique' => ':attribute này đã có trong danh sách đen.',
            'max' => ':attribute vượt quá :max ký tự.',
        ];

        $attributes = [
            'ip' => 'Địa chỉ IP',
            'reason' => 'Lý do chặn',
        ];

        $request->validate($rules, $messages, $attributes);

        IpBlacklist::create([
            'ip' => trim($request->ip),
            'reason' => $request->reason,
        ]);

        return redirect()->route('admin.ip-blacklists.index')->with('success', 'Đã thêm IP vào danh sách đen thành công!');
    }

    /**
     * Remove the specified blacklisted IP from storage.
     */
    public function destroy(IpBlacklist $ipBlacklist)
    {
        $ipBlacklist->delete();
        return redirect()->route('admin.ip-blacklists.index')->with('success', 'Đã xóa IP khỏi danh sách đen thành công!');
    }
}
