--1. Вывести количество преподавателей кафедры “Software Development”.
Select Count(Teachers.Id) 
From Teachers Inner join Lectures
on Teachers.Id = TeacherId Inner join GroupsLectures
on Lectures.Id = LectureId Inner join Groups
on GroupId = Groups.Id Inner join Departments
on DepartmentId = Departments.Id
Where Departments.Name = 'Software Development'

--2. Вывести количество лекций, которые читает преподаватель“Dave McQueen”.
Select Count( Lectures.Id) 
From Lectures Inner join Teachers
on TeacherId = Teachers.Id
Where Teachers.Name = 'Dave McQueen';


--3. Вывести количество занятий, проводимых в аудитории “D201”
Select Count(Lectures.Id) From Lectures
Where LectureRoom = 'D201';

--4. Вывести названия аудиторий и количество лекций, проводимых в них.
Select Lectures.LectureRoom, (Select Count(GroupsLectures.Id) From GroupsLectures Where LectureId = Lectures.Id)
From Lectures, Groups;

--5. Вывести количество студентов, посещающих лекции преподавателя “Jack Underhill”

Select Convert(varchar(10), (Select Count(Lectures.Id) From Lectures Where Lectures.TeacherId = Teachers.Id)) 
From Teachers
Where Teachers.Name = 'Jack Underhill';

--6. Вывести среднюю ставку преподавателей факультета “Computer Science”.
Select Teachers.Name, Convert(varchar(Max), Teachers.Salary)  as Salary, Faculties.Name
From Faculties Inner join Departments
on Faculties.Id = FacultyId Inner join Groups
on Groups.DepartmentId = Departments.Id Inner join GroupsLectures
on Groups.Id = GroupsLectures.GroupId Inner join Lectures
on GroupsLectures.LectureId = Lectures.Id Inner join Teachers
on Lectures.TeacherId = Teachers.Id
Where Faculties.Name = 'Computer Science';

--8. Вывести средний фонд финансирования кафедр
Select 'Avg finnancing ' + Convert(varchar(100), Avg(convert(float, Departments.Financing)))From Departments

--9. Вывести полные имена преподавателей и количество читаемых ими дисциплин.
Select Teachers.Name, Subjects.Name From Teachers 
Left join Lectures 
on Teachers.Id = TeacherId Left join Subjects
on Lectures.SubjectId = Subjects.Id


