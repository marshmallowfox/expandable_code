## Быстрый старт
Пример использования лежит в
```git
app/Http/Controllers/ExampleController.php
```
Обратиться к нему по адресу
```
PATCH :: localhost:80/api/users/{USER_ID}
```
При обращении без тела с `code`, отправляет код в логи, с кодом валидирует


## Как это расширять
Необходимо
### 1. Дополнить Enum
В `app/Enums/CodeSenderHandlers.php` лежат допустимые значения
### 2. Зарегистрировать в фабрике
В `app/Factories/CodeSenderHandlersFactory.php` есть `match`, где необходимо зарегистрировать, согласно Laravel DI
### 3. Использовать зарегистрированный Enum
