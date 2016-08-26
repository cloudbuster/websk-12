drop database if exists websk21;
create database websk21;
use websk21;

drop table if exists users;

create table users
(
  id int auto_increment,
  firstName varchar(40),
  lastName varchar(40),
  email varchar (80),
  diet varchar (10),
  sauna boolean,
  primary key (id)
) engine = InnoDB;

insert into users (firstName, lastName, email, diet, sauna) values
('Sami', 'Keijonen', 'samu@suomi24.fi', 'meat', false),
('Mauno', 'Pukarainen', 'mauno.pukarainen@hamina.fi', 'vegetarian', false),
('Rauno', 'Veijola', 'rauno.veijola@jamk.fi', 'meat', true),
('Heini', 'Maukonen', 'heinisma@cc.jyu.fi', 'fish', true),
('Annikki', 'Laakkonen', 'annikki67@suomi24.fi', 'meat', false),
('Reijo', 'Vaarala', 'vaarala.reijo@suomi24.fi', 'meat', true),
('Tauno', 'Peltonen', 'raukkis66@seiska.fi', 'meat', true),
('Erja', 'Blomberg', 'erjablom@grankulla.nu', 'vegetarian', false),
('Rauli', 'Merivaara', 'raulimer@cs.tut.fi', 'meat', true),
('Kaappo', 'Heikura', 'gaappohei@hakkeri.fi', 'fish', false),
('Hanna', 'Kumpulainen', 'hanna.kumpulainen@gmail.com', 'meat', true),
('Antero', 'Mertaranta', 'antero.mertaranta@max.mtv3.fi', 'fish', true),
('Aulis', 'Malinen', 'aumaline@nic.fi', 'fish', false),
('Pirkko', 'Mannola', 'capnpirk@oldiesbutgoldies.net', 'vegetarian', true),
('Matias', 'Haapalainen', 'matias.haapalainen@outlook.com', 'vegetarian', false),
('Timo', 'Taikuri', 'ananasakaama@yle.fi', 'meat', true),
('Andy', 'Lagerspetz', 'andy.lagerspetz@abo.academy.fi', 'fish', true),
('Riku', 'Viitamies', 'riku@rikuweb.fi', 'vegetarian', false),
('Seppo', 'Sonkaja', 'seppo.sonkaja@ilomantsi.fi', 'meat', true),
('EndOf', 'MockupData', 'endof.mockup@data.example.com', '', false);

select * from users;

