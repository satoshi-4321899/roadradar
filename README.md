# Road Radar

## Road Radar について
- Road Radarは、Laravel11を使用して構築されたECサイト(ポートフォリオ)です。ユーザーの利用形態に応じて3つの権限を提供し、それぞれの権限に基づいた異なる機能を利用できる仕組みです。以下の権限ごとに異なる機能が付与されています。
  - [Admin](#admin)（管理者）: ブランドの登録・編集・削除、商品の登録・編集・削除を行うことができ、サイト全体の管理を担当します。
  - [User](#user)（一般ユーザー）: 商品の閲覧、カートへの追加、購入、注文履歴の閲覧、お気に入り登録、商品へのコメントなど、ショッピングに必要な機能を利用できます。メール認証を行うことで、購入機能などの制限が解除されます。
  - [Free](#free)（無料会員）: 商品の閲覧や検索機能のみが提供されます。購入やお気に入り登録などの一部機能には制限がありますが、簡単にサイトの雰囲気を体験することが可能です。
  - <a href="https://sy4964593027.xsrv.jp/admin" target="_blank">管理者用URL</a>
  - <a href="https://sy4964593027.xsrv.jp/" target="_blank">一般ユーザー・Freeユーザー用URL</a>

## 目次
- [Admin](#admin)
  - [登録方法](#admin登録方法)
  - [ログイン方法](#adminログイン方法)
  - [ブランド登録](#ブランド登録)
  - [ブランド編集](#ブランド編集)
  - [商品登録](#商品登録)
  - [商品編集](#商品編集)
  - [ブランド削除・商品削除](#ブランド削除・商品削除)
  - [アカウント編集](#adminアカウント編集)
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
- [使用した言語、ツール、開発環境](#使用した言語、ツール、開発環境)

## Admin
- 登録方法<p id="admin登録方法"></p>
  - <a href="https://sy4964593027.xsrv.jp/admin" target="_blank">管理者用welcomeページ</a>の管理者登録ボタンから登録フォームへ遷移して各項目を入力し、登録ボタンを押下すると登録完了です。
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)
    ![register form](https://drive.google.com/uc?export=view&id=1Ax_Fm1dh-yTg8nyayPD655bJPeM2M_-y)
    ![top page](https://drive.google.com/uc?export=view&id=1dwxkaXb4m0SlLH01pdeaIYkrRe2-1BRs)

- ログイン方法<p id="adminログイン方法"></p>
  - <a href="https://sy4964593027.xsrv.jp/admin" target="_blank">管理者用welcomeページ</a>のログインボタンからログインフォームへ遷移して各項目を入力し、ログインボタンを押下するとログイン完了です。
    ![welcome page](https://drive.google.com/uc?export=view&id=1Gkjb8T5Gk4YI_NC-V8JOQWabsENtUU9y)
    ![login form](https://drive.google.com/uc?export=view&id=1qKvC-iMEF6P8SsGo9YVwbh-4fm2EZUeE)
    ![top page](https://drive.google.com/uc?export=view&id=1n9dTPjwFwY7ZJWYA1yu6iCnX7nHCeYDN)
    
- ブランド登録<p id="ブランド登録"></p>
  - ログイン後、ブランド登録ボタンから登録フォームへ遷移し、各項目を入力して登録ボタンを押下すると完了です。登録後はMYブランド一覧に追加されます。
    ![top page](https://drive.google.com/uc?export=view&id=1yjNqLsWYUrTRjmvsjFHr1TiLw441zM9T)
    ![brand form](https://drive.google.com/uc?export=view&id=1GOOVPrw5U2QnzsL2zkYxN9TFPdwaM8qI)
    ![brand registered](https://drive.google.com/uc?export=view&id=1D78OqZrIb4DIu3miZJkjU0dblD7LzFA1)

- ブランド編集<p id="ブランド編集"></p>
  - ブランドの編集ボタンを押下しブランド情報を入力し更新します。
    ![top page](https://drive.google.com/uc?export=view&id=1jEGBIf51X8ebBEZyxq9oxGRaocHQezVc)
    ![update brand](https://drive.google.com/uc?export=view&id=1Q3EvEpbpGqMft3dTEGCoWzlNX3rvhQDP)
    ![top page](https://drive.google.com/uc?export=view&id=1le26kZfANfCADLjdOQF6uVvJqSz7gjaG)

- 商品登録<p id="商品登録"></p>
  - 商品を追加したいブランド名を押下し遷移先のブランド詳細ページの商品登録ボタンを押下して各項目を入力して登録完了です。
    ![top page](https://drive.google.com/uc?export=view&id=1DLFMqSxL01ko7Rj420vLqP7At32V5kE2)
    ![show brand](https://drive.google.com/uc?export=view&id=1LiqnCCSVPFd77ndIOBjZ9nD8cFrhwxg2)
    ![product register form](https://drive.google.com/uc?export=view&id=13frmgeqGmy8FJdv0pt7RfMJmLI07vcnm)
    ![product registered](https://drive.google.com/uc?export=view&id=1uvKpirLyG2x-35bY32a7MG8T1TDcdQP7)
    
- 商品編集<p id="商品編集"></p>
  - 編集したい商品を押下し商品詳細ページの編集ボタンから商品情報を入力し更新します。
    ![show brand](https://drive.google.com/uc?export=view&id=1m9B0JgDntVJhEcJsDk2jIG_99vn_L1Hr)
    ![show product](https://drive.google.com/uc?export=view&id=1oDZeM4F4s6QexMQNWj_wTUedDKj-vwpx)
    ![update product](https://drive.google.com/uc?export=view&id=16Vdq4g0EeJgJAfoWoMvnhLA69qfN0Vbc)
    ![show product](https://drive.google.com/uc?export=view&id=1zGpnFT7V5Ypo2VVRgz3rgo0KDoamtKI7)

- ブランド削除・商品削除<p id="ブランド削除・商品削除"></p>
  - 商品詳細ページ、MYブランド一覧ページの削除ボタンから削除できます。※ブランド削除すると削除したブランドに登録した商品も削除されます。
    ![show product](https://drive.google.com/uc?export=view&id=1JiOPgcqcWxb6XZ2Mz4UCTJYH-JRGIYU8)
    ![product deleted](https://drive.google.com/uc?export=view&id=1LMkG0hZUXlEgr0XlvaxrLM4Hu_50VS2Q)
    ![top page](https://drive.google.com/uc?export=view&id=12F4bHbj_pyPA1WIRoPNjVFJ9j2bSpapw)
    ![brand deleted](https://drive.google.com/uc?export=view&id=1EVWQOsRxhU18RxEG8zFyC-o0Xhc4TD5f)

- アカウント編集<p id="adminアカウント編集"></p>
  - 右上のユーザー名からアカウントを押下すると、アカウント情報、パスワードを編集できます。アカウントを削除したい場合はページ一番下の削除ボタンを押下します。
    ![top page](https://drive.google.com/uc?export=view&id=1-KRcpEIRaLZIvMDcQoSB7CZoQmuOK1UI)
    ![account update](https://drive.google.com/uc?export=view&id=1KjijaUgqPsTVKUxjnAy7JBbJVLhg4Hct)

## User
- 登録方法<p id="user登録方法"></p>
  - <a href="https://sy4964593027.xsrv.jp/" target="_blank">一般ユーザー用welcomeページ</a>の会員登録ボタンから登録フォームへ遷移して各項目を入力し、登録ボタンを押下すると入力したメールアドレス宛に認証メールが送付されます(届かない場合はリンクを再送して下さい)。認証メールのボタンをクリックすると登録完了です。
    ![welcome page](https://drive.google.com/uc?export=view&id=166tdVtogpBzCxQT2YKWI15o1Ecw4E7EH)
    ![register form](https://drive.google.com/uc?export=view&id=1DE5U1bCqYHZ_E4NhS9BNZrjSqtkRaamZ)
    ![mail link](https://drive.google.com/uc?export=view&id=1rBq-LpvoYjeW31h5ZB9WU_RQfoVfslMJ)
    ![mail content](https://drive.google.com/uc?export=view&id=1l8XrmX5_iBSAtDAK_isJycQ3-NHPmvtq)
    ![top page](https://drive.google.com/uc?export=view&id=1cCfXATBH-QIP11ZHk2ddGFw7QXJlje5e)

- ログイン方法<p id="userログイン方法"></p>
  - <a href="https://sy4964593027.xsrv.jp/" target="_blank">一般ユーザー用welcomeページ</a>のログインボタンからログインフォームへ遷移して各項目を入力し、ログインボタンを押下するとログイン完了です。
    ![welcome page](https://drive.google.com/uc?export=view&id=17BZl1JEqiDwGjAF-E11UzI5KOOWURoij)
    ![login form](https://drive.google.com/uc?export=view&id=1-eoYNb0yj6C4kS8lUvFQw0RnYM4Zc5wL)
    ![top page](https://drive.google.com/uc?export=view&id=1cCfXATBH-QIP11ZHk2ddGFw7QXJlje5e)

- お気に入り登録<p id="お気に入り登録"></p>
  - ログイン後、任意の商品から商品詳細ページのお気に入り登録ボタンを押下すると登録完了です。登録後はお気に入り一覧に商品が追加されます。※お気に入りの解除は解除ボタンから行えます
    ![welcome page](https://drive.google.com/uc?export=view&id=1NlLFwf1NxQ_0iQljyXSybbtgN_CBsx_v)
    ![show product](https://drive.google.com/uc?export=view&id=1GBzIhH-hlZou-xQEmYsL-1x5QKpYQ-Re)
    ![favorite registered](https://drive.google.com/uc?export=view&id=1VlGVr3lMMknVYAKFUdF8qSMLnvebvchD)
    ![favorite index](https://drive.google.com/uc?export=view&id=1VuVg9sciPCEP63NwvIIwPgdat6HFfKhW)

- カート追加・商品購入<p id="カート追加・商品購入"></p>
  - 商品詳細ページの個数を入力し、カートに追加ボタンを押下すると追加完了です。メニューのカートからショッピングカートへ遷移し注文手続きボタンを押下し情報を入力して注文を確定されると購入完了です。確定後は入力したメールアドレス宛に注文内容が送付されます。
    ![show product](https://drive.google.com/uc?export=view&id=1h95UfbOK1e9eVTBdDcZ4h5NpVEHVk1pF)
    ![cart added](https://drive.google.com/uc?export=view&id=15nfHfTWovyWPPwL--kjF8sbxPI_sEqyM)
    ![cart show](https://drive.google.com/uc?export=view&id=11ouiyPOxFa8doFHqSzuBaVNsZCf0mb6P)
    ![order info](https://drive.google.com/uc?export=view&id=1Q0UjigH2lUcP0i06Mv1IH6e7fr_ejHow)
    ![order detail](https://drive.google.com/uc?export=view&id=1dXs5DaRVobgLCfHW3YUvFlBB_PEHXlMD)
    ![mail order](https://drive.google.com/uc?export=view&id=15CnMj2RxqmPkGPFh2SNUFRYY7acto3j5)

- 注文履歴<p id="注文履歴"></p>
  - 商品注文後、メニューの注文履歴を押下すると注文した日時・商品・金額などが表示されます。
    ![order show](https://drive.google.com/uc?export=view&id=1xyFPd6DlSzT4jBvDXPbFbQmQTroWj_7v)
    ![order index](https://drive.google.com/uc?export=view&id=1S2GSLS9R3Eoc6-BIzwWlO9eltIJWOYGD)

- 関連する商品<p id="関連する商品"></p>
  - 商品詳細ページに同じカテゴリーの商品がランダムに表示されます。
    ![welcome page](https://drive.google.com/uc?export=view&id=1bTnp47uxNrFj_v_tGBoziDwZ9aeoYGbu)
    ![welcome page](https://drive.google.com/uc?export=view&id=11sTDaNAa8HuRItnbSVXRxwgCgJ_-FuuJ)

- コメント機能<p id="コメント機能"></p>
  - 商品詳細ページ下部のフォームにコメントを入力しボタンを押下するとコメントを追加できます。
    ![welcome page](https://drive.google.com/uc?export=view&id=13BHQZ8tgbQZ5_Jpug09YeM5yDu_LtsYc)
    ![welcome page](https://drive.google.com/uc?export=view&id=1vv6hBzgk5MIF6Zgyo1-xYfFNEnTZVc3J)

- 商品カテゴリー<p id="商品カテゴリー"></p>
  - トップページのサイドメニューから各カテゴリーごとの商品一覧を表示できます。
    ![welcome page](https://drive.google.com/uc?export=view&id=1BjU8_QnA-xVPzT4yy5zJaHDDZaIe3zwS)
    ![welcome page](https://drive.google.com/uc?export=view&id=1Z5DvVlNv_kC6dgxJrz3g94gGmIpZcZjb)

- ブランド一覧<p id="ブランド一覧"></p>
  - トップページのサイドメニューから各ブランドごとの商品一覧を表示できます。
    ![welcome page](https://drive.google.com/uc?export=view&id=1KfUvvnLCpInFDHyvpcI2opYom2itR4n7)
    ![welcome page](https://drive.google.com/uc?export=view&id=1HqsEvIBiTKh2dYn6kcUxKQe8nSZXBB7d)

- 価格帯検索<p id="価格帯検索"></p>
  - トップページのサイドメニューからカテゴリー・価格別の商品一覧を検索できます。
    ![welcome page](https://drive.google.com/uc?export=view&id=1FMp9oYW7bFicqo2acIvMEP8s6sJWpHm3)
    ![welcome page](https://drive.google.com/uc?export=view&id=17d6SKLBn2QkeTZkDhaHfJU06wn7zfXLG)

- アカウント編集・パスワード編集<p id="userアカウント編集・パスワード編集"></p>
  - 右上のユーザー名からアカウントを押下すると、アカウント情報、パスワードを編集できます。アカウントを削除したい場合はページ一番下の削除ボタンを押下します。
    ![welcome page](https://drive.google.com/uc?export=view&id=1IpJppw5LJ2Q5rAhJrV2hpg7_lKG3UNWW)
    ![welcome page](https://drive.google.com/uc?export=view&id=1-yEAzv2Y87pH0BAa7NRgs3zdxU8RUq-Y)

## Free
- 商品閲覧<p id="商品閲覧"></p>
  - <a href="https://sy4964593027.xsrv.jp/" target="_blank">一般ユーザー用welcomeページ</a>の未登録で商品を閲覧するからFreeユーザー用のトップページへ遷移できます。カテゴリー・ブランド・価格検索が可能です。お気に入り登録・カート追加・コメント追加などの機能はありません。welcomeページの下部ではカテゴリーごとの新商品をカルーセルで閲覧できます。
    ![welcome page](https://drive.google.com/uc?export=view&id=1a4nsUYAvhzAfGht2XA6QGPTZozwBcbfL)
    ![welcome page](https://drive.google.com/uc?export=view&id=1vRNV2o2bgIZxvOh6o-t1f-3sTVlt8gBe)

- お問い合わせ<p id="お問い合わせ"></p>
  - <a href="https://sy4964593027.xsrv.jp/" target="_blank">一般ユーザー用welcomeページ</a>のお問い合わせから情報を入力し送信するとお問い合わせ内容が入力したメールアドレス宛に送信されます。
    ![welcome page](https://drive.google.com/uc?export=view&id=147z_0zZgycECin8u09YSEFWDYy4XVfcc)
    ![welcome page](https://drive.google.com/uc?export=view&id=1aGCCgEuP5B7G6F28aEEjoZZqMvWaL-xQ)
    ![welcome page](https://drive.google.com/uc?export=view&id=17z8GYK72dnKnSOKe7f9_YtnvJMmD21sl)
  
## 使用した言語、ツール、開発環境
- PHP(Laravel11)
- MySQL
- JavaScript(Swiper.js)
- Docker
- VSCode
- Git&GitHub
- XServer(デプロイ)
- MacBookPro
- Google Drive
- Figma(デザイン作成)
- <a href="https://lucid.app/lucidchart/0698e30d-0dd2-4437-9993-f9959467f707/edit?viewport_loc=-2300%2C-1346%2C2065%2C1017%2C0_0&invitationId=inv_f0d4ab34-b246-4a2d-b944-7a3114cbf692" target="_blank">Lucid(ER図作成)</a>
