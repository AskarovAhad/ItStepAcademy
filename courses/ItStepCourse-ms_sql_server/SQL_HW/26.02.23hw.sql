--1. �������� ��������� ���������� ������ ���������� � ���� �������
create procedure First as 
begin
	select St.Product_name, St.Price, St.Sales_date from Sales_table as St;
end

--2. �������� ��������� ���������� ������ ���������� 
--� ������ ����������� ����. ��� ������ ��������� � �������� ���������. ��������, ���� � �������� ��������� 
--������� �����, ����� �������� ��� �����, ������� ���� � �������
create procedure Second 
@t nvarchar(100)
as 
begin
	select St.Product_name, St.Price, St.Sales_date from Sales_table as St
	where St.Type = @t;
end

--3. �������� ��������� ���������� ���-3 ����� ������ ��������. ���-3 ������������ �� ���� �����������
create procedure Third
as
begin	
	select top(3) with ties St.Sales_date from Sales_table as St order by Sales_date ASC
end

--4 �������� ��������� ���������� ���������� � ����� �������� ��������. ���������� ������������ �� ����� ����� ������ �� �� �����
create procedure Forth
as
begin
	select top(1) with ties Sst.Full_name, Sst.Phone from Salers_table as Sst, Sales_table as St
	where Sst.id = St.Saler_id
		group by Sst.Full_name, Sst.Phone
			order by Sum(St.Price) desc
end

--5. �������� ��������� ��������� ���� �� ���� ���� ����� 
--���������� ������������� � �������. �������� ������������� ��������� � �������� ���������. �� ������ ������ 
--�������� ��������� ������ ������� yes � ��� ������, ���� ����� ����, � no, ���� ������ ���
create procedure Fifth
@str nvarchar(100)
as
begin
    if exists(select St.Product_name from Sales_table as St where St.Product_name = @str)
	print 'yes'
	else
	print 'no'
end

--6. �������� ��������� ���������� ���������� � ����� ���������� ������������� ����� �����������. ������������ 
--����� ����������� ������������ �� ����� ����� ������
create procedure Sixth
as
begin
	select top(1) with ties Ct.Full_name, Ct.Phone from Customers_table as Ct, Sales_table as St, Salers_table as Sst
	where Sst.id = St.Saler_id
		group by Ct.Full_name, Ct.Phone
			order by Sum(St.Price) desc
end

--7. �������� ��������� ������� ���� ��������, ������������������ ����� ��������� ����. ���� ��������� � �������� 
--���������. ��������� ���������� ���������� ��������� �������.
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
