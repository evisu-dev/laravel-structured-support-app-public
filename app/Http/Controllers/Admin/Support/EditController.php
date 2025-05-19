<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Support;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Support;
use Illuminate\Contracts\View\View;

final class EditController extends Controller
{
    public function __invoke(Support $support): View
    {
        // NOTE:
        // このEditControllerは、無料テンプレートでも提供されている編集機能の一部です。
        // ステータスに依存せず、Supportモデルの基本情報（顧客・件名・内容）の編集を目的としています。
        // 販売テンプレートでは、ステータス遷移やログ出力などの追加機能も統合されています。

        $customers = Customer::orderBy('name')->pluck('name', 'id');

        return view('admin.support.edit', [
            'support' => $support,
            'customers' => $customers,
        ]);
    }
}
