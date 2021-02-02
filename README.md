## README

# ＜ アプリケーション名 ＞

### process-control_app

# ＜ アプリケーション概要 ＞

※実装中の為、内容が変わる事があります。

生産の工程表の作成が行えます。
生産アイテム名・Lot_No・計画期間を入力する事で工程を登録し、現在の日付にて進捗の管理が行えます。
また、日報にてその日の生産結果を入力する事で今後の生産工程作成に役立てます。
過去の生産履歴の検索が行えアイテムごとの過去の進捗やデータを見る事が出来ます。

# ＜ 作成背景 ＞

前職の職場で生産の工程をボードに記入し管理を行っており工程を組む方の経験で組まれている為時間が掛っていた点、過去の履歴が紙媒体で保管されており遡って確認する際に困難であった点から、Webアプリケーションとして工程の作成、検索、日報の入力などが行えると、効率的に工程を組む事が出来たり生産性の向上に繋がるのではないかという思いよりそういったアプリケーションを作成してみたいと思い作成に至りました。

# ＜ デプロイ先・テストアカウント ＞

<デプロイ先><br>
Heroku : https://process-control-app.herokuapp.com/<br>
(※ 途中段階です。)

# ＜ 利用方法 ＞

※実装中の為、以下の画面はイメージです!!<br>
※変更となる可能性があります。

- Homeページ<br>
Homeページにて「工程登録」「進捗確認」「日報入力」「データ検索」「設定」を選択し各専用のページへ遷移します。
<img width="1415" alt="スクリーンショット 2021-02-01 17 22 45" src="https://user-images.githubusercontent.com/69197315/106432477-1f7a5800-64b2-11eb-8785-57f0fc653110.png">

- 工程登録<br>
アイテムやLot_Noごとに工程を登録出来ます。
<img width="637" alt="スクリーンショット 2021-02-01 16 14 20" src="https://user-images.githubusercontent.com/69197315/106432656-5c464f00-64b2-11eb-9537-2996e7b2f1cd.png">

- 進捗確認<br>
現在の日付に対しての進捗を一覧表で確認出来ます。
<img width="1433" alt="スクリーンショット 2021-02-01 16 13 33" src="https://user-images.githubusercontent.com/69197315/106432559-3caf2680-64b2-11eb-9e16-f75dddbc5da8.png">

- 日報入力<br>
本日の日報を入力するページで、「アイテム名」「Lot_No」「生産数」「着手時間」を入力します。<br>
<日報入力画面>
<img width="635" alt="スクリーンショット 2021-02-01 16 14 51" src="https://user-images.githubusercontent.com/69197315/106432712-71bb7900-64b2-11eb-9040-ed23b4694a41.png">

<入力完了画面>
<img width="634" alt="スクリーンショット 2021-02-01 16 19 24" src="https://user-images.githubusercontent.com/69197315/106432933-c8c14e00-64b2-11eb-82dc-b43477909203.png">

- データ検索<br>
過去の生産状況を検索出来ます。<br>
<検索フォーム>
<img width="633" alt="スクリーンショット 2021-02-01 16 15 17" src="https://user-images.githubusercontent.com/69197315/106432779-8ac42a00-64b2-11eb-9969-bd44d923a87f.png">
＜検索結果画面＞
<img width="804" alt="スクリーンショット 2021-02-01 16 26 51" src="https://user-images.githubusercontent.com/69197315/106432830-9c0d3680-64b2-11eb-9f12-3229fbb727df.png">


# ＜ 工夫したポイント ＞

※実装中の為、完了後に記入します。

# ＜ 使用技術(開発環境) ＞

- 言語 : PHP
- フレームワーク : Laravel(8.21.0)
- DB : MySQL
- サーバー : ※実装中の為、後程記入します。

# ＜ DB設計 ＞

※実装中の為、変更となる可能性があります。
<img width="1207" alt="スクリーンショット 2021-01-13 1 10 02" src="https://user-images.githubusercontent.com/69197315/104340547-2578bb00-553c-11eb-925c-e86ea78ed81b.png">

# ＜ 画面遷移図 ＞

※実装中の為、変更となる可能性があります。
<img width="568" alt="スクリーンショット 2021-01-10 16 15 24" src="https://user-images.githubusercontent.com/69197315/104116783-21dc0d00-535f-11eb-8a8c-d3920b282549.png">

# ＜ 今後の課題・追加したい機能 ＞

※実装中の為、完了後に記入します。

# ＜ ローカルでの動作方法 ＞

※実装中の為、完了後に記入します。
### バージョン情報
- PHP 7.3.11
- Laravel 8.21.0
### 動作方法
