<h2>Описание приложения</h2>

<p>Написать поисковый модуль, который находит элементы на главных страницах сторонних сайтов
(например, ссылки или картинки).

<p>На главной странице изначально выводится форма ввода адреса сайта и выбора типа поиска (ссылки, изображения, текст).

<p>При выборе «текст» появляется поле ввода, при выборе другого пункта исчезает.

<p>Данные отправляются на сервер ajax-запросом.
<p>Валидация всех полей должна быть как на стороне клиента,
так и на стороне сервера, сообщения об ошибке валидации выводить без перезагрузки страницы.

<p>Скрипт должен искать на указанной странице сайта (страница скачивается с помощью CURL или другим способом)
выбранные элементы, используя регулярные выражения.

<p>Адрес сайта, найденные элементы (одной строкой) и число найденных элементов записывать в БД.

<p>Страница просмотра результатов - список проверенных сайтов и числа найденных элементов.
<p>По клику на адрес сайта осуществляется вывод найденных значений.