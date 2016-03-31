-- 定义创建省用户存储过程
-- 参数为 UserName, UserPassword, UserType, GovermentNumber, GovermentName 
-- 共五个参数
DROP PROCEDURE IF EXISTS `CreGovUser`;
DELIMITER //
CREATE PROCEDURE CreGovUser(IN UserName varchar(20), IN UserPassword varchar(20), 
                            IN UserType varchar(20), IN GovermentNumber varchar(20),
                            IN GovermentName varchar(20))  
sql security invoker 
BEGIN
  -- 插入user表
  INSERT INTO `user`(UserName,UserPassword,UserType) 
              VALUES(UserName,UserPassword,UserType);
  -- 插入goverment表
  INSERT INTO `goverment`(GovermentNumber,GovermentName,GovermentUsername) 
                   VALUES(GovermentNumber,GovermentName,UserName);
END //

DELIMITER ;
-- ----------------------------------------
-- 定义创建市用户存储过程
-- 参数为 UserName, UserPassword, UserType, CityGovermentNumber, CityGovermentName
-- 共五个参数

DROP PROCEDURE IF EXISTS `CreCityGovUser`;

DELIMITER //
CREATE PROCEDURE CreCityGovUser(IN UserName varchar(20), IN UserPassword varchar(20), 
                                IN UserType varchar(20), IN CityGovermentNumber varchar(20),
                                IN CityGovermentName varchar(20))
sql security invoker    
BEGIN
  -- 插入user表
  INSERT INTO `user`(UserName,UserPassword,UserType) 
               VALUES(UserName,UserPassword,UserType);
  -- 插入citygoverment表
  INSERT INTO `citygoverment`(CityGovermentNumber,CityGovermentName,CityGovermentUsername) 
               VALUES(CityGovermentNumber,CityGovermentName,UserName);
END //

DELIMITER ;
-- ------------------------------------------
-- 定义创建企业用户存储过程
/*参数为 UserName, UserPassword, UserType,CompanyNumber,CompanyName,
          CompanyAddr,CompanyProperty,CompanyIndustry,CompanyBusiness,
          CompanyContact,CompanyContactAddr,CompanyPostcode,CompanyPhone,
          CompanyFax,CompanyMail
   共15个参数
*/
DROP PROCEDURE IF EXISTS `CreComUser`;

DELIMITER //
CREATE PROCEDURE CreComUser(IN UserName varchar(20),       IN UserPassword varchar(20),      IN UserType varchar(20),
                            IN CompanyNumber varchar(20),  IN CompanyName varchar(20),       IN CompanyAddr varchar(20),
                            IN CompanyProperty varchar(20),IN CompanyIndustry varchar(20),   IN CompanyBusiness varchar(20),
                            IN CompanyContact varchar(20), IN CompanyContactAddr varchar(20),IN CompanyPostcode int,
                            IN CompanyPhone varchar(20),   IN CompanyFax varchar(20),        IN CompanyMail varchar(20))  
sql security invoker  
BEGIN
  -- 插入user表
  INSERT INTO `user`(UserName,UserPassword,UserType) 
              VALUES(UserName,UserPassword,UserType);
  -- 插入citygoverment表
  INSERT INTO `company`(CompanyName,CompanyNumber,CompanyUserName,CompanyAddr,
                        CompanyProperty,CompanyIndustry,CompanyBusiness,CompanyContact,
                        CompanyContactAddr,CompanyPostcode,CompanyPhone,CompanyFax,CompanyMail)
                 VALUES(CompanyName,CompanyNumber,UserName,CompanyAddr,
                        CompanyProperty,CompanyIndustry,CompanyBusiness,CompanyContact,
                        CompanyContactAddr,CompanyPostcode,CompanyPhone,CompanyFax,CompanyMail);
END //

DELIMITER ;

flush privileges;

