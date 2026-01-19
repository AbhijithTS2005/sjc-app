<?php

/**
 * Platform Detection Helpers
 */

if (!function_exists('detectAppUrl')) {
    /**
     * Detect application URL based on environment
     */
    function detectAppUrl()
    {
        $envUrl = env('APP_URL');
        
        // If APP_URL is explicitly set, use it
        if ($envUrl && $envUrl !== '') {
            return $envUrl;
        }

        // Auto-detect from current request
        if (php_sapi_name() !== 'cli') {
            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
            $host = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? 'localhost';
            return $protocol . '://' . $host;
        }

        return 'http://localhost';
    }
}

if (!function_exists('detectPlatform')) {
    /**
     * Detect current hosting platform
     */
    function detectPlatform()
    {
        $config = config('platforms.platforms');
        $host = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? 'localhost';

        foreach ($config as $platform => $settings) {
            foreach ($settings['domains'] as $domain) {
                if (strpos($host, $domain) !== false) {
                    return $platform;
                }
            }
        }

        return 'local';
    }
}

if (!function_exists('getPlatformConfig')) {
    /**
     * Get configuration for current platform
     */
    function getPlatformConfig()
    {
        $platform = detectPlatform();
        return config('platforms.platforms.' . $platform, []);
    }
}
