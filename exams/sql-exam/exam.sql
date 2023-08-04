--1. Показать все книги, количество страниц в которых больше
--500, но меньше 650.
Select Books.name From Books
Where Books.pages >= 500 AND Books.pages <= 650;

--2. Показать все книги, в которых первая буква названия либо
--«А», либо «З».
Select Books.name From Books
Where (Books.name Like 'A%') Or (Books.name Like 'Z%')

--3. Показать все книги жанра «Детектив», количество проданных книг более 30 экземпляров.
Select Books.name 
From Books INNER JOIN Themes
ON Books.themeId = Themes.id AND Themes.name = 'Detective' INNER JOIN Sales
ON Sales.bookId = Books.id AND quantity > 30;

--4. Показать все книги, в названии которых есть слово «Microsoft», но нет слова «Windows».
Select Books.name From Books
Where (Books.name like '%Microsoft%') and (Books.name not like '%Windows%');

--6. Показать все книги, название которых состоит из 4 слов.
Select Books.name From Books
Group By Books.name
Having (Len(Books.name)  - Len(Replace(Books.name, ' ', '')) + 1) > 3;

--9. Показать тематики книг и сумму страниц всех книг по
--каждой из них.
Select Themes.name, COUNT(Books.id) From Themes Left Join Books
On Themes.id = Books.themeId
Group By Themes.name;

--10. Показать количество всех книг и сумму страниц этих книг
--по каждому из авторов
Select SUM(Books.pages) as pages_sum, COUNT(Books.id) as books_amount 
From Authors Left Join Books
On Authors.id = Books.authorId
Group by Authors.name;

--11. Показать книгу тематики «Программирование» с наибольшим количеством страниц.
Select Books.name 
From Books Inner Join Themes
On Themes.id = Books.themeId And Books.name = 'Programming' 
Group By Books.name, Books.pages
Having MAX(Books.pages)  = Books.pages;

--12. Показать среднее количество страниц по каждой тематике,
--которое не превышает 400.
Select Books.name 
From Books Inner Join Themes
On Themes.id = Books.themeId
Group by Books.name
Having AVG(pages) < 400;

--15. Показать самый прибыльный магазин
Select top (1) Shoops.name, SUM(Sales.quantity * Sales.price)
From Shoops Inner Join Sales
On Shoops.id = Sales.shopId
Group By Shoops.name
Order By SUM(Sales.quantity * Sales.price) desc;

--5. Показать все книги (название, тематика, полное имя автора
--в одной ячейке), цена одной страницы которых меньше
--65 копеек.
Select (Books.name + ' | ' + Themes.name + ' | ' + Authors.name) as blablabla
From Books Inner Join Authors
On Authors.id = Books.authorId Inner Join Themes
On Themes.id = themeId
Where pages / price > .65; 

--7. Показать информацию о продажах в следующем виде:
--▷ Название книги, но, чтобы оно не содержало букву «А».
--▷ Тематика, но, чтобы не «Программирование».
--▷ Автор, но, чтобы не «Герберт Шилдт».
--▷ Цена, но, чтобы в диапазоне от 10 до 20 гривен.
--▷ Количество продаж, но не менее 8 книг.
--▷ Название магазина, который продал книгу, но он не
--должен быть в Украине или России
Select Books.name, Books.price, Themes.name , Authors.name ,  Shoops.name 
From Books Inner Join Themes
On Books.themeId = Themes.id And Themes.name != 'Programming' Inner Join Authors
On Books.authorId = Authors.id Inner Join Sales 
On Books.id = Sales.bookId And Sales.quantity > 8 Inner Join Shoops
On Sales.shopId = Shoops.id Inner Join Countries
On Shoops.countryId = Countries.id And Countries.name != 'Russia' And Countries.name != 'Ukraine'
Where Books.price > 10 And Books.price < 20 And Books.name Not Like '%A%';

--8. Показать следующую информацию в два столбца (числа
--в правом столбце приведены в качестве примера):
--▷ Количество авторов: 14
--▷ Количество книг: 47
--▷ Средняя цена продажи: 85.43 грн.
--▷ Среднее количество страниц: 650.6
Select 'authors_amount: ', Count(Authors.id) From Authors
Union
Select 'books_amount: ', Count(Books.id) From Books 
Union
Select 'avg_price: ', Avg(Books.price) From Books 
Union
Select 'avg_pages: ', Avg(Books.pages) From Books 


--13. Показать сумму страниц по каждой тематике, учитывая
--только книги с количеством страниц более 400, и чтобы
--тематики были «Программирование», «Администрирование» и «Дизайн».
Select Books.name
From Books Inner Join Themes
On Books.pages > 400 And (Themes.name = 'Programming' Or Themes.name = 'Administrating' Or Themes.name = 'Design')
Group By Books.name;

--14. Показать информацию о работе магазинов: что, где, кем,
--когда и в каком количестве было продано.
Select Books.name as book_name, Countries.name as country_name, Shoops.name as shop_name, Sales.saleDate, Sales.quantity
From Sales Left Join Shoops
On Sales.shopId = Shoops.id Left Join Books
On Books.id = Sales.bookId Left Join Countries
On Shoops.countryId = Countries.id
Group By Books.id, Shoops.id, Books.name, Countries.name, Shoops.name, Sales.saleDate, Sales.quantity;