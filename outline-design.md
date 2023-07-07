# 図書館蔵書システム・概要設計

## 機能構成

### ①蔵書登録機能

**概要**

- 蔵書の情報を登録できる
- データ
  - 蔵書ID（PK）
  - 蔵書名（UK）
  - カテゴリー（FK）
  - 登録日
  - 登録者ID（登録者のID）（FK）
- **使用できるのは図書館管理者のみ**
  - `role：0`のユーザーが使用可能

### ②蔵書検索機能

**概要**

- 蔵書を検索する
  - 「蔵書ID」、「蔵書名」、「カテゴリー」、「登録者名」の4項目を入力してORで部分一致するものを出力

### ③ユーザー登録機能

**概要**

- ユーザーを登録する
- 登録は管理者が行うものとする
- データ
  - ユーザーID（PK）
  - ユーザー名
  - パスワード（ハッシュ化して保存）
  - 電話番号
  - メールアドレス
  - 権限・role
    - 0：管理者
    - 1：利用者

### ④ログイン機能

**概要**

- ユーザーIDとパスワードが一致するものでログインする

## 画面構成

### 画面遷移図


```mermaid

flowchart TD

subgraph ログイン
    a1[ログイン画面]-->a2{認証}
    a2-->|成功|a3[ログイン]-->a5[検索画面]
    a2-->|失敗|a6[ログイン画面]
end

subgraph ユーザー登録画面
    c1[登録フォーム]-->c2{登録}
    c2-->|成功|c3[ユーザー一覧画面]
    c2-->|失敗|c4[登録フォーム]
end

subgraph 蔵書検索
　  b1[検索画面]-->b2{検索}
    b2-->|ヒットした場合|b3[検索結果表示]
    b2-->|ヒットしない場合|b4[検索結果がありませんでした]
end

subgraph 蔵書登録
    d1[蔵書登録画面]-->d2{登録}
    d2-->|成功|d3[検索画面]
    d2-->|失敗|d4[蔵書登録画面]
end

```

## データベース構成

### ER図

```mermaid

erDiagram

users {
    int user_id PK "ユーザーID"
    string user_name "ユーザー名"
    longtext password "パスワード（ハッシュ化済み）"
    string phone_number "電話番号"
    string email "メールアドレス"
    int role "権限（0：管理者, 1：利用者）"
}

books {
    int book_id PK "蔵書ID"
    string book_name UK "蔵書名"
    int book_category FK "カテゴリー"
    timestamp regist_date "登録日"
    int regist_id FK "登録者ID（ユーザーID）"
}

book_category {
    int book_category_id PK "カテゴリーID"
    string book_category_name "カテゴリー名"
}

books ||--|| book_category : "1冊の蔵書は1つのカテゴリーに属する"
users ||--o{ books : "1人のユーザーは0冊以上の蔵書を登録できる"

```