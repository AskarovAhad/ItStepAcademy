--1. Хранимая процедура отображает полную информацию о всех товарах
create procedure First as 
begin
	select St.Product_name, St.Price, St.Sales_date from Sales_table as St;
end

--2. Хранимая процедура показывает полную информацию 
--о товаре конкретного вида. Вид товара передаётся в качестве параметра. Например, если в качестве параметра 
--указана обувь, нужно показать всю обувь, которая есть в наличии
create procedure Second 
@t nvarchar(100)
as 
begin
	select St.Product_name, St.Price, St.Sales_date from Sales_table as St
	where St.Type = @t;
end

--3. Хранимая процедура показывает топ-3 самых старых клиентов. Топ-3 определяется по дате регистрации
create procedure Third
as
begin	
	select top(3) with ties St.Sales_date from Sales_table as St order by Sales_date ASC
end

--4 Хранимая процедура показывает информацию о самом успешном продавце. Успешность определяется по общей сумме продаж за всё время
create procedure Forth
as
begin
	select top(1) with ties Sst.Full_name, Sst.Phone from Salers_table as Sst, Sales_table as St
	where Sst.id = St.Saler_id
		group by Sst.Full_name, Sst.Phone
			order by Sum(St.Price) desc
end

--5. Хранимая процедура проверяет есть ли хоть один товар 
--указанного производителя в наличии. Название производителя передаётся в качестве параметра. По итогам работы 
--хранимая процедура должна вернуть yes в том случае, если товар есть, и no, если товара нет
create procedure Fifth
@str nvarchar(100)
as
begin
    if exists(select St.Product_name from Sales_table as St where St.Product_name = @str)
	print 'yes'
	else
	print 'no'
end

--6. Хранимая процедура отображает информацию о самом популярном производителе среди покупателей. Популярность 
--среди покупателей определяется по общей сумме продаж
create procedure Sixth
as
begin
	select top(1) with ties Ct.Full_name, Ct.Phone from Customers_table as Ct, Sales_table as St, Salers_table as Sst
	where Sst.id = St.Saler_id
		group by Ct.Full_name, Ct.Phone
			order by Sum(St.Price) desc
end

--7. Хранимая процедура удаляет всех клиентов, зарегистрированных после указанной даты. Дата передаётся в качестве 
--параметра. Процедура возвращает количество удаленных записей.
create procedure Last
as
begin
	declare @temp date;
	set @temp = '1991-12-24';
	declare @del nvarchar(100)
    select COUNT(*) as Count, Ct.Full_name from Customers_table as Ct, Sales_table as St
	where Ct.id = St.Customer_id and St.Sales_date > @temp
	group by Ct.Full_name
end
