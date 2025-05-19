<?php

declare(strict_types=1);

namespace App\Services\Support\Status\Reception;

use App\DataTransferObjects\Reception\SupportReceptionDto;
use App\Models\Support;
use Illuminate\Support\Facades\DB;

final class SupportReceptionTransitionService
{
    /**
     * 顧客対応：受付ステータスの保存処理
     */
    public function handle(SupportReceptionDto $dto): Support
    {
        // NOTE:
        // 無料テンプレートでは、RECEPTIONステータス登録処理のみ構造化しています。
        // 販売テンプレートでは他ステータス（FIRST_CONTACTなど）にも同様のServiceを用意し、
        // ステータスごとの振る舞いをすべて責務分離しています。

        return DB::transaction(function () use ($dto): Support {
            // モデルの作成
            $support = new Support();
            $support->customer_id = $dto->getCustomerId();
            $support->subject = $dto->getSubject();
            $support->description = $dto->getDescription();
            $support->status = $dto->getStatus();
            $support->save();

            return $support;
        });
    }
}
