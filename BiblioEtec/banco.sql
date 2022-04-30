create table AlunosReg( 
rm char(10) not null primary key, 
name char(100) not null, serie char(40) not null, 
curso char(100) not null, 
email char(100) not null, 
tel char(100) not null) Engine = InnoDB;

create table livrosEmpre( 
id int not null primary key auto_increment, 
nameAluno char(100) not null,  
nameLivro char(100) not null,  
serie char(100) not null, 
curso char(100) not null, 
email char(100) not null, 
tel char(100) not null, 
status char(100) not null, 
dateEmpre char(100) not null, 
dateDev char(100) not null) Engine = InnoDB;


create table livrosEmpreReg( 
id int not null primary key auto_increment, 
rm char(100) not null,
cod char(100) not null,
nameAluno char(100) not null,  
nameLivro char(100) not null,  
serie char(100) not null, 
curso char(100) not null, 
email char(100) not null, 
tel char(100) not null, 
status char(100) not null, 
dateEmpre char(100) not null, 
dateDev char(100) not null) Engine = InnoDB;



create table livrosReg( 
cod char(100) not null primary key, 
name char(100) not null,
status char(90),
autor char(100) not null,
estante char(90) not null,
genero char(90) not null
) Engine = InnoDB;


DELETE FROM `alunosreg` WHERE `alunosreg`.`idAluno` = 1