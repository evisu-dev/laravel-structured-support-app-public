<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Support;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Support\SupportStoreRequest;
use App\Models\Support;
use Illuminate\Http\RedirectResponse;

final class UpdateController extends Controller
{
    public function __invoke(SupportStoreRequest $request, Support $support): RedirectResponse
    {
        // NOTE:
        // 登録・更新のバリデーションルールが共通のため、SupportStoreRequest に一本化しています。
        // 販売テンプレートでは処理別にRequestを分離して柔軟性を高めています。

        $validated = $request->validated();

        $support->update([
            'customer_id' => $validated['customer_id'],
            'subject' => $validated['subject'],
            'description' => $validated['description'],
        ]);

        return redirect()
            ->route('admin.support.show', $support->id)
            ->with('success', '対応情報を更新しました。');
    }
}
