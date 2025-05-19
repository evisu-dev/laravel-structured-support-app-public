<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Customer\SupportCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;

final class StoreController extends Controller
{
    public function __invoke(SupportCustomerRequest $request): RedirectResponse
    {
        // NOTE:
        // 無料テンプレートでは、バリデーション後にController内で直接モデルを保存しています。
        // 販売テンプレートではDTO＋Service層を用い、保存処理・ログ出力・通知処理などを責務分離しています。

        Customer::create($request->validated());

        return redirect()
            ->route('admin.customer.create')
            ->with('success', '顧客を登録しました。');
    }
}
