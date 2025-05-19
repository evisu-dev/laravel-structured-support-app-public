<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Support;

use App\Http\Controllers\Controller;
use App\Models\Support;
use App\Enums\SupportStatusType;
use Illuminate\Http\RedirectResponse;

final class CompleteController extends Controller
{
    // NOTE:
    // 無料テンプレートでは「RECEPTION → COMPLETED」への直接ステータス遷移のみを提供します。
    // より複雑な遷移（中間ステータス・ログ記録など）は販売テンプレートで構造化対応されます。

    public function __invoke(Support $support): RedirectResponse
    {
        $support->update([
            'status' => SupportStatusType::COMPLETED,
        ]);

        return redirect()
            ->route('admin.support.show', $support->id)
            ->with('success', '対応ステータスを「完了」に更新しました。');
    }
}
