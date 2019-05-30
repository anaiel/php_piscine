SELECT datediff(max(`date`), min(`date`)) uptime
FROM member_history
