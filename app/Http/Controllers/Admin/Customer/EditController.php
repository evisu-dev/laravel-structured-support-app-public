<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Contracts\View\View;

final class EditController extends Controller
{
    public function __invoke(Customer $customer): View
    {
        // NOTE:
        // 無料テンプレートでは、編集画面の表示処理はController内で完結させています。
        // 販売テンプレートでは、権限制御・初期値調整などの前処理をService層で行う場合があります。

        return view('admin.customer.edit', compact('customer'));
    }
}
