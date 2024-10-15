# Road Radar(image)

## Road Radar について
- Road Radarは、Laravel11を使用して構築されたECサイトです。このサイトは、ポートフォリオとして活用できるように設計されています。ユーザーの利用形態に応じて3つの権限を提供し、それぞれの権限に基づいた異なる機能を利用できる仕組みが特徴です。以下の権限ごとに異なる機能が付与されています。
  - [Admin](#admin)（管理者）: ブランドの登録・編集・削除、商品の登録・編集・削除を行うことができ、サイト全体の管理を担当します。
  - [User](#user)（一般ユーザー）: 商品の閲覧、カートへの追加、購入、注文履歴の閲覧、お気に入り登録、商品へのコメントなど、ショッピングに必要な機能を利用できます。メール認証を行うことで、購入機能などの制限が解除されます。
  - [Free](#free)（無料会員）: 商品の閲覧や検索機能のみが提供されます。購入やお気に入り登録などの一部機能には制限がありますが、簡単にサイトの雰囲気を体験することが可能です。

## 目次

- [Admin](#admin)
  - [登録方法](#admin登録方法)
  - [ログイン方法](#adminログイン方法)
  - [ブランド登録・編集](#ブランド登録・編集)
  - [商品登録・編集](#商品登録・編集)
  - [ブランド削除・商品削除](#ブランド削除・商品削除)
  - [MYブランド・ブランド一覧](#MYブランド・ブランド一覧)
  - [アカウント編集・パスワード編集](#adminアカウント編集・パスワード編集)
- [User](#user)
  - [登録方法](#user登録方法)
  - [ログイン方法](#userログイン方法)
  - [お気に入り登録](#お気に入り登録)
  - [カート追加・商品購入](#カート追加・商品購入)
  - [注文履歴](#注文履歴)
  - [関連する商品](#関連する商品)
  - [コメント機能](#コメント機能)
  - [商品カテゴリー](#商品カテゴリー)
  - [ブランド一覧](#ブランド一覧)
  - [価格帯検索](#価格帯検索)
  - [アカウント編集・パスワード編集](#userアカウント編集・パスワード編集)
- [Free](#free)
  - [商品閲覧](#商品閲覧)
  - [お問い合わせ](#お問い合わせ)
- [使用した言語・ツール](#使用した言語・ツール)

## Admin
- 登録方法<p id="admin登録方法"></p>
  - <a href="https://sy4964593027.xsrv.jp/admin" target="_blank">管理者用welcomeページ</a>の管理者登録ボタンから登録フォームへ遷移して各項目を入力し、登録ボタンを押下すると登録完了です。
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)
    ![welcome page](https://drive.google.com/uc?export=view&id=1Ax_Fm1dh-yTg8nyayPD655bJPeM2M_-y)
    ![welcome page](https://drive.google.com/uc?export=view&id=1dwxkaXb4m0SlLH01pdeaIYkrRe2-1BRs)

- ログイン方法<p id="adminログイン方法"></p>
  - <a href="https://sy4964593027.xsrv.jp/admin" target="_blank">管理者用welcomeページ</a>のログインボタンからログインフォームへ遷移して各項目を入力し、ログインボタンを押下するとログイン完了です。
    ![welcome page](https://drive.google.com/uc?export=view&id=1Gkjb8T5Gk4YI_NC-V8JOQWabsENtUU9y)
    ![welcome page](https://drive.google.com/uc?export=view&id=1qKvC-iMEF6P8SsGo9YVwbh-4fm2EZUeE)
    ![welcome page](https://drive.google.com/uc?export=view&id=1n9dTPjwFwY7ZJWYA1yu6iCnX7nHCeYDN)
    
- ブランド登録・編集<p id="ブランド登録・編集"></p>
  - ログイン後、ブランド登録ボタンから登録フォームへ遷移し、各項目を入力して登録ボタンを押下すると完了です。登録後はMYブランド一覧に追加されます。
    ![welcome page](https://drive.google.com/uc?export=view&id=1yjNqLsWYUrTRjmvsjFHr1TiLw441zM9T)
    ![welcome page](https://drive.google.com/uc?export=view&id=1GOOVPrw5U2QnzsL2zkYxN9TFPdwaM8qI)
    ![welcome page](https://drive.google.com/uc?export=view&id=1D78OqZrIb4DIu3miZJkjU0dblD7LzFA1)
    
- <p id="商品登録・編集">商品登録・編集</p>
- <p id="ブランド削除・商品削除">ブランド削除・商品削除</p>
- <p id="MYブランド・ブランド一覧">MYブランド・ブランド一覧</p>
- <p id="adminアカウント編集・パスワード編集">アカウント編集・パスワード編集</p>

## User
- <p id="user登録方法">登録方法</p>
- <p id="userログイン方法">ログイン方法</p>
- <p id="お気に入り登録">お気に入り登録</p>
- <p id="カート追加・商品購入">カート追加・商品購入</p>
- <p id="注文履歴">注文履歴</p>
- <p id="関連する商品">関連する商品</p>
- <p id="コメント機能">コメント機能</p>
- <p id="商品カテゴリー">商品カテゴリー</p>
- <p id="ブランド一覧">ブランド一覧</p>
- <p id="価格帯検索">価格帯検索</p>
- <p id="userアカウント編集・パスワード編集">アカウント編集・パスワード編集</p>

## Free
- <p id="商品閲覧">商品閲覧</p>
- <p id="お問い合わせ">お問い合わせ</p>
  
## 使用した言語・ツール

## 終わりに