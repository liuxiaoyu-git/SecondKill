1)oc new-project secondkill

2)部署一个mysql
oc new-app mysql-ephemeral --name mysql -p MYSQL_USER=openshift -p MYSQL_PASSWORD=password -p MYSQL_ROOT_PASSWORD=password -p MYSQL_DATABASE=sampledb

3)创建表
mysql -h127.0.0.1 -P3306 -uopenshift -ppassword
use sampledb;

select * from secondkill;
drop table secondkill;
create table secondkill (username varchar(20) primary key,time DOUBLE);
insert into secondkill values('user1-0001', 157278723859465612);

4)创建应用和相关route
oc new-app https://github.com/liuxiaoyu-git/SecondKill --name=secondkill --env MYSQL_SERVICE_HOST=mysql.secondkill.svc MYSQL_SERVICE_PORT=3306 DATABASE_NAME=sampledb DATABASE_USER=openshift DATABASE_PASSWORD=password
oc expose svc secondkill 
