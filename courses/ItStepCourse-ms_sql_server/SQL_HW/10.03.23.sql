-- 1. Показать все книги, количество страниц в которых больше
-- 500, но меньше 650.
SELECT * FROM Books WHERE page_count > 500 AND page_count < 650;

-- 2. Показать все книги, в которых первая буква названия либо
-- «А», либо «З».
SELECT * FROM Books WHERE name LIKE 'А%' OR name LIKE 'З%';

-- 3. Показать все книги жанра «Детектив», количество проданных книг более 30 экземпляров.
SELECT * FROM Books b JOIN Sales s ON b.book_id = s.book_id
WHERE b.genre = 'Детектив' AND s.quantity_sold > 30;

-- 4. Показать все книги, в названии которых есть слово «Microsoft», но нет слова «Windows».
SELECT * FROM Books WHERE name LIKE '%Microsoft%' AND name NOT LIKE '%Windows%';

-- 5. Показать все книги (название, тематика, полное имя автора
-- в одной ячейке), цена одной страницы которых меньше
-- 65 копеек.
SELECT CONCAT(b.name, ', ', b.genre, ', ', a.full_name) AS book_info
FROM Books b JOIN Authors a ON b.author_id = a.author_id
WHERE b.price / b.page_count < 0.65;

-- 6. Показать все книги, название которых состоит из 4 слов
SELECT * FROM Books WHERE name REGEXP '^[^ ]+ +[^ ]+ +[^ ]+ +[^ ]+$';

-- 7. Показать информацию о продажах в следующем виде:
-- ▷ Название книги, но, чтобы оно не содержало букву «А».
-- ▷ Тематика, но, чтобы не «Программирование».
-- ▷ Автор, но, чтобы не «Герберт Шилдт».
-- ▷ Цена, но, чтобы в диапазоне от 10 до 20 гривен.
-- ▷ Количество продаж, но не менее 8 книг.
-- ▷ Название магазина, который продал книгу, но он не
-- должен быть в Украине или России
SELECT b.name, t.genre, a.full_name, s.price, s.quantity_sold, sh.shop_name
FROM Books b JOIN Authors a ON b.author_id = a.author_id
JOIN Themes t ON b.theme_id = t.theme_id
JOIN Sales s ON b.book_id = s.book_id
JOIN Shops sh ON s.shop_id = sh.shop_id
JOIN Countries c ON sh.country_id = c.country_id
WHERE b.name NOT LIKE '%А%' AND a.full_name != 'Герберт Шилдт'
AND t.genre != 'Программирование' AND s.price BETWEEN 10 AND 20
AND s.quantity_sold >= 8 AND c.country_name NOT IN ('Украина', 'Россия');

-- 8. Показать следующую информацию в два столбца (числа
-- в правом столбце приведены в качестве примера):
-- ▷ Количество авторов: 14
-- ▷ Количество книг: 47
-- ▷ Средняя цена продажи: 85.43 грн.
-- ▷ Среднее количество страниц: 650.6.
SELECT COUNT(*) AS "Количество авторов" FROM Authors;
SELECT COUNT(*) AS "Количество книг" FROM Books;
SELECT AVG(Price) AS "Средняя цена продажи" FROM Sales;
SELECT AVG(Pages) AS "Среднее количество страниц" FROM Books;

-- 9. Показать тематики книг и сумму страниц всех книг по
-- каждой из них.
SELECT Themes.theme_name, SUM(Books.page_count) as total_pages
FROM Books
JOIN Themes ON Books.theme_id = Themes.theme_id
GROUP BY Themes.theme_name

-- 10. Показать количество всех книг и сумму страниц этих книг
-- по каждому из авторов.
SELECT Authors.AuthorName, COUNT(Books.BookID) as NumBooks, SUM(Books.NumPages) as TotalPages
FROM Authors
INNER JOIN Books ON Authors.AuthorID = Books.AuthorID
GROUP BY Authors.AuthorName

-- 11. Показать книгу тематики «Программирование» с наибольшим количеством страниц.
SELECT Books.BookTitle, Books.NumPages
FROM Books
INNER JOIN Themes ON Books.ThemeID = Themes.ThemeID
WHERE Themes.ThemeName = 'Программирование'
ORDER BY Books.NumPages DESC
LIMIT 1

-- 12. Показать среднее количество страниц по каждой тематике,
-- которое не превышает 400.
SELECT Themes.ThemeName, AVG(Books.NumPages) as AvgPages
FROM Books
INNER JOIN Themes ON Books.ThemeID = Themes.ThemeID
GROUP BY Themes.ThemeName
HAVING AVG(Books.NumPages) <= 400

-- 13. Показать сумму страниц по каждой тематике, учитывая
-- только книги с количеством страниц более 400, и чтобы
-- тематики были «Программирование», «Администрирование» и «Дизайн».
SELECT Themes.ThemeName, SUM(Books.NumPages) as TotalPages
FROM Books
INNER JOIN Themes ON Books.ThemeID = Themes.ThemeID
WHERE Books.NumPages > 400 AND Themes.ThemeName IN ('Программирование', 'Администрирование', 'Дизайн')
GROUP BY Themes.ThemeName

-- 14. Показать информацию о работе магазинов: что, где, кем,
-- когда и в каком количестве было продано.
SELECT Shops.ShopName, Countries.CountryName, Sales.SalespersonName, Sales.SalesDate, Books.BookTitle, Sales.Quantity
FROM Sales
INNER JOIN Shops ON Sales.ShopID = Shops.ShopID
INNER JOIN Countries ON Shops.CountryID = Countries.CountryID
INNER JOIN Books ON Sales.BookID = Books.BookID

-- 15. Показать самый прибыльный магазин.
SELECT Shops.ShopName, Countries.CountryName, SUM(Sales.Quantity * Sales.SalePrice) as TotalProfit
FROM Sales
INNER JOIN Shops ON Sales.ShopID = Shops.ShopID
INNER JOIN Countries ON Shops.CountryID = Countries.CountryID
GROUP BY Shops.ShopName, Countries.CountryName
ORDER BY TotalProfit DESC
LIMIT 1
