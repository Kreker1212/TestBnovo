<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\NumberParseException;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'country'
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($guest) {
            if (empty($guest->country)) {
                $guest->country = self::getCountryFromPhone($guest->phone);
            }
        });
    }

    /**
     * Определение страны по номеру телефона.
     *
     * @param string $phone
     * @return string
     */
    public static function getCountryFromPhone($phone)
    {
        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $numberProto = $phoneUtil->parse($phone, null);

            $countryCode = $phoneUtil->getRegionCodeForNumber($numberProto);

            return $countryCode ?: 'Unknown';

        } catch (NumberParseException $e) {
            return 'Unknown';
        }
    }
}
