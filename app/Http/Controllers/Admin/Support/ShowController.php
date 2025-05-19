<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Support;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Contracts\View\View;

final class ShowController extends Controller
{
    public function __invoke(Support $support): View
    {
        // NOTE:
        // 無料テンプレートでは、詳細表示もController内で完結させています。
        // 販売テンプレートでは、DTOによる表示用整形やService層による取得処理の分離も導入されています。

        $support->load([
            'customer',
        ]);

        return view('admin.support.show', [
            'support' => $support,
        ]);
    }
}
