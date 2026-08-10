# Laravel Structured Support Template

> **Maintenance Note**
>
> 本リポジトリはLaravel 11で作成したアーキテクチャサンプルです。  
> Laravel 11はセキュリティサポート終了済みのため、新規本番システムのスターターとしての利用は推奨しません。  
> 設計パターン（DTO / Service / Enum）の参考としてご利用ください。
>
> This repository was built with Laravel 11 as an architecture sample.  
> Laravel 11 has reached end of security support.  
> For new production projects, use a currently supported Laravel version.

## Overview

業務システム向けの構造化設計サンプル。  
顧客対応フロー管理を題材に、DTO・Service層・Enum によるステータス管理の実装パターンを示す。

## Problem

業務システム開発では、ステータス遷移・バリデーション・ビジネスロジックが Controller に集中しがちになる。  
このテンプレートは、以下の課題に対する設計上の解を提供する。

- ステータス遷移のルールが暗黙的でコードから読み取りにくい
- Controller が肥大化しテストが困難になる
- データの受け渡しに配列を多用し型安全性が低い

## Features

- **顧客管理** — 登録 / 編集 / 削除 / 一覧 / 詳細（FormRequest によるバリデーション）
- **対応フロー管理** — RECEPTION → COMPLETED のステータス遷移
- **DTO（Data Transfer Object）** — 型安全なデータ受け渡し
- **Service層** — ビジネスロジックの分離
- **Enum によるステータス定義** — `SupportStatusType` で状態を明示的に管理
- **Laravel Breeze** — 認証機能導入済み
- **Tailwind CSS** — シンプルなUI

## Architecture / Tech Stack

```
├── app
│   ├── Http/Controllers/Admin/Support/Reception
│   ├── Services/Support/Status/Reception
│   ├── DataTransferObjects/Reception
│   └── Enums/SupportStatusType.php
├── database/migrations
├── resources/views
├── routes
└── tests
```

| Layer | Role |
|-------|------|
| Controller | リクエスト受付・レスポンス返却のみ |
| FormRequest | バリデーションルールの定義 |
| DTO | Controller → Service 間のデータ構造定義 |
| Service | ビジネスロジック・ステータス遷移処理 |
| Enum | ステータス値の定義・ラベル変換 |

## Design Decisions

- **Enum でステータスを定義** — マジックナンバーを排除し、遷移ルールをコードとして表現
- **DTO + Service の分離** — Controller の責務を最小化し、単体テストを容易に
- **ステータスごとにディレクトリを分割** — 各フェーズの処理が独立し、拡張時に既存コードへの影響を最小化

## Setup

```bash
git clone https://github.com/evisu-dev/laravel-structured-support-app-public.git
cd laravel-structured-support-app-public

composer install
npm install && npm run build

cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

### Requirements

- PHP 8.2+
- Laravel 11.x
- MySQL / SQLite
- Node.js (Vite build)

## Tests

```bash
php artisan test
```

## Limitations

- ステータス遷移は RECEPTION → COMPLETED の2段階のみ（簡易版）
- 対応履歴・ログ記録は未実装
- 検索・ソート・ページネーションは未実装

## License

MIT License. See `LICENSE`.
