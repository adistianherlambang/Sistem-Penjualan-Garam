<?php

namespace App\Helpers;

class WeightFormatter
{
    /**
     * Format weight in grams to appropriate human-readable display unit.
     * Rules:
     * - < 1 kg (1,000 gram) -> displayed in gram (e.g., 500 gram)
     * - >= 1 kg and < 1,000 kg -> displayed in kg (e.g., 2,5 kg, 30 kg)
     * - >= 1,000 kg (1,000,000 gram) -> displayed in ton (e.g., 1,5 ton)
     *
     * @param float|int $grams
     * @return string
     */
    public static function format(float|int $grams): string
    {
        $grams = (float) $grams;

        if ($grams < 1000) {
            $formatted = self::formatNumber($grams);
            return "{$formatted} gram";
        }

        if ($grams < 1000000) {
            $kg = $grams / 1000;
            $formatted = self::formatNumber($kg);
            return "{$formatted} kg";
        }

        $ton = $grams / 1000000;
        $formatted = self::formatNumber($ton);
        return "{$formatted} ton";
    }

    /**
     * Convert value with specified unit to base unit (gram).
     *
     * @param float $value
     * @param string $unit ('gram', 'kg', 'ton')
     * @return float
     */
    public static function toGrams(float $value, string $unit): float
    {
        $unit = strtolower(trim($unit));

        return match ($unit) {
            'ton' => $value * 1000000,
            'kg' => $value * 1000,
            default => $value,
        };
    }

    /**
     * Format number with Indonesian decimal separator (comma) and no redundant trailing zeros.
     *
     * @param float $number
     * @return string
     */
    private static function formatNumber(float $number): string
    {
        // Round to 3 decimal places to avoid floating point precision noise
        $rounded = round($number, 3);
        
        // If it's effectively an integer
        if (floor($rounded) == $rounded) {
            return number_format($rounded, 0, ',', '.');
        }

        // Format with up to 3 decimal places, trimming trailing zeros
        $formatted = number_format($rounded, 3, ',', '.');
        $formatted = rtrim(rtrim($formatted, '0'), ',');

        return $formatted;
    }
}
