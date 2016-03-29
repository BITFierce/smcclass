   -- 创建省级用户，密码为 sheng
create user  sheng   IDENTIFIED by 'sheng' ;         
   -- 为省级用户赋予所有表的增、删、改、查的权限            
grant select, insert, update, delete on `database`.* to sheng@`%` ; 

   -- 创建DBA用户，密码为dba
create user  dba  IDENTIFIED by 'dba' ;     
   -- 为DBA赋予管理整个数据库的权限    
grant all on `database` to dba@`%` ; 

   -- 创建市级用户，密码为 shi;
create user  shi  IDENTIFIED by 'shi' ;       
   -- 为市级用户分配company表的增、删、改、查的权限 
grant select, insert, update, delete on `database`.company to shi@`%`;     
   -- 为市级用户分配dataacquisition表的增、删、改、查的权限     
grant select, insert, update, delete on `database`.dataacquisition to shi@`%`;  
   -- 为市级用户分配notice表的增、删、改、查的权限
grant select, insert, update, delete on `database`.notice to shi@`%`;           

   -- 创建企业级用户，密码为 qiye;
create user  qiye  IDENTIFIED by 'qiye' ;      
   -- 为企业级用户分配ompany表的增、删、改、查的权限
grant select, insert, update, delete on `database`.company to qiye@`%` ;  
   -- 为企业级用户分配dataacquisition表的增、删、改、查的权限      
grant select, insert, update, delete on `database`.dataacquisition to qiye@`%` ;