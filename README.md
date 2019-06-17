Для разворачивания проекта выполнить следующие действия:

Переходим в каталог где будет располагаться проект.

Выполняем git clone репозитория:
```$bash
$ git clone https://github.com/KLASSuK/avtocod-php-developer-test-task-again2.git ./avtocod && cd $_
```
В файл .env прописываем значения для переменных окружения: 
```
APP_ENV=local

APP_DEBUG=true

DB_CONNECTION=sqlite
```

Устанавливаем зависимости описанные в json:
```$bash
$ composer install
```

В папке DataBase создаем файлик с именем:
```$xslt
database.sqlite
```

Убеждаемся что приложение развернулось: 
```
php artisan
```

Накатываем миграции: 
```$bash
php artisan migrate
```

Запускаем локальный веб сервер:
```$bash
$ ./artisan serve --port 8080
```
открываем в браузере http://XXX (ххх-адрес и порт после выполнения serve вы увидите в консоли)


Проверяем что тесты проходят. При выполнении произойдет рефреш БД и она заполнится сидами.
```$bash
$ composer test
```
