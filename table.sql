mysql -h127.0.0.1 -P3306 -uopenshift -ppassword
use sampledb;

select * from secondkill;
drop table secondkill;
create table secondkill (username varchar(20) primary key,time DOUBLE);
insert into secondkill values('user1-0001', 157278723859465612);
