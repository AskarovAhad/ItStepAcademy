--1. Вывести номера корпусов, если суммарный фонд финансирования расположенных в них кафедр превышает 100000
Select Departments.Building From Departments
Group by Departments.Building
Having Sum(Financing) >= 10000

--2. Вывести названия групп 5-го курса кафедры “Software Development”, которые имеют более 10 пар в первую неделю.
Select Groups.Name From GroupsLectures, Groups  Inner join Departments
on Groups.DepartmentId = Departments.Id And Departments.Name = 'Software Development'
Where Groups.Id = GroupsLectures.GroupId And Groups.Year = 3
Group by Groups.Name
Having Count(GroupsLectures.Id) > 10 

--3. Вывести названия групп, имеющих рейтинг (средний рейтинг всех студентов группы) больше, чем рейтинг группы “D221”
Select Groups.Name From Groups
Group by Groups.Name
Having (Select Avg(Students.Rating)
From Groups Inner join GroupsStudents
on GroupId = Groups.Id And Groups.Name != 'D221'  Inner join Students
on StudentId = Students.Id) != 0 And Groups.Name != 'D221' 

--4. Вывести фамилии и имена преподавателей, ставка которых выше средней ставки профессоров.
Select Teachers.Name, Salary From Teachers
Group by Teachers.Name, Salary, Surname, IsProfessor, Id
Having  (Select Avg (Teachers.Salary)
From Teachers 
Where Teachers.IsProfessor = 1) < Teachers.Salary And Teachers.IsProfessor = 0


--6. Вывести названия групп, имеющих рейтинг (средний рейтинг всех студентов группы) меньше, чем минимальный рейтинг групп 5-го курса.
--min_rating - мин. рейтинг 4 курса
--не разобрался как заюзать вместе с having

Select Groups.Name, Rating, Min(Tab.Rating) as min_rating From Groups Left join
(Select Avg(Students.Rating) as Rating, Groups.Id, Groups.Year
From Groups Inner join GroupsStudents
on GroupId = Groups.Id Inner join Students
on StudentId = Students.Id
Group by Groups.Id, Groups.Year) As Tab
on Groups.Id = Tab.Id
Group by Groups.Name, Tab.Rating, Tab.Year
Having Min(Tab.Rating) < [min_rating] And Tab.Year < 3
