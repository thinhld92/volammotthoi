<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SonHaMapController extends Controller
{
    public function edit()
    {
        $mapConfig = getSonHaMapConfig();
        $recentPosts = Post::query()
            ->where('status', 1)
            ->orderBy('published_at', 'desc')
            ->limit(60)
            ->get(['id', 'title', 'slug']);

        return view('backend.sonha_map.edit', compact('mapConfig', 'recentPosts'));
    }

    public function update(Request $request)
    {
        $defaults = defaultSonHaMapConfig();
        $inputPins = $request->input('pins', []);
        $savedPins = [];

        foreach ($defaults['pins'] as $idx => $defPin) {
            $row = $inputPins[$idx] ?? [];
            $x = isset($row['x']) ? (int) $row['x'] : $defPin['x'];
            $y = isset($row['y']) ? (int) $row['y'] : $defPin['y'];

            $savedPins[$idx] = [
                'key' => $defPin['key'],
                'name' => trim((string) ($row['name'] ?? $defPin['name'])) ?: $defPin['name'],
                'subtitle' => trim((string) ($row['subtitle'] ?? '')),
                'schedule' => trim((string) ($row['schedule'] ?? '')),
                'rewards' => trim((string) ($row['rewards'] ?? '')),
                'description' => trim((string) ($row['description'] ?? '')),
                'link_text' => trim((string) ($row['link_text'] ?? 'Xem Chi Tiết')) ?: 'Xem Chi Tiết',
                'link_url' => trim((string) ($row['link_url'] ?? '/home')) ?: '/home',
                'x' => max(5, min(95, $x)),
                'y' => max(8, min(92, $y)),
                'enabled' => !empty($row['enabled']),
            ];
        }

        $payload = [
            'status_bar' => trim((string) $request->input('status_bar', '')),
            'pins' => $savedPins,
        ];

        $path = storage_path('app/sonha_map_pins.json');
        File::put($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return redirect()
            ->route('admin.sonha-map.edit')
            ->with('success', 'Đã lưu cấu hình Bản Đồ Sơn Hà Xã Tắc thành công!');
    }

    public function reset()
    {
        $path = storage_path('app/sonha_map_pins.json');
        if (File::exists($path)) {
            File::delete($path);
        }

        return redirect()
            ->route('admin.sonha-map.edit')
            ->with('success', 'Đã khôi phục cấu hình Bản Đồ Sơn Hà Xã Tắc về mặc định!');
    }
}
