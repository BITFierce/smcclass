   -- ����ʡ���û�������Ϊ sheng
create user  sheng   IDENTIFIED by 'sheng' ;         
   -- Ϊʡ���û��������б������ɾ���ġ����Ȩ��            
grant select, insert, update, delete on `database`.* to sheng@`%` ; 

   -- ����DBA�û�������Ϊdba
create user  dba  IDENTIFIED by 'dba' ;     
   -- ΪDBA��������������ݿ��Ȩ��    
grant all on `database` to dba@`%` ; 

   -- �����м��û�������Ϊ shi;
create user  shi  IDENTIFIED by 'shi' ;       
   -- Ϊ�м��û�����company�������ɾ���ġ����Ȩ�� 
grant select, insert, update, delete on `database`.company to shi@`%`;     
   -- Ϊ�м��û�����dataacquisition�������ɾ���ġ����Ȩ��     
grant select, insert, update, delete on `database`.dataacquisition to shi@`%`;  
   -- Ϊ�м��û�����notice�������ɾ���ġ����Ȩ��
grant select, insert, update, delete on `database`.notice to shi@`%`;           

   -- ������ҵ���û�������Ϊ qiye;
create user  qiye  IDENTIFIED by 'qiye' ;      
   -- Ϊ��ҵ���û�����ompany�������ɾ���ġ����Ȩ��
grant select, insert, update, delete on `database`.company to qiye@`%` ;  
   -- Ϊ��ҵ���û�����dataacquisition�������ɾ���ġ����Ȩ��      
grant select, insert, update, delete on `database`.dataacquisition to qiye@`%` ;