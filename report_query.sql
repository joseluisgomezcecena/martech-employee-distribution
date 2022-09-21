SELECT scans.emp_number, scans.location, locations.planner_id, scans.hours_worked, SUM(scans.hours_worked) AS suma
FROM `scans`
LEFT JOIN locations ON locations.location_id = scans.location WHERE created_at BETWEEN '2022-09-12' AND '2022-09-18' GROUP BY emp_number,location order by emp_number ASC
