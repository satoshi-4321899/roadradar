# Road Radar(image)

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
- [使用した言語・ツール](#使用した言語・ツール)

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
  - ブランド登録後、商品を追加したいブランド名を押下し遷移先のブランド詳細ページの商品登録ボタンを押下して各項目を入力して登録完了です。
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
  - text
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)
- ログイン方法<p id="userログイン方法"></p>
  - text
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)
- お気に入り登録<p id="お気に入り登録"></p>
  - text
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)
- カート追加・商品購入<p id="カート追加・商品購入"></p>
  - text
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)
- 注文履歴<p id="注文履歴"></p>
  - text
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)
- 関連する商品<p id="関連する商品"></p>
  - text
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)
- コメント機能<p id="コメント機能"></p>
  - text
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)
- 商品カテゴリー<p id="商品カテゴリー"></p>
  - text
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)
- ブランド一覧<p id="ブランド一覧"></p>
  - text
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)
- 価格帯検索<p id="価格帯検索"></p>
  - text
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)
- アカウント編集・パスワード編集<p id="userアカウント編集・パスワード編集"></p>
  - text
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)

## Free
- 商品閲覧<p id="商品閲覧"></p>
  - text
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)
- お問い合わせ<p id="お問い合わせ"></p>
  - text
    ![welcome page](https://drive.google.com/uc?export=view&id=1wq02QOgELhjeazzKQM_nZffQ2eitCnzX)
  
## 使用した言語・ツール
- PHP(Laravel11)
- MySQL
- JavaScript(Swiper.js)
- Docker(開発環境)
- Git&GitHub
- Google Drive
- Figma(デザイン作成)
- Lucid(ER図作成)
- XServer(デプロイ)
