--1. Вывести таблицу кафедр, но расположить ее поля в обратном порядке.
SELECT Id FROM Departments
ORDER BY Id DESC;

--2. Вывести названия групп и их рейтинги, используя в качестве названий выводимых полей “Group Name” и “Group
--Rating” соответственно.
SELECT Name as 'Group name', Rating as 'Group Rating'
FROM Groups;

--3. Вывести для преподавателей их фамилию, процент ставки
--по отношению к надбавке и процент ставки по отношению
--к зарплате (сумма ставки и надбавки)
SELECT Surname, Salary, Premium
FROM Teachers;

--4. Вывести таблицу факультетов в виде одного поля в следующем формате: “The dean of faculty [faculty] is [dean].”.
Select 'The dean of faculty'+Name+'  is '+Dean 
FROM Faculties 

--5. Вывести фамилии преподавателей, которые являются профессорами и ставка которых превышает 1050.
SELECT Surname
FROM Teachers
WHERE IsProfessor = 1 AND Salary > 1050;

--6. Вывести названия кафедр, фонд финансирования которых
--меньше 11000 или больше 25000.
SELECT Name
FROM Departments
WHERE Financing < 11000 OR Financing > 25000;

--7. Вывести названия факультетов кроме факультета “Computer
--Science”.
SELECT Name 
FROM Faculties
WHERE Name != 'Computer Science';

--8. Вывести фамилии и должности преподавателей, которые
--не являются профессорами.
SELECT Surname, Position
FROM Teachers
WHERE IsProfessor = 0;

--9. Вывести фамилии, должности, ставки и надбавки ассистентов, у которых надбавка в диапазоне от 160 до 550.
SELECT Surname, Position, Salary, Premium
FROM Teachers
WHERE IsAssistant = 1 AND (Premium > 160 AND Premium < 550);

--10.Вывести фамилии и ставки ассистентов
SELECT Surname, Salary
FROM Teachers
WHERE IsAssistant = 1;

--11.Вывести фамилии и должности преподавателей, которые
--были приняты на работу до 01.01.2000.
SELECT Surname, Position
FROM Teachers
WHERE EmploymentDate < '01-01-2000' ;

--12.Вывести названия кафедр, которые в алфавитном порядке
--располагаются до кафедры “Software Development”. Выводимое поле должно иметь название “Name of Department”.
SELECT Name
FROM Departments
WHERE Name < 'Software Development'
ORDER BY Name ASC;

--13.Вывести фамилии ассистентов, имеющих зарплату (сумма
--ставки и надбавки) не более 1200.
SELECT Surname
FROM Teachers
WHERE IsAssistant = 1 AND (Salary + Premium) < 1200;

--14.Вывести названия групп 5-го курса, имеющих рейтинг
--в диапазоне от 2 до 4.
SELECT Name
FROM Groups
WHERE (Rating >=2 AND Rating <= 4) AND Year = 5;

--15.Вывести фамилии ассистентов со ставкой меньше 550 или
--надбавкой меньше 200.
SELECT Surname 
FROM Teachers
WHERE IsAssistant = 1 AND (Salary < 550 OR Premium < 200);