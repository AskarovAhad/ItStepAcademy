--1. ������� ���������� �������������� ������� �Software Development�.
Select Count(Teachers.Id) 
From Teachers Inner join Lectures
on Teachers.Id = TeacherId Inner join GroupsLectures
on Lectures.Id = LectureId Inner join Groups
on GroupId = Groups.Id Inner join Departments
on DepartmentId = Departments.Id
Where Departments.Name = 'Software Development'

--2. ������� ���������� ������, ������� ������ ��������������Dave McQueen�.
Select Count( Lectures.Id) 
From Lectures Inner join Teachers
on TeacherId = Teachers.Id
Where Teachers.Name = 'Dave McQueen';


--3. ������� ���������� �������, ���������� � ��������� �D201�
Select Count(Lectures.Id) From Lectures
Where LectureRoom = 'D201';

--4. ������� �������� ��������� � ���������� ������, ���������� � ���.
Select Lectures.LectureRoom, (Select Count(GroupsLectures.Id) From GroupsLectures Where LectureId = Lectures.Id)
From Lectures, Groups;

--5. ������� ���������� ���������, ���������� ������ ������������� �Jack Underhill�

Select Convert(varchar(10), (Select Count(Lectures.Id) From Lectures Where Lectures.TeacherId = Teachers.Id)) 
From Teachers
Where Teachers.Name = 'Jack Underhill';

--6. ������� ������� ������ �������������� ���������� �Computer Science�.
Select Teachers.Name, Convert(varchar(Max), Teachers.Salary)  as Salary, Faculties.Name
From Faculties Inner join Departments
on Faculties.Id = FacultyId Inner join Groups
on Groups.DepartmentId = Departments.Id Inner join GroupsLectures
on Groups.Id = GroupsLectures.GroupId Inner join Lectures
on GroupsLectures.LectureId = Lectures.Id Inner join Teachers
on Lectures.TeacherId = Teachers.Id
Where Faculties.Name = 'Computer Science';

--8. ������� ������� ���� �������������� ������
Select 'Avg finnancing ' + Convert(varchar(100), Avg(convert(float, Departments.Financing)))From Departments

--9. ������� ������ ����� �������������� � ���������� �������� ��� ���������.
Select Teachers.Name, Subjects.Name From Teachers 
Left join Lectures 
on Teachers.Id = TeacherId Left join Subjects
on Lectures.SubjectId = Subjects.Id


