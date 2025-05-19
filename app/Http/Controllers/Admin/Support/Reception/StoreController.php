<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Support\Reception;

use App\DataTransferObjects\Reception\SupportReceptionDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Support\SupportStoreRequest;
use App\Enums\SupportStatusType;
use App\Services\Support\Status\Reception\SupportReceptionTransitionService;
use Illuminate\Http\RedirectResponse;

final class StoreController extends Controller
{
    public function __construct(
        private readonly SupportReceptionTransitionService $service,
    )
    {
    }

    public function __invoke(SupportStoreRequest $request): RedirectResponse
    {
        // NOTE:
        // 無料テンプレートでは「RECEPTION登録」のみDTO + Service構造で実装し、
        // 構造化による責務分離の基本を体験できるようにしています。
        // 販売テンプレートでは他のステータスや履歴・ログ処理なども同様に分離されます。

        $dto = new SupportReceptionDto(
            customerId: (int)$request->input('customer_id'),
            subject: (string)$request->input('subject'),
            description: (string)$request->input('description'),
            status: SupportStatusType::RECEPTION->value,
        );

        $this->service->handle($dto);

        return redirect()
            ->route('admin.support.reception.create')
            ->with('success', '対応受付が完了しました。');
    }
}
