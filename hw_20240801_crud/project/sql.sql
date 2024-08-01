-- 單筆新增
INSERT INTO `teachers` (`id`, `name`, `mobile`) VALUES (NULL, 'john', '0911-111-111');

--單筆修改
UPDATE `teachers` SET `mobile` = '0933-333-333' WHERE `teachers`.`id` = 3;