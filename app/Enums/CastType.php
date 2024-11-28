<?php
namespace App\Enums;

enum CastType: string
{
    case Director = 'director';
    case Writer = 'writer';
    case Actor = 'actor';
    case Composer = 'composer';

    /**
     * Returns the textual representation of the type.
     */
    public function label(): string
    {
        return match ($this) {
            self::Director => 'Режисер',
            self::Writer => 'Сценарист',
            self::Actor => 'Актор',
            self::Composer => 'Композитор',
        };
    }

    /**
     * Returns an array of all types with their values and labels.
     * Useful for generating dropdown options.
     */
    public static function options(): array
    {
        return array_map(fn($case) => [
            'value' => $case->value,
            'label' => $case->label(),
        ], self::cases());
    }
    /**
     * Returns an array of all type values.
     */
    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
