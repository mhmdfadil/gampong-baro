<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class KunjunganController extends Controller
{

    /**
     * Mendapatkan statistik kunjungan
     */
    public function getStats()
{
    $today = Kunjungan::today()->count();
    $yesterday = Kunjungan::yesterday()->count();
    $week = Kunjungan::thisWeek()->count();
    $lastWeek = Kunjungan::lastWeek()->count();
    $month = Kunjungan::thisMonth()->count();
    $lastMonth = Kunjungan::lastMonth()->count();
    $thisYear = Kunjungan::thisYear()->count(); // Tambahkan ini
    $lastYear = Kunjungan::lastYear()->count();

    return response()->json([
        'success' => true,
        'data' => [
            'today' => [
                'value' => $today,
                'previous' => $yesterday,
                'change' => $this->calculateChange($today, $yesterday),
                'is_increase' => $today > $yesterday,
                'label' => 'Hari Ini',
                'change_text' => 'dari kemarin'
            ],
            'week' => [
                'value' => $week,
                'previous' => $lastWeek,
                'change' => $this->calculateChange($week, $lastWeek),
                'is_increase' => $week > $lastWeek,
                'label' => 'Minggu Ini',
                'change_text' => 'dari minggu lalu'
            ],
            'month' => [
                'value' => $month,
                'previous' => $lastMonth,
                'change' => $this->calculateChange($month, $lastMonth),
                'is_increase' => $month > $lastMonth,
                'label' => 'Bulan Ini',
                'change_text' => 'dari bulan lalu'
            ],
            'year' => [  // Ganti dari 'total' menjadi 'year'
                'value' => $thisYear,
                'previous' => $lastYear,
                'change' => $this->calculateChange($thisYear, $lastYear),
                'is_increase' => $thisYear > $lastYear,
                'label' => 'Tahun Ini',
                'change_text' => 'dari tahun lalu'
            ],
            'total' => [  // Tambahkan total terpisah jika diperlukan
                'value' => Kunjungan::count(),
                'label' => 'Total Kunjungan'
            ]
        ]
    ]);
}

    private function calculateChange($current, $previous)
    {
        if ($previous == 0) return 0;
        return round((($current - $previous) / $previous) * 100, 2);
    }
    protected $agent;
    
    public function __construct()
    {
        $this->agent = new Agent();
    }

    /**
     * Menyimpan data kunjungan baru
     */
    public function store(Request $request)
    {
        try {
            $this->agent->setUserAgent($request->userAgent());
            
            $data = [
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'path' => $request->path(),
                'referrer' => $request->header('referer'),
                'device' => $this->getDevice(),
                'platform' => $this->getPlatform(),
                'browser' => $this->getBrowser(),
                'is_desktop' => $this->agent->isDesktop(),
                'is_mobile' => $this->agent->isMobile(),
                'is_tablet' => $this->agent->isTablet(),
                'is_bot' => $this->agent->isRobot(),
                'is_smart_tv' => $this->isSmartTV(),
                'is_console' => $this->isConsole(),
                'is_wearable' => $this->isWearable(),
            ];

            Kunjungan::create($data);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Mendapatkan device dari user agent
     */
    private function getDevice()
    {
        if ($this->agent->isMobile()) {
            return 'Mobile';
        } elseif ($this->agent->isTablet()) {
            return 'Tablet';
        } elseif ($this->isSmartTV()) {
            return 'Smart TV';
        } elseif ($this->isConsole()) {
            return 'Game Console';
        } elseif ($this->isWearable()) {
            return 'Wearable';
        } elseif ($this->agent->isRobot()) {
            return 'Bot/Crawler';
        } else {
            return 'Desktop';
        }
    }

    /**
     * Mendapatkan platform dari user agent
     */
    private function getPlatform()
    {
        $platform = $this->agent->platform();
        
        // Mapping lebih spesifik untuk platform
        $mapping = [
            'Windows' => 'Windows',
            'Windows NT' => 'Windows',
            'Windows 10' => 'Windows 10',
            'Windows 8.1' => 'Windows 8.1',
            'Windows 8' => 'Windows 8',
            'Windows 7' => 'Windows 7',
            'Windows Vista' => 'Windows Vista',
            'Windows XP' => 'Windows XP',
            'Mac OS X' => 'Mac OS X',
            'Android' => 'Android',
            'iOS' => 'iOS',
            'iPadOS' => 'iPadOS',
            'Linux' => 'Linux',
            'Ubuntu' => 'Ubuntu',
            'Chrome OS' => 'Chrome OS',
            'BlackBerry' => 'BlackBerry OS',
            'Tizen' => 'Tizen',
            'webOS' => 'webOS',
            'PlayStation' => 'PlayStation',
            'Xbox' => 'Xbox',
            'Nintendo' => 'Nintendo',
        ];
        
        return $mapping[$platform] ?? $platform;
    }

    /**
     * Mendapatkan browser dari user agent
     */
    private function getBrowser()
    {
        $browser = $this->agent->browser();
        
        // Mapping lebih spesifik untuk browser
        $mapping = [
            'Chrome' => 'Chrome',
            'Safari' => 'Safari',
            'Firefox' => 'Firefox',
            'Edge' => 'Microsoft Edge',
            'IE' => 'Internet Explorer',
            'Opera' => 'Opera',
            'Vivaldi' => 'Vivaldi',
            'Brave' => 'Brave',
            'SamsungBrowser' => 'Samsung Browser',
            'UCBrowser' => 'UC Browser',
            'DuckDuckGo' => 'DuckDuckGo',
            'Facebook' => 'Facebook App',
            'Instagram' => 'Instagram App',
            'Twitter' => 'Twitter App',
            'WhatsApp' => 'WhatsApp',
        ];
        
        return $mapping[$browser] ?? $browser;
    }

    /**
     * Cek apakah Smart TV
     */
    private function isSmartTV()
    {
        return $this->agent->match('smart\-?tv|smart tv|appletv|apple tv|crkey|aftb|googletv|netcast\.tv|boxee|kylo|roku|hbbtv|pov_tv|philipstv|inettvbrowser|opera tv|tizen|viera|aquos|bravia|panasonic|samsung|lg tv|lg netcast|web0s|webos|tv|tvs');
    }

    /**
     * Cek apakah game console
     */
    private function isConsole()
    {
        return $this->agent->match('playstation|psp|ps vita|xbox|nintendo|wii|switch|ouya');
    }

    /**
     * Cek apakah wearable device
     */
    private function isWearable()
    {
        return $this->agent->match('watch|wear os|android wear|gear s|galaxy watch|galaxy fit|mi band|fitbit|garmin|huawei watch|amazfit|wearable');
    }
}