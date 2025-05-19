<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * 無料テンプレート用：対応ステータス（簡易版）
 */
enum SupportStatusType: int
{
    case RECEPTION = 1;   // 対応受付
    case COMPLETED = 4;   // 対応完了

    /**
     * ステータスのラベルを返す
     */
    public function label(): string
    {
        return match ($this) {
            self::RECEPTION => '対応受付',
            self::COMPLETED => '対応完了',
        };
    }

    /**
     * 選択肢として配列化
     */
    public static function options(): array
    {
        return array_map(
            fn($status) => [
                'value' => $status->value,
                'label' => $status->label(),
            ],
            self::cases()
        );
    }
}
