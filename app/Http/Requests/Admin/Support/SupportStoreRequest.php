<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Support;

use Illuminate\Foundation\Http\FormRequest;

final class SupportStoreRequest extends FormRequest
{
    // NOTE:
    // このFormRequestは、Supportデータの登録時に使用される汎用バリデーションです。
    // 無料テンプレートではメッセージも最小限で整備されています。
    // 販売テンプレートでは、このRequestをステータスごとに分割（例：Reception／Updateなど）し、柔軟な制御を導入します。

    public function authorize(): bool
    {
        return true; // 認証済みルートで使用されるためOK
    }

    public function rules(): array
    {
        return [
            'customer_id' => ['required', 'exists:customers,id'],
            'subject' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:1000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'customer_id' => '顧客',
            'subject' => '件名',
            'description' => '内容',
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => ':attributeは必須です。',
            '*.max' => ':attributeは:max文字以内で入力してください。',
            'customer_id.exists' => '選択された:attributeが存在しません。',
        ];
    }
}
