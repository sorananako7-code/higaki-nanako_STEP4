# PHPとApacheがセットになったイメージを使用
FROM php:8.2-apache

# 今のフォルダにある全ファイルをコンテナ内の公開ディレクトリにコピー
COPY . /var/www/html/

# ポート80番を許可
EXPOSE 80