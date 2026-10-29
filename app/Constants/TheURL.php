<?php

namespace App\Constants;

/**
 * URL Constants for NPG Application
 *
 * All URLs are now configured via environment variables.
 * Update your .env file to change URLs for different environments.
 *
 * @see config/urls.php for URL configuration
 */
class TheURL
{
    /**
     * Indicates if the static properties have been initialized
     */
    private static bool $initialized = false;

    // Base URLs
    public static string $BASE_ADMIN = '';

    public static string $BASE_MEMBER = '';

    public static string $BASE_API = '';

    // Web URLs
    public static string $WEB_HOME = '';

    public static string $WEB_PLAY_VIDEO = '';

    public static string $WEB_PLAY_VIDEO_ANDROID = '';

    public static string $WEB_ACCESS_CONTENT = '';

    // Authentication APIs
    public static string $API_LOGIN = '';

    public static string $API_LOGOUT = '';

    public static string $API_REGISTER = '';

    public static string $API_FORGOT_PWD = '';

    public static string $API_FORGOT_PASSWORD = '';

    public static string $API_RESET_PWD = '';

    public static string $API_RESET_PASSWORD = '';

    // Content APIs
    public static string $API_URL_WEB_CONTENT_LIST = '';

    public static string $API_URL_WEB_CONTENT_DETAIL = '';

    public static string $API_URL_CONTENT_SUMMARY = '';

    // Wallet APIs
    public static string $API_WALLET_LIST = '';

    public static string $API_WALLET_LIST_TRX = '';

    public static string $API_WALLET_DETAIL = '';

    public static string $API_WALLET_GET_WALLET_BALANCE = '';

    // Client APIs
    public static string $API_CLIENT_DETAIL = '';

    // Ticket APIs
    public static string $API_TICKET_LIST = '';

    public static string $API_TICKET_LIST_TRX = '';

    public static string $API_TICKET_DETAIL = '';

    public static string $API_TICKET_GET_TICKET_BALANCE = '';

    // Credit APIs
    public static string $API_CREDIT_LIST = '';

    public static string $API_CREDIT_LIST_TRX = '';

    public static string $API_CREDIT_DETAIL = '';

    public static string $API_CREDIT_GET_CREDIT_BALANCE = '';

    public static string $API_CREDIT_GET_SUMMARY_CLIENT = '';

    // Drawing APIs
    public static string $API_DRAWING_LIST_TRX = '';

    public static string $API_URL_DRAW_COUNTING = '';

    public static string $API_URL_DRAW_DETAIL = '';

    public static string $API_URL_WIN_LIST = '';

    // Voucher & Video APIs
    public static string $API_CHECK_VOUCHER_KEY = '';

    public static string $API_CHECK_VIDEO_KEY = '';

    public static string $API_LIBVID_LIST = '';

    public static string $API_LIBVOU_LIST = '';

    // Verification APIs
    public static string $API_VERIFY_REGISTER = '';

