1. Создать папку с проэктом на вебсервере (был использован OpenServer)
2. Скопировать проэкт с репозитория
    *git clone https://github.com/MalinovskyM/testGalanix.git
3. Создать базу данных 'test'. Таблица 'test'.
    * Create DATABASE `test`;
    * USE `test`;
    * CREATE TABLE `test` (
           `id` int(11) NOT NULL,
           `UID` int(11) DEFAULT NULL,
           `Name` varchar(90) DEFAULT NULL,
           `Age` int(11) DEFAULT NULL,
           `Email` varchar(90) DEFAULT NULL,
           `Phone` varchar(20) DEFAULT NULL,
           `Gender` varchar(90) DEFAULT NULL
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
     * ALTER TABLE `test` ADD PRIMARY KEY (`id`);
     * ALTER TABLE `test` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
4. Настроить подключение к базе данных в файле Helper.php в функции linksql()
5. Перейти на страницу проэкта в браузере.