<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Contracts\View\View;

final class IndexController extends Controller
{
    public function __invoke(): View
    {
        // NOTE:
        // 無料テンプレートでは、顧客一覧はController内でEloquentクエリを直接記述しています。
        // 販売テンプレートではService層を通じて、検索条件やDTO整形、複雑なリレーション取得などを導入しています。

        $customers = Customer::orderByDesc('created_at')->paginate(10);

        return view('admin.customer.index', compact('customers'));
    }
}
