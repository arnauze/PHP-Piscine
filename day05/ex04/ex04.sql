UPDATE `ft_table` SET `ft_table`.`creation_date` = DATE_ADD(`ft_table`.`creation_date`, INTERVAL 20 YEAR) WHERE `ft_table`.`id` > '5';