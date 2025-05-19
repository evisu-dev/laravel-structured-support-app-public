<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Support;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Contracts\View\View;

final class IndexController extends Controller
{
    public function __invoke(): View
    {
        // NOTE:
        // 無料テンプレートでは、一覧取得はController内で直接Eloquentを用いて実装しています。
        // 販売テンプレートではService層での取得処理・検索条件・DTO整形などの構造を導入しています。

        $supports = Support::with('customer')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.support.index', compact('supports'));
    }
}
