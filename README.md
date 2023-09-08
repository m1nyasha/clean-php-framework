# clean-php-framework

## Создание ссылки на Storage

Права на запись в папку Storage

```shell
sudo chown -R $USER:www-data storage
sudo chmod -R 775 storage
```

Создание ссылки на Storage

```shell
ln -s $PWD/storage $PWD/public/storage
```