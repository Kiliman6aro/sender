# Рассылка уведомлений Sender.

**Данный код взят из приложения на Laravel, поэтому используется его validator:**
>https://packagist.org/packages/illuminate/validation

**Кроме этого, для эмитации работы используется библиотека Faker:**
> https://packagist.org/packages/fakerphp/faker


## ТЗ от заказчика.
Идея заключается в том, что владелец приложения, может выслать виртуальный
подарок (Voucher), своему покупателю. А тот, в свою очередь, может перейдя по ссылке
в письме отблагодароить его. Отправка виртуального подарка закулисами. Наша задача, обработать
благодарность получателя. Пользователь может отбагодарить либо посредством телефона либо
посредством, email. Но не обоими средствами сразу. В данный момент, мы имеем дело с багом
иногда благодарность приходит и в виде СМС и в виде EMAIL. Видимо на фронтенде допустили возможность
указать и то и другое. Нужно перекрыть этот баг, допуская в параметрах или телефон **senderMobile** или **email**
если приходит ни то ни другое, или приходят оба - вернуть ошибку валидации. 

Данные отправителя Voucher (электронного подарка) существуют в самом объекте Voucher. Который был создан
во время генерации подарка. Поэтому данные, для благодарности сущствуют внутри самого объекта Voucher. Который
приложение получает по voucher_id передаваемого в GET запросе. 

С фронта могут приходить такие данные для отправки
email - того кто говорит спасибо (получатель берется из voucher)
senderMobile - номер телефона того кто говорит спасибо
phone - номер телефона получателя, если его нет, может быть взят из (voucher).
И другие параметры для формирования сообщения благодарности. 

## Задача
* Исправить баг
* Определить какие принципы программирования нарушены.
* Привести код в порядок, путем рефакторинга код.
* (При желании) написать unit тесты. 

### Запуск
* composer install
* user@server$ php src/index.php
