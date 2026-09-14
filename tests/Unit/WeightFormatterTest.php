<?php

namespace Tests\Unit;

use App\Helpers\WeightFormatter;
use PHPUnit\Framework\TestCase;

class WeightFormatterTest extends TestCase
{
    public function test_format_under_one_kg_displays_in_grams(): void
    {
        $this->assertEquals('500 gram', WeightFormatter::format(500));
        $this->assertEquals('999 gram', WeightFormatter::format(999));
        $this->assertEquals('100 gram', WeightFormatter::format(100));
    }

    public function test_format_between_one_kg_and_one_thousand_kg_displays_in_kg(): void
    {
        $this->assertEquals('1 kg', WeightFormatter::format(1000));
        $this->assertEquals('2,5 kg', WeightFormatter::format(2500));
        $this->assertEquals('30 kg', WeightFormatter::format(30000));
        $this->assertEquals('999 kg', WeightFormatter::format(999000));
    }

    public function test_format_above_or_equal_one_thousand_kg_displays_in_ton(): void
    {
        $this->assertEquals('1 ton', WeightFormatter::format(1000000));
        $this->assertEquals('1,5 ton', WeightFormatter::format(1500000));
        $this->assertEquals('30 ton', WeightFormatter::format(30000000));
    }

    public function test_to_grams_conversion(): void
    {
        $this->assertEquals(500, WeightFormatter::toGrams(500, 'gram'));
        $this->assertEquals(2500, WeightFormatter::toGrams(2.5, 'kg'));
        $this->assertEquals(30000, WeightFormatter::toGrams(30, 'kg'));
        $this->assertEquals(1500000, WeightFormatter::toGrams(1.5, 'ton'));
    }
}
