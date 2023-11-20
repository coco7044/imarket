## ダウンロード方法

git clone https://github.com/coco7044/imarket.git  
git clone ブランチを指定してダウンロードする場合  
git clone -b ブランチ名 https://github.com/coco7044/imarket.git 
もしくはzipファイルでダウンロードしてください

## インストール方法

- cd laravel_imarket 
- composer install  
- npm install  
- npm run dev  

.env.example をコピーして .envファイルを作成  

.envファイルの中の下記をご利用の環境に合わせて変更してください。  

- DB_CONNECTION=mysql  
- DB_HOST=127.0.0.1  
- DB_PORT=3306  
- DB_DATABASE=laravel_imarket  
- DB_USERNAME=imarket  
- DB_PASSWORD=7044  

XAMPP/MAMPまたは他の開発環境でDBを起動した後に  

php artisan migrate:fresh --seed  

と実行してください。(データベーステーブルとダミーデータが追加されればOK)  

最後に  

- php artisan key:generate  

と入力してキーを生成後、  

- php artisan serve  

で簡易サーバーを立ち上げ、表示確認してください。  

## インストール後の実施事項

画像のダミーデータはpublic/imagesフォルダ内にsample1.jpg ～ sample6.jpgとして保存しています。

php artisan storage:link でstorageフォルダにリンク後、

storage/app/public/productsフォルダ内に保存すると表示されます。(productsフォルダがない場合は作成してください。)


## 補足

決済のテストとしてstripeを利用しています。　　

必要な場合は.envにstripeの情報を追記してください。　　

メールのテストとしてmailtrapを利用しています。　　

必要な場合は.envにmailtrapの情報を追記してください。　　

メールの処理には時間がかかるので、キューを使用しています。　　

必要な場合はphp artisan queue:workでワーカーを立ち上げて動作確認するようにしてください。　　
