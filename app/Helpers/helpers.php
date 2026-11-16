<?php

use App\Models\Category;
use App\Models\WebsiteConfig;
use Illuminate\Database\Eloquent\Collection;

function parseMultiCategories($categories){
  $collections =  new Collection();
  $level = 0;
  foreach($categories as $category){
    $category->level = $level;
    $collections->add($category);
    foreach ($category->childrenCategories as $childCategory) {
      dequyCategory($collections, $childCategory, $level);
    }
  }
  return $collections;
}

function dequyCategory(&$collections, $category, $level){
  $category->level = ++$level;
  $collections->add($category);
  foreach ($category->childrenCategories as $childCategory) {
    dequyCategory($collections, $childCategory, $level);
  }
}

// recommend cách 2 này
function arrangeCategories($categories, $level = 0){
  $collections = new Collection();
  foreach ($categories as $category) {
    $category->level = $level;
    $collections->add($category);
    recursiveCategories($category->childrenCategories, $collections, $level);
 }
 return $collections;
}

function recursiveCategories($categories, $collections, $level){
  $level++;
  foreach ($categories as $category) {
    $category->level = $level;
    $collections->add($category);
    recursiveCategories($category->childrenCategories, $collections, $level);
  } 
}

function arrangeBreadCrumb($category){
  $collections = new Collection();
  if ($category) {
    $collections->add($category);
    if ($category->parentsCategory) {
      recursiveBreadCrumb($category->parentsCategory, $collections);
    }
  }
  return $collections->reverse();
}

function recursiveBreadCrumb($category, $collections){
  $collections->add($category);
  if ($category->parentsCategory) {
    recursiveBreadCrumb($category->parentsCategory, $collections);
  }
}

function getWebsiteConfig($config_name){
  $config = WebsiteConfig::where('config_name', $config_name)->first();
  if (!$config) {
    return null;
  }
  else
  return $config->config_value;
  
}

function isModernLayout(): bool
{
  return (int) getWebsiteConfig('layout_website') === 2;
}

function themeView(array $views, string $default): string
{
  $layout = (int) getWebsiteConfig('layout_website');
  return $views[$layout] ?? $default;
}

function layoutView(string $v1, string $v2, ?string $v3 = null, ?string $v4 = null, ?string $v5 = null): string
{
  return themeView(array_filter([
    1 => $v1,
    2 => $v2,
    3 => $v3,
    4 => $v4,
    5 => $v5,
  ]), $v1);
}

function defaultSonHaMapConfig(): array
{
  return [
    'status_bar' => 'Trạng Thái Hoạt Động: Tống Kim Đại Chiến 21:00',
    'pins' => [
      [
        'key' => 'tong_kim',
        'name' => 'Chiến Trường Tống Kim',
        'subtitle' => 'Sự Kiện Giờ Vàng Rực Lửa',
        'schedule' => '13:00 • 19:00 • 21:00 Hàng Ngày',
        'rewards' => 'Điểm Tích Lũy • Bảo Rương • Thủy Tinh',
        'description' => 'Đại chiến Tống - Kim quy tụ quần hùng tranh đoạt nguyên soái, tích lũy công trạng đổi thưởng quý hiếm.',
        'link_text' => 'Xem Sự Kiện',
        'link_url' => '/home',
        'x' => 24,
        'y' => 31,
        'enabled' => true,
      ],
      [
        'key' => 'bien_kinh',
        'name' => 'Biện Kinh Phủ',
        'subtitle' => 'Kinh Thành Công Thành Chiến',
        'schedule' => '20:00 Thứ Sáu Hàng Tuần',
        'rewards' => 'Thuế Thành Thị • Danh Hiệu Bang Chủ',
        'description' => 'Trung tâm giao thương sầm uất bậc nhất giang hồ và là chiến trường Thất Thành Đại Chiến định đoạt thiên hạ.',
        'link_text' => 'Xem Bảng Tin',
        'link_url' => '/home',
        'x' => 56,
        'y' => 37,
        'enabled' => true,
      ],
      [
        'key' => 'hoa_son',
        'name' => 'Hoa Sơn Luận Kiếm',
        'subtitle' => 'Đỉnh Cao Đấu Trường PK',
        'schedule' => '20:00 Cuối Tuần • Săn Boss 19:30',
        'rewards' => 'Vòng Sáng Độc Tôn • Trang Bị Xanh',
        'description' => 'Nơi cao thủ thập đại môn phái tỷ thí tuyệt học Ngũ Hành tương khắc, tranh ngôi Võ Lâm Minh Chủ.',
        'link_text' => 'Xem Cẩm Nang',
        'link_url' => '/home',
        'x' => 21,
        'y' => 54,
        'enabled' => true,
      ],
      [
        'key' => 'phong_lang_do',
        'name' => 'Phong Lăng Độ',
        'subtitle' => 'Bến Thuyền Đoạt Boss Thủy Tặc',
        'schedule' => 'Các Giờ Chẵn (10:00 - 22:00)',
        'rewards' => 'Tinh Hồng Bảo Thạch • Bí Kíp 9x',
        'description' => 'Chuyến thuyền sinh tử vượt sông Hoàng Hà, tiêu diệt Thủy Tặc Đầu Lĩnh săn tìm kỳ trân dị bảo.',
        'link_text' => 'Xem Hướng Dẫn',
        'link_url' => '/home',
        'x' => 48,
        'y' => 67,
        'enabled' => true,
      ],
      [
        'key' => 'lam_an',
        'name' => 'Lâm An Phủ',
        'subtitle' => 'Nam Tống Phồn Hoa & Dã Tẩu',
        'schedule' => 'Hoạt Động Cả Ngày (24/7)',
        'rewards' => 'Kinh Nghiệm • Tiền Vạn • Đồ Phổ',
        'description' => 'Kinh đô phương Nam tấp nập chuỗi nhiệm vụ Dã Tẩu, Lễ Quan phát thưởng và bang hội chiêu mộ tân thủ.',
        'link_text' => 'Đăng Ký Ngay',
        'link_url' => '/register',
        'x' => 74,
        'y' => 65,
        'enabled' => true,
      ],
    ],
  ];
}

function getSonHaMapConfig(): array
{
  $defaults = defaultSonHaMapConfig();
  $path = storage_path('app/sonha_map_pins.json');
  if (!file_exists($path)) {
    return $defaults;
  }
  $decoded = json_decode((string) file_get_contents($path), true);
  if (!is_array($decoded)) {
    return $defaults;
  }

  $result = [
    'status_bar' => $decoded['status_bar'] ?? $defaults['status_bar'],
    'pins' => [],
  ];

  foreach ($defaults['pins'] as $idx => $defPin) {
    $saved = $decoded['pins'][$idx] ?? [];
    $result['pins'][$idx] = array_merge($defPin, is_array($saved) ? $saved : []);
    $result['pins'][$idx]['enabled'] = !empty($result['pins'][$idx]['enabled']);
  }

  return $result;
}

function cPasswordEncode($password){
  $passbase64 = base64_encode($password);
  $pass1 = mb_substr($passbase64, 0,3);
  $pass2 = mb_substr($passbase64, 3);
  return mb_substr(md5(uniqid().time()),8,8) . $pass2 . mb_substr(md5(uniqid().time()),8,8) . $pass1 . mb_substr(md5(uniqid().time()),8,8);
}

function cPasswordDecode($passwordEndcode){
  $passDecode = mb_substr($passwordEndcode, 8, -8);
  $passDecode1 = mb_substr($passDecode, -3);
  $passDecode2 = mb_substr($passDecode, 0, -11);
  return base64_decode($passDecode1.$passDecode2);
}