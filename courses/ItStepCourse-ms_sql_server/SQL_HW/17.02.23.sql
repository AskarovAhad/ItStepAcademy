-- 1)Вывести номера корпусов, если суммарный фонд финансирования расположенных в них кафедр превышает 100000.
SELECT c.building_number
FROM departments d
JOIN faculties f ON d.faculty_id = f.id
JOIN campus_buildings c ON f.building_id = c.id
GROUP BY c.building_number
HAVING SUM(d.funding) > 100000;

-- 2)Вывести названия групп 5-го курса кафедры “Software Development”, которые имеют более 10 пар в первую неделю.
SELECT g.group_name
FROM groups g
JOIN schedules s ON g.id = s.group_id
JOIN disciplines d ON s.discipline_id = d.id
JOIN departments dp ON d.department_id = dp.id
WHERE g.course_number = 5 AND dp.name = 'Software Development'
GROUP BY g.group_name
HAVING COUNT(*) > 10;

-- 3)Вывести названия групп, имеющих рейтинг (средний рейтинг всех студентов группы) больше, чем рейтинг группы “D221”.
SELECT g.group_name
FROM groups g
JOIN ratings r ON g.id = r.group_id
WHERE r.average_rating > (SELECT average_rating FROM ratings WHERE group_id = 'D221');

-- 4)Вывести фамилии и имена преподавателей, ставка которых выше средней ставки профессоров.
SELECT first_name, last_name
FROM teachers
WHERE rate > (SELECT AVG(rate) FROM teachers WHERE position = 'professor');

-- 5)Вывести названия групп, у которых больше одного куратора.
SELECT g.group_name
FROM groups g
JOIN group_curators gc ON g.id = gc.group_id
GROUP BY g.group_name
HAVING COUNT(gc.curator_id) > 1;

-- 6)Вывести названия групп, имеющих рейтинг (средний рейтинг всех студентов группы) меньше, чем минимальный рейтинг групп 5-го курса.
SELECT g.group_name
FROM groups g
JOIN ratings r ON g.id = r.group_id
WHERE r.average_rating < (SELECT MIN(average_rating) FROM ratings WHERE group_name LIKE '%5%' AND course_number = 5);

-- 7)Вывести названия факультетов, суммарный фонд финансирования кафедр которых больше суммарного фонда финансирования кафедр факультета “Computer Science”.
SELECT f.name
FROM faculties f
JOIN departments d ON f.id = d.faculty_id
GROUP BY f.name
HAVING SUM(d.funding) > (SELECT SUM(d2.funding) FROM departments d2 JOIN faculties f2 ON d2.faculty_id = f2.id WHERE f2.name = 'Computer Science');

-- 8)Вывести названия дисциплин и полные имена преподавателей, читающих наибольшее количество лекций по ним.
SELECT disciplines.name AS discipline_name, CONCAT(lecturers.first_name, ' ', lecturers.last_name) AS lecturer_name, COUNT(lectures.id) AS num_lectures 
FROM disciplines 
JOIN lectures ON disciplines.id = lectures.discipline_id 
JOIN lecturers ON lectures.lecturer_id = lecturers.id 
GROUP BY discipline_name, lecturer_name 
ORDER BY num_lectures DESC 
LIMIT 1;


-- 9)Вывести название дисциплины, по которой читается меньше всего лекций:
SELECT discipline_name
FROM lectures
GROUP BY discipline_name
ORDER BY COUNT(*) ASC
LIMIT 1;

-- 10)Вывести количество студентов и читаемых дисциплин на кафедре “Software Development”:
SELECT COUNT(DISTINCT students.student_id) AS student_count, COUNT(DISTINCT lectures.discipline_id) AS discipline_count
FROM students
INNER JOIN groups ON students.group_id = groups.group_id
INNER JOIN lectures ON lectures.group_id = groups.group_id
WHERE groups.department_id = (SELECT department_id FROM departments WHERE department_name = 'Software Development');
