<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;

final class DeleteController extends Controller
{
    public function __invoke(Customer $customer): RedirectResponse
    {
        // NOTE:
        // 無料テンプレートでは顧客を物理削除していますが、販売テンプレートでは
        // 関連データの整合性を考慮し、論理削除（SoftDeletes）または関連チェックを行います。

        $customer->delete(); // 販売テンプレートでは、ソフトデリートに切り替わる

        return redirect()
            ->route('admin.customer.index')
            ->with('success', '顧客を削除しました。');
    }
}
