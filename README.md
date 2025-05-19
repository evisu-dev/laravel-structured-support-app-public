# Laravel Structured Support Template (無料版 / Free Edition)

このテンプレートは、Laravel 11 + PHP 8.2 をベースにした「顧客対応フロー管理アプリ」の簡易版です。  
This template is a simplified version of a "Customer Support Flow Management App" built with Laravel 11 + PHP 8.2.

無料テンプレートでは、基本的な構造化の考え方やステータス管理の最低限の流れを体験することができます。  
With this free edition, you can experience the basics of structured Laravel architecture and simple status transitions.

---

## 🔰 対象ユーザー / Who is this for?

- Laravelで構造化を学びたい方  
  Those who want to learn structured development with Laravel  
- ステータスを持つ業務アプリを試作したい方  
  Anyone building status-based business applications  
- シンプルな構造から始めて拡張を見据えたい方  
  Developers starting simple but planning for scalable design  

---

## 🧩 含まれている主な機能 / Features Included

### 顧客管理（Customer Management）

- 顧客の登録／編集／削除／一覧／詳細画面  
  Customer create/edit/delete/list/show
- フォームバリデーション（FormRequest）  
  Form validation with FormRequest
- Tailwind CSS によるシンプルUI  
  Simple UI using Tailwind CSS

### 対応管理（Support Flow）

- RECEPTION（受付） → COMPLETED（完了）への流れ  
  Simple flow: RECEPTION → COMPLETED
- 構造化された登録処理（DTO＋Service）  
  Structured registration with DTO + Service
- ステータス表示（Enum対応）  
  Status display using Enum `label()`

---

## 📄 ディレクトリ構成例（一部） / Example Directory Structure

```
├── app
│   ├── Http
│   │   └── Controllers
│   │       └── Admin
│   │           └── Support
│   │               └── Reception
│   ├── Services
│   │   └── Support
│   │       └── Status
│   │           └── Reception
│   ├── DataTransferObjects
│   │   └── Reception
│   └── Enums
│       └── SupportStatusType.php
```

---

## 🔄 機能差分について / About Feature Differences

この無料テンプレートで試せる構造は「RECEPTION → COMPLETED」のみです。  
This free edition supports only RECEPTION → COMPLETED.

その他のステータス遷移や履歴管理などは販売テンプレートにてご提供しています。  
More complex flows and logs are available in the commercial version.

👉 [販売テンプレートとの機能差分一覧はこちら / See Feature Comparison](docs/feature-diff.md)

---

## 🛠 動作環境 / Requirements

- PHP 8.2+
- Laravel 11.x
- MySQL / SQLite
- Laravel Breeze によるログイン認証導入済  
  Laravel Breeze-based authentication included

---

## 📦 今後の展開 / Roadmap

- Zenn 記事連動（構造解説・テンプレート活用法）  
  Zenn article series to explain structure and usage
- ステップアップテンプレート（販売版）  
  Commercial edition with advanced features

---

## 📜 ライセンス / License

MIT License / 商用利用可  
MIT License. Commercial use allowed.  

ただし、販売テンプレートの派生物として再配布・販売は禁止されます。  
Redistribution or resale of derived commercial templates is prohibited.
