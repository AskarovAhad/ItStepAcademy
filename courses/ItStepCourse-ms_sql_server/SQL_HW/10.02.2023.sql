--1. ������� ������� ������, �� ����������� �� ���� � �������� �������.
SELECT Id FROM Departments
ORDER BY Id DESC;

--2. ������� �������� ����� � �� ��������, ��������� � �������� �������� ��������� ����� �Group Name� � �Group
--Rating� ��������������.
SELECT Name as 'Group name', Rating as 'Group Rating'
FROM Groups;

--3. ������� ��� �������������� �� �������, ������� ������
--�� ��������� � �������� � ������� ������ �� ���������
--� �������� (����� ������ � ��������)
SELECT Surname, Salary, Premium
FROM Teachers;

--4. ������� ������� ����������� � ���� ������ ���� � ��������� �������: �The dean of faculty [faculty] is [dean].�.
Select 'The dean of faculty'+Name+'  is '+Dean 
FROM Faculties 

--5. ������� ������� ��������������, ������� �������� ������������ � ������ ������� ��������� 1050.
SELECT Surname
FROM Teachers
WHERE IsProfessor = 1 AND Salary > 1050;

--6. ������� �������� ������, ���� �������������� �������
--������ 11000 ��� ������ 25000.
SELECT Name
FROM Departments
WHERE Financing < 11000 OR Financing > 25000;

--7. ������� �������� ����������� ����� ���������� �Computer
--Science�.
SELECT Name 
FROM Faculties
WHERE Name != 'Computer Science';

--8. ������� ������� � ��������� ��������������, �������
--�� �������� ������������.
SELECT Surname, Position
FROM Teachers
WHERE IsProfessor = 0;

--9. ������� �������, ���������, ������ � �������� �����������, � ������� �������� � ��������� �� 160 �� 550.
SELECT Surname, Position, Salary, Premium
FROM Teachers
WHERE IsAssistant = 1 AND (Premium > 160 AND Premium < 550);

--10.������� ������� � ������ �����������
SELECT Surname, Salary
FROM Teachers
WHERE IsAssistant = 1;

--11.������� ������� � ��������� ��������������, �������
--���� ������� �� ������ �� 01.01.2000.
SELECT Surname, Position
FROM Teachers
WHERE EmploymentDate < '01-01-2000' ;

--12.������� �������� ������, ������� � ���������� �������
--������������� �� ������� �Software Development�. ��������� ���� ������ ����� �������� �Name of Department�.
SELECT Name
FROM Departments
WHERE Name < 'Software Development'
ORDER BY Name ASC;

--13.������� ������� �����������, ������� �������� (�����
--������ � ��������) �� ����� 1200.
SELECT Surname
FROM Teachers
WHERE IsAssistant = 1 AND (Salary + Premium) < 1200;

--14.������� �������� ����� 5-�� �����, ������� �������
--� ��������� �� 2 �� 4.
SELECT Name
FROM Groups
WHERE (Rating >=2 AND Rating <= 4) AND Year = 5;

--15.������� ������� ����������� �� ������� ������ 550 ���
--��������� ������ 200.
SELECT Surname 
FROM Teachers
WHERE IsAssistant = 1 AND (Salary < 550 OR Premium < 200);