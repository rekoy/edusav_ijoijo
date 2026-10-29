<?php

namespace App\Constants;

class RC
{
    public const SUCCESS = '000';

    public const VALIDATION_ERROR = '001';

    public const UNAUTHORIZED = '002';

    public const FORBIDDEN = '003';

    public const NOT_FOUND = '004';

    public const SERVER_ERROR = '005';

    public const BAD_REQUEST = '006';

    public const CONFLICT = '007';

    public const FAILED = '901';

    public static array $messages = [
        self::SUCCESS => [
            'en' => 'Success',
            'in' => 'Berhasil',
        ],
        self::VALIDATION_ERROR => [
            'en' => 'Validation failed. Please check your input.',
            'in' => 'Validasi gagal. Silakan periksa input Anda.',
        ],
        self::UNAUTHORIZED => [
            'en' => 'Unauthorized access.',
            'in' => 'Akses tidak sah.',
        ],
        self::FORBIDDEN => [
            'en' => 'Access forbidden.',
            'in' => 'Akses dilarang.',
        ],
        self::NOT_FOUND => [
            'en' => 'Resource not found.',
            'in' => 'Sumber daya tidak ditemukan.',
        ],
        self::SERVER_ERROR => [
            'en' => 'Internal server error.',
            'in' => 'Terjadi kesalahan pada server.',
        ],
        self::BAD_REQUEST => [
            'en' => 'Bad request.',
            'in' => 'Permintaan tidak valid.',
        ],
        self::CONFLICT => [
            'en' => 'Conflict detected.',
            'in' => 'Terjadi konflik data.',
        ],
    ];

    /**
     * Get response message by code and language
     */
    public static function getMessage(string $code, string $lang = 'en'): string
    {
        return self::$messages[$code][$lang] ?? self::$messages[$code]['en'] ?? 'Unknown error.';
    }
}
