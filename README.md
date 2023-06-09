# advance-test
## 概要説明<br>
問い合わせフォームを作成しました。このアプリケーションの機能は以下の２つです。<br>
１．問い合わせフォームに入力した情報をデータベースに保存する。<br>
２．保存された問い合わせ情報を一覧表示、または検索することができる。<br>
<br>
## 作成した目的<br>
・インターネット上での問い合わせ方法を新設するため。<br>
・問い合わせ情報をデータベースとして管理できるようにするため。<br>
<br>
## 機能一覧<br>
### １．問い合わせフォーム<br>
#### 問い合わせ情報登録機能<br>
・問い合わせフォームに 名前、性別、メールアドレス、郵便番号、住所、（建物名、）ご意見 を入力する<br>
・確認ボタンを押すと内容確認ページに遷移し、入力した内容に間違いがないか確認する<br>
・送信ボタンを押すと完了ページに遷移し、「ご意見いただきありがとうございました」などのメッセージを表示する。<br>
・問い合わせフォームの住所は、郵便番号を入力したときに自動で入力する<br>
・内容確認ページの修正するボタンを押すと、問い合わせフォームのページに戻る<br>
#### 問い合わせ情報管理機能<br>
・管理システムページを表示し、データベースに登録されている情報を一覧表示する<br>
・一覧には、レコードのID、名前、性別、メールアドレス、ご意見、レコード削除ボタンを表示する<br>
・検索フォームでは、名前、性別、登録日、メールアドレスによって絞り込んだ情報を一覧表示する<br>
・検索フォームに入力し検索ボタンを押すと、条件に合致したレコードのみを一覧表示する<br>
・リセットボタンを押すと、検索フォームの内容を削除し、データベースに登録されたすべてのレコードを一覧表示する。<br>
・削除ボタンを押すと、そのレコードの情報をすべて削除する<br>
<br>
## 実行環境<br>
HTML5<br>
css3<br>
PHP 7.4.9<br>
Laravel Framework 8.83.8<br>
mysql 15.1<br>
phpMyAdmin 5.2.1<br>
<br>
## テーブル設計<br>
Contacts<br>
<table>
  <tr>
    <th>カラム名</th>
    <th>型</th>
    <th>Primary key</th>
    <th>Unique key</th>
    <th>Not null</th>
    <th>説明</th>
  </tr>
  <tr>
    <td>id</td>
    <td>bigint　unsigned</td>
    <td>〇</td>
    <td></td>
    <td>〇</td>
    <td>主キー</td>
  </tr>
  <tr>
    <td>fullname</td>
    <td>varchar(255)</td>
    <td></td>
    <td></td>
    <td>〇</td>
    <td>名前</td>
  </tr>
  <tr>
    <td>gender</td>
    <td>tinyint</td>
    <td></td>
    <td></td>
    <td>〇</td>
    <td>1:男性　2:女性</td>
  </tr>
  <tr>
    <td>email</td>
    <td>varchar(255)</td>
    <td></td>
    <td></td>
    <td>〇</td>
    <td>メールアドレス</td>
  </tr>
  <tr>
    <td>postcode</td>
    <td>char(8)</td>
    <td></td>
    <td></td>
    <td>〇</td>
    <td>郵便番号</td>
  </tr>
  <tr>
    <td>address</td>
    <td>varchar(255)</td>
    <td></td>
    <td></td>
    <td>〇</td>
    <td>住所</td>
  </tr>
  <tr>
    <td>building_name</td>
    <td>varchar(255)</td>
    <td></td>
    <td></td>
    <td></td>
    <td>建物名</td>
  </tr>
  <tr>
    <td>opinion</td>
    <td>text</td>
    <td></td>
    <td></td>
    <td>〇</td>
    <td>お問い合わせ内容</td>
  </tr>
  <tr>
    <td>created_at</td>
    <td>timestamp</td>
    <td></td>
    <td></td>
    <td></td>
    <td>レコード作成時刻</td>
  </tr>
  <tr>
    <td>update_at</td>
    <td>timestamp</td>
    <td></td>
    <td></td>
    <td></td>
    <td>レコード更新時刻</td>
  </tr>
![Contact-page](https://github.com/matsudayuki8140/advance-test/assets/129087994/177a2de5-763e-44a0-a8af-cbba88221627)
![Confirm-page](https://github.com/matsudayuki8140/advance-test/assets/129087994/24584486-6490-4746-add1-9fdaaf7ef5db)
![Thanks-page](https://github.com/matsudayuki8140/advance-test/assets/129087994/34156370-c1a9-4f09-b84b-fac057ca27be)
![Manage-page](https://github.com/matsudayuki8140/advance-test/assets/129087994/5138c116-3b2e-4e21-aefb-96e65ed9c21b)
