<?php

if (!function_exists('str_limit')) {
    function str_limit($string, $limit = 100, $end = '...')
    {
        return \Illuminate\Support\Str::limit($string, $limit, $end);
    }
}

if (!function_exists('line_clamp')) {
    function line_clamp($string, $lines = 3)
    {
        $linesArray = explode("\n", $string);
        if (count($linesArray) <= $lines) {
            return $string;
        }
        
        return implode("\n", array_slice($linesArray, 0, $lines)) . '...';
    }
}

if (!function_exists('arabic_date')) {
    function arabic_date($date, $format = 'Y-m-d')
    {
        $carbon = \Carbon\Carbon::parse($date);
        $months = [
            'Jan' => 'يناير', 'Feb' => 'فبراير', 'Mar' => 'مارس', 'Apr' => 'أبريل',
            'May' => 'مايو', 'Jun' => 'يونيو', 'Jul' => 'يوليو', 'Aug' => 'أغسطس',
            'Sep' => 'سبتمبر', 'Oct' => 'أكتوبر', 'Nov' => 'نوفمبر', 'Dec' => 'ديسمبر'
        ];
        
        $formatted = $carbon->format($format);
        foreach ($months as $en => $ar) {
            $formatted = str_replace($en, $ar, $formatted);
        }
        
        return $formatted;
    }
}

if (!function_exists('format_number')) {
    function format_number($number)
    {
        return number_format($number, 0, '.', ',');
    }
}

if (!function_exists('get_user_role_name')) {
    function get_user_role_name($role)
    {
        $roles = [
            'admin' => 'مدير النظام',
            'campaign_manager' => 'مدير حملات',
            'user' => 'مستخدم'
        ];
        
        return $roles[$role] ?? 'غير محدد';
    }
}

if (!function_exists('generate_slug')) {
    function generate_slug($text)
    {
        $text = preg_replace('/[^a-zA-Z0-9\s-]/', '', $text);
        $text = preg_replace('/[\s-]+/', ' ', $text);
        $text = trim($text);
        $text = preg_replace('/[\s_]/', '-', $text);
        $text = strtolower($text);
        
        return $text ?: str_random(10);
    }
}

if (!function_exists('is_rtl')) {
    function is_rtl($text)
    {
        $rtl_chars = '\x{0590}-\x{05FF}\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}';
        
        return preg_match("/[$rtl_chars]/u", $text);
    }
}

if (!function_exists('asset_url')) {
    function asset_url($path)
    {
        return asset($path) . '?v=' . md5_file(public_path($path));
    }
}
