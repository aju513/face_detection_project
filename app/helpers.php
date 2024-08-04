<?php


if (!function_exists('file_size_helper')) {
    function file_size_helper($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }
        return $bytes;
    }
}

if (!function_exists('get_server_memory_usage')) {
    function get_server_memory_usage()
    {
        $usage = memory_get_usage();
        return file_size_helper($usage);
    }
}

if (!function_exists('get_server_cpu_usage')) {
    function get_server_cpu_usage()
    {
        $os = PHP_OS;
        if ($os === "WINNT") {
            return 0;
        }
        $exec_loads = sys_getloadavg();
        if (isset($exec_loads[0])) {
            return round($exec_loads[0], 2);
        }
        return 'N/A';
    }
}

if (!function_exists('get_disk_free_space')) {
    function get_disk_free_space()
    {
        $df = diskfreespace('/');
        return file_size_helper($df);
    }
}

if (!function_exists('language_helper')) {
    function language_helper()
    {
        return ['नेपाली' => 'np', 'English' => 'en'];
    }
}

if (!function_exists('language_name_helper')) {
    function language_name_helper($key)
    {
        $langs =  [
            'en' => 'English',
            'np' => 'नेपाली'
        ];
        return $langs[$key];
    }
}

if (!function_exists('nepali_number')) {
    function nepali_number($string)
    {
        $locale = app('translator')->getLocale();
        if ($locale !== "np") {
            return $string;
        }
        $numbers = [
            '1' => '१',
            '2' => '२',
            '3' => '३',
            '4' => '४',
            '5' => '५',
            '6' => '६',
            '7' => '७',
            '8' => '८',
            '9' => '९',
            '0' => '०',
        ];

        $characters = str_split($string);
        foreach ($characters as $key => $character) {
            if (isset($numbers[$character])) {
                $characters[$key] = $numbers[$character];
            }
        }
        return implode('', $characters);
    }
}

if (!function_exists('nepali_number_span')) {
    function nepali_number_span($string)
    {
        return "<span style='font-family: sans-serif'>" . nepali_number($string) . "</span>";
    }
}

if (!function_exists('__')) {
    function __(string $key = null, array $replace = [], string $locale = null)
    {
        dd($key, $replace, $locale);
        if (is_null($key)) {
            return $key;
        }
        return trans($key, $replace, $locale);
    }
}

if (!function_exists('getLocaleChangerName')) {
    function getLocaleChangerName()
    {
        $locale = app('translator')->getLocale();
        if ($locale === 'en') {
            return 'np';
        }
        return 'en';
    }
}

if (!function_exists('dbConn')) {
    function dbConn()
    {
        try {
            $db = \Illuminate\Support\Facades\DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}

if (!function_exists('ym_input')) {

    function ym_input($params)
    {
        return view('admin.layouts.components.forms.input', $params);
    }
}

if (!function_exists('ym_select')) {

    function ym_select($params)
    {
        return view('admin.layouts.components.forms.select', $params);
    }
}


if (!function_exists('ym_select2')) {

    function ym_select2($params)
    {
        return view('admin.layouts.components.forms.select2', $params);
    }
}

if (!function_exists('ym_radio')) {

    function ym_radio($params)
    {
        return view('admin.layouts.components.forms.radio', $params);
    }
}

if (!function_exists('ym_textarea')) {

    function ym_textarea($params)
    {
        return view('admin.layouts.components.forms.textarea', $params);
    }
}

if (!function_exists('ym_file')) {

    function ym_file($params)
    {
        return view('admin.layouts.components.forms.file', $params);
    }
}

if (!function_exists('ym_lang_input')) {

    function ym_lang_input($params)
    {
        return view('admin.layouts.components.languages.input', $params);
    }
}

if (!function_exists('ym_lang_textarea')) {

    function ym_lang_textarea($params)
    {
        return view('admin.layouts.components.languages.textarea', $params);
    }
}

if (!function_exists('ym_location')) {

    function ym_location($params)
    {
        return view('admin.layouts.components.forms.location', $params);
    }
}

if (!function_exists('ym_date')) {

    function ym_date($params)
    {
        return view('admin.layouts.components.forms.date', $params);
    }
}

if (!function_exists('getMethod')) {

    function getMethod($model)
    {
        return $model->exists ? 'PUT' : 'POST';
    }
}
