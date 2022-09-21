SELECT scans.emp_number, scans.location, locations.planner_id, scans.hours_worked, SUM(scans.hours_worked) AS suma
FROM `scans`
LEFT JOIN locations ON locations.location_id = scans.location WHERE created_at BETWEEN '2022-09-12' AND '2022-09-18' GROUP BY emp_number,location order by emp_number ASC


SELECT emp_number, MAX(best) FROM (SELECT emp_number, SUM(hours_worked) as best FROM scans WHERE created_at BETWEEN '2022-09-12' AND '2022-09-18' GROUP BY emp_number, location) as bests GROUP BY emp_number

SELECT emp_number, MAX(best),planner_id FROM (SELECT emp_number, SUM(hours_worked) as best,planner_id FROM scans LEFT JOIN locations ON locations.location_id = scans.location WHERE created_at BETWEEN '2022-09-12' AND '2022-09-18' GROUP BY emp_number, location) as bests GROUP BY emp_number
