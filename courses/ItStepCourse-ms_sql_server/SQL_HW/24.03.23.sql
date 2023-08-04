--� pdf ����� �� ���������� �� �� ����� ��������, ������ �� Academy (� �� �� 19.02.23)

--1. ��� ���������� ������ ������ ������� ��������� ��� ��-
--����� �� ������, ���� ����� ����� ���� � ����� ������ �
--������ ��������� � ��� ������������� �������, ������
--���������� ���������� ���������� ���������� � ����-
--������ ������
Select Trigger [dbo].[InsertInTableModify] On [dbo].[Teachers]  
For Insert
As
Begin
	declare @tname varchar(50) 
	declare @tsurname varchar(50)
	select @tname = Name from inserted
	declare @result varchar(50)
	select @result = Name From Teachers Where Name = @tname And Surname = @tsurname
	if (@result IS NOT NULL)
	begin 
		Print ('err: already exist')
		rollback transaction
	end
End 

--2. ��� ���������� ���������� ������� ��������� ����������
--�� ��������� ���������� � ������� ������ �����������
Select Trigger [dbo].[TeachersFiring] on [dbo].[Teachers] 
For Delete
As
Begin
	declare @FTname varchar(50), @FTsurname varchar(50)
	select @FTname = Name From deleted
	select @FTsurname = Surname From deleted
	insert into dbo.FiredTeachers(Name, Surname)
	values(@FTname, @FTsurname)
End

--3. ������� ��������� ��������� ������ ��������, ���� ����-
--������ ������������ ��������� ������ 6.
Select Trigger [dbo].[DenyInsert] On [dbo].[Teachers]
For Insert
As
Begin
	declare @count int
	select @count = COUNT(Teachers.Id) From Teachers
	if (@count > 4) 
	begin
		Print ('overflow: tooooooooooo many teachers')
		rollback transaction
	end
End