    /**
     * Initialize all static properties from configuration
     * This method is called automatically when the class is first accessed
     */
    public static function init(): void
    {
        if (self::$initialized) {
            return;
        }

        // Load base URLs from config
        $baseAdmin = config('urls.base.admin', 'http://localhost:8000');
        $baseMember = config('urls.base.web', 'http://localhost:8000');
        $baseApi = config('urls.base.api', 'http://localhost:8000');

        // Base URLs
        self::$BASE_ADMIN = $baseAdmin;
        self::$BASE_MEMBER = $baseMember;
        self::$BASE_API = $baseApi;

        // Web URLs
        self::$WEB_HOME = $baseMember.'/home';
        self::$WEB_PLAY_VIDEO = $baseMember.'/video/play';
        self::$WEB_PLAY_VIDEO_ANDROID = $baseMember.'/video/play_android';
        self::$WEB_ACCESS_CONTENT = $baseMember.'/content/voucher_web';

        // Authentication APIs
        self::$API_LOGIN = $baseApi.'/api/login';
        self::$API_LOGOUT = $baseApi.'/api/logout';
        self::$API_REGISTER = $baseApi.'/api/client/register';
        self::$API_FORGOT_PWD = $baseApi.'/api/client/forgot_pwd';
        self::$API_FORGOT_PASSWORD = $baseApi.'/api/client/forgot_pwd';
        self::$API_RESET_PWD = $baseApi.'/api/client/reset_pwd';
        self::$API_RESET_PASSWORD = $baseApi.'/api/client/reset_pwd';

        // Content APIs
        self::$API_URL_WEB_CONTENT_LIST = $baseApi.'/api/web_content/list';
        self::$API_URL_WEB_CONTENT_DETAIL = $baseApi.'/api/web_content/detail';
        self::$API_URL_CONTENT_SUMMARY = $baseApi.'/api/content/summary';

        // Wallet APIs
        self::$API_WALLET_LIST = $baseApi.'/api/wallet/list';
        self::$API_WALLET_LIST_TRX = $baseApi.'/api/wallet/list_trx';
        self::$API_WALLET_DETAIL = $baseApi.'/api/wallet/detail';
        self::$API_WALLET_GET_WALLET_BALANCE = $baseApi.'/api/wallet/get_wallet_balance';

        // Client APIs
        self::$API_CLIENT_DETAIL = $baseApi.'/api/client/detail';

        // Ticket APIs
        self::$API_TICKET_LIST = $baseApi.'/api/ticket/list';
        self::$API_TICKET_LIST_TRX = $baseApi.'/api/ticket/list_trx';
        self::$API_TICKET_DETAIL = $baseApi.'/api/ticket/detail';
        self::$API_TICKET_GET_TICKET_BALANCE = $baseApi.'/api/ticket/get_ticket_balance';

        // Credit APIs
        self::$API_CREDIT_LIST = $baseApi.'/api/credit/list';
        self::$API_CREDIT_LIST_TRX = $baseApi.'/api/credit/list_trx';
        self::$API_CREDIT_DETAIL = $baseApi.'/api/credit/detail';
        self::$API_CREDIT_GET_CREDIT_BALANCE = $baseApi.'/api/credit/get_credit_balance';
        self::$API_CREDIT_GET_SUMMARY_CLIENT = $baseApi.'/api/credit/summary_client';

        // Drawing APIs
        self::$API_DRAWING_LIST_TRX = $baseApi.'/api/drawing/list_trx';
        self::$API_URL_DRAW_COUNTING = $baseApi.'/api/draw/counting';
        self::$API_URL_DRAW_DETAIL = $baseApi.'/api/draw/detail';
        self::$API_URL_WIN_LIST = $baseApi.'/api/win/list';

        // Voucher & Video APIs
        self::$API_CHECK_VOUCHER_KEY = $baseApi.'/api/voucher/cek_key';
        self::$API_CHECK_VIDEO_KEY = $baseApi.'/api/video/cek_key';
        self::$API_LIBVID_LIST = $baseApi.'/api/libvid/list';
        self::$API_LIBVOU_LIST = $baseApi.'/api/libvou/list';

        // Verification APIs
        self::$API_VERIFY_REGISTER = $baseApi.'/api/verify/register';

        self::$initialized = true;
    }

    /**
     * Legacy method support for backward compatibility
     * Allows accessing URLs as TheURL::$baseAdmin(), TheURL::$baseMember(), etc.
     */
    public static function baseAdmin(): string
    {
        self::init();

        return self::$BASE_ADMIN;
    }

    public static function baseMember(): string
    {
        self::init();

        return self::$BASE_MEMBER;
    }

    public static function baseApi(): string
    {
        self::init();

        return self::$BASE_API;
    }

    /**
     * Magic method to support legacy constant-style access
     * Allows accessing URLs as TheURL::$API_LOGIN (without $)
     * This maintains backward compatibility with code that doesn't use the $ prefix
     *
     * @throws \BadMethodCallException
     */
    public static function __callStatic(string $name, array $arguments)
    {
        self::init();

        // Check if the property exists as a static variable
        if (property_exists(self::class, $name)) {
            return self::$$name;
        }

        throw new \BadMethodCallException("URL constant '{$name}' does not exist in ".self::class);
    }
}
