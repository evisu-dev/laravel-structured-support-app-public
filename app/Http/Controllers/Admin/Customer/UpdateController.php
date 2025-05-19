<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Customer\SupportCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;

final class UpdateController extends Controller
{
    public function __invoke(SupportCustomerRequest $request, Customer $customer): RedirectResponse
    {
        // NOTE:
        // 無料テンプレートでは、Controller内でバリデーションとモデル更新を一括で処理しています。
        // 販売テンプレートでは、DTOに変換後、Service層で更新・ログ出力・イベント通知などを担う構造になっています。

        $customer->update($request->validated());

        return redirect()
            ->route('admin.customer.edit', $customer->id)
            ->with('success', '顧客情報を更新しました。');
    }
}
