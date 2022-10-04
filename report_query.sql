SELECT scans.emp_number, scans.location, locations.planner_id, scans.hours_worked, SUM(scans.hours_worked) AS suma
FROM `scans`
LEFT JOIN locations ON locations.location_id = scans.location WHERE created_at BETWEEN '2022-09-12' AND '2022-09-18' GROUP BY emp_number,location order by emp_number ASC


SELECT emp_number, MAX(best) FROM (SELECT emp_number, SUM(hours_worked) as best FROM scans WHERE created_at BETWEEN '2022-09-12' AND '2022-09-18' GROUP BY emp_number, location) as bests GROUP BY emp_number

SELECT emp_number, MAX(best),planner_id FROM (SELECT emp_number, SUM(hours_worked) as best,planner_id FROM scans LEFT JOIN locations ON locations.location_id = scans.location WHERE created_at BETWEEN '2022-09-12' AND '2022-09-18' GROUP BY emp_number, location) as bests GROUP BY emp_number

SELECT emp_number, MAX(best),planner_id, location_name, supervisor FROM (SELECT emp_number, SUM(hours_worked) as best,planner_id, location_name, supervisor FROM scans LEFT JOIN locations ON locations.location_id = scans.location LEFT JOIN empleados ON scans.emp_number = empleados.id WHERE created_at BETWEEN '2022-09-19' AND '2022-09-25' GROUP BY emp_number, location) as bests GROUP BY emp_number ORDER BY emp_number



UPDATE scans SET check_out = DATE_SUB(check_out, INTERVAL 11 HOUR), hours_worked = hours_worked - 11  WHERE  hours_worked >16
