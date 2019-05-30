SELECT md5(concat(replace(phone_number, '7', '9'), '42')) ft5
FROM distrib
WHERE id_distrib = '84'
