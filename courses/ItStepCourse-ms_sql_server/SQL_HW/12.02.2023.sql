--1. Вывести все возможные пары строк преподавателей и групп
SELECT * FROM Teachers
INNER JOIN Groups
ON Teachers.Name=Groups.Name

--2. Вывести названия факультетов, фонд финансирования кафедр которых превышает фонд финансирования факультета.
 
SELECT NAME
FROM Departments
WHERE Financing > ANY (SELECT Financing FROM Faculties)
SELECT NAME
FROM Departments
WHERE Financing > (SELECT MIN(Financing) FROM Faculties)

--3. Вывести фамилии кураторов групп и названия групп, которые они курируют
SELECT Curators.Surname, Groups.Name
FROM Curators INNER JOIN
GroupsCurators ON Curators.Id = GroupsCurators.CuratorId INNER JOIN
Groups ON GroupsCurators.GroupId = Groups.Id

--4. Вывести имена и фамилии преподавателей, которые читают
--лекции у группы “P107”.
SELECT Teachers.Name, Teachers.Surname
FROM Teachers INNER JOIN
Groups ON Teachers.Id = Groups.Id INNER JOIN
Lectures ON Teachers.Id = Lectures.TeacherId INNER JOIN
GroupsLectures ON Groups.Id = GroupsLectures.GroupId AND Lectures.Id = GroupsLectures.LectureId
WHERE Groups.Name = 'P107';

--5. Вывести фамилии преподавателей и названия факультетов
--на которых они читают лекции.
SELECT Teachers.Surname, Faculties.Name
FROM Teachers INNER JOIN
Faculties ON Teachers.Id = Faculties.Id INNER JOIN
Lectures ON Teachers.Id = Lectures.TeacherId

--6. Вывести названия кафедр и названия групп, которые к
--ним относятся.
SELECT Departments.Name AS Departments, Groups.Name AS Groups
FROM Groups INNER JOIN
Departments ON Groups.DepartmentId = Departments.Id

--7. Вывести названия дисциплин, которые читает преподаватель “Samantha Adams”.
SELECT Departments.Name
FROM Departments INNER JOIN
Teachers ON Departments.Id = Teachers.Id
WHERE Teachers.Name = 'Samantha' AND Teachers.Surname = 'Adams';

--8. Вывести названия кафедр, на которых читается дисциплина
--“Database Theory”.
SELECT Departments.Name
FROM Departments INNER JOIN
Subjects ON Departments.Id = Subjects.Id
WHERE Subjects.Name = 'Database Theory';

--9. Вывести названия групп, которые относятся к факультету
--“Computer Science”.
SELECT Groups.Name
FROM Groups INNER JOIN
Faculties ON Groups.Id = Faculties.Id
WHERE Faculties.Name = 'Computer Science';

--10. Вывести названия групп 5-го курса, а также название факультетов, к которым они относятся.
SELECT Groups.Name
FROM Groups INNER JOIN
Faculties ON Groups.Id = Faculties.Id
WHERE Groups.Year = 5;

--11. Вывести полные имена преподавателей и лекции, которые
--они читают (названия дисциплин и групп), причем отобрать
--только те лекции, которые читаются в аудитории “B103”.SELECT Teachers.Name, Teachers.Surname, Subjects.Name AS Subject
FROM Teachers INNER JOIN
Lectures ON Teachers.Id = Lectures.TeacherId INNER JOIN
Subjects ON Lectures.SubjectId = Subjects.Id
WHERE Lectures.LectureRoom = 'B103';