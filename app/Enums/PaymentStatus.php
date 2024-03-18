<?php

namespace App\Enums;


enum PaymentStatus :string
{
    case Created = 'created';
    case Authorized = 'authorized';
    case Captured = 'captured';
    case Refunded = 'refunded';
    case Failed = 'failed';
    case NULL = 'null';

    /**
     * Get the label for the Razorpay payment status.
     *
     * @param string $value
     * @return string
     */
    public static function get_status($value)
    {
        switch ($value) {
            case self::Created:
                return 'Created';
            case self::Authorized:
                return 'Success';
            case self::Captured:
                return 'Success';
            case self::Refunded:
                return 'Refunded';
            case self::Failed:
                return 'Failed';
            case self::NULL:
                return NULL;
        }
    }

    public static function get_user_status($value)
    {
        switch ($value) {
            case self::Created:
                return 'Created';
            case self::Authorized:
                return 'Authorized';
            case self::Captured:
                return 'Captured';
            case self::Refunded:
                return 'Refunded';
            case self::Failed:
                return 'Failed';
            case self::NULL:
                return NULL;
        }
    }

    public static function get_type($value)
    {
        switch ($value) {
            case self::Created:
                return 'warning';
            case self::Authorized:
                return 'success';
            case self::Captured:
                return 'success';
            case self::Refunded:
                return 'info';
            case self::Failed:
                return 'danger';
            case self::NULL:
                return NULL;
        }
    }
}
