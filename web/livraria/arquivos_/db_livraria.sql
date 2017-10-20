##APAGAR DATABASE SE EXISTIR
drop database if exists db_livraria;

##CRIAR DATABASE SE NÃO EXISTIR
create database if not exists  db_livraria;

use db_livraria;

create table funcao
(
	cod_funcao int primary key auto_increment,
	nome_funcao varchar (30) not null
);

desc funcao;

insert into funcao
	(nome_funcao)
values 
	('administrador'),
	('cataloguista'),
	('operador básico');

select * from funcao;

create table usuario
(
	cod_usuario int primary key auto_increment,
	nome_usuario varchar (60) not null,
	nome_login varchar (20) not null,
	senha varchar (10) not null,
	cod_funcao int not null,

	foreign key (cod_funcao) references funcao (cod_funcao) 
);

desc usuario;

insert into usuario 
	(nome_usuario, nome_login, senha, cod_funcao)
values
	('adiministrador','adm','123','1'),
	('cataloguista','cat','123','2'),
	('operador basico','op','123','3');

select * from usuario;

select 
	u.nome_usuario as usuario,
	f.cod_funcao as funcao
from usuario as u
inner join funcao as f
on (u.cod_funcao = f.cod_funcao)
where nome_usuario = 'adiministrador';

select 
	u.nome_usuario, u.nome_login, u.senha,
    f.nome_funcao
from usuario as u 
inner join funcao as f
on (u.cod_funcao = f.cod_funcao);

create table contato 
(
	cod_contato int auto_increment primary key ,
	nome varchar (60) not null,
	sexo varchar (2) not null,
	profissao varchar (60) not null ,
	telefone varchar (12) not null,
	celular varchar (13) not null,
	email varchar (60) not null,
	home varchar (60) ,
	face varchar (60) ,
	sugestoes text,
	informacoes text
);

desc contato;

insert into contato 
	(nome, sexo,profissao, telefone, celular, email, home, face,sugestoes,informacoes)
values
	('Maria', 'F','auxiliar de auxiliar','1141418899','11987453232','maria@maria.com','maria.com','facebook.com/maria','nao há','não há'),
	('Joao','M','aprovador','1146465698','11987874521','joao@joao.com','joao.com','facebook.com/joao','nao há','nao há'),
	('Ana','F','comediante','1236364587','12965652145','ana@ana.com','ana.com','facebook.com/ana','nao há','nao há'),
	('Pedro','M','ator','2136259874','21963214578','pedro@pedro.com','pedro.com','facebook.com/pedro','nao há',	'nao há'),
	('Sebastiao','M','medico','1332548974','13932141596','sebastiao@sebastiao.com','sebastiao.com','facebook.com/sebastiao','nao há','nao há'),
	('Juliana','F','psicologa','1336549874','13987423216','juliana@juliana.com','juliana.com','facebook.com/juliana','nao há','nao há'),
	('Mariana','F','enfermeira','1146693214','11969687898','mariana@mariana.com','mariana.com','facebook.com/mariana','nao há','nao há');

select * from contato;

create table lojas
(
	cod_loja int auto_increment primary key,
    foto_loja varchar (60),
    telefone varchar (12) not null,
    email varchar (60) not null,
    endereco varchar (60) not null
);

desc lojas;

insert into lojas 
	(foto_loja, telefone, email, endereco)
values
	('arquivos/livraria-1.jpg','1136529874', 'loja1@woodwoodpecker.com', 'Sé'),
	('arquivos/livraria-2.jpg','1146467898', 'loja2@woodwoodpecker.com', 'Vila Mariana'),
	('arquivos/livraria-3.jpg','1135987412', 'loja3@woodwoodpecker.com', 'Brás'),
	('arquivos/livraria-4.jpg','1136541287', 'loja4@woodwoodpecker.com', 'Cotia');
    
select * from lojas;

create table estatus
(
	cod_estatus int primary key auto_increment,
	texto varchar(4)
);

desc estatus;

insert into estatus
	(texto)
values
	('sim'),
    ('não');

select * from estatus;

create table autor
(
	cod_autor int auto_increment primary key,
	nome_autor varchar (60) not null,
	foto_autor varchar (60) ,
	dt_nasc date,
	bibliografia text 
);

desc autor;

insert into autor
	(nome_autor, foto_autor, dt_nasc, bibliografia)
values
	('Friedrich Nietzsche', 'arquivos/autor-1.jpg', '1844-10-15', 'Friedrich Wilhelm Nietzsche (Röcken, 15 de outubro de 1844 — Weimar, 25 de agosto de 1900) foi um filólogo, filósofo, crítico cultural, poeta e compositor alemão do século XIX. Ele escreveu vários textos críticos sobre a religião, a moral, a cultura contemporânea, filosofia e ciência, exibindo uma predileção por metáfora, ironia e aforismo.'),
	('Augusto Cury', 'arquivos/autor-2.jpg', '1958-10-02','Augusto Jorge Cury, nascido em 02 de outubro de 1958, é médico, psiquiatra, psicoterapeuta e escritor brasileiro. Desenvolveu a teoria da Inteligência Multifocal, que estuda sobre o funcionamento da mente, o processo de construção do pensamento e formação de pensadores. Seus livros já venderam 20 milhões de exemplares somente no Brasil.'),
	('Cecília Meireles', 'arquivos/autor-3.jpg', '1901-11-07','Cecília Benevides de Carvalho Meireles nasceu no bairro da Tijuca, Rio de Janeiro, em 7 de novembro de 1901, filha dos açorianos Carlos Alberto de Carvalho Meireles, um funcionário de banco, e Matilde Benevides Meireles, uma professora.'),
	('Álvares de Azevedo', 'arquivos/autor-4.jpg', '1831-09-12','Filho de Inácio Manuel Álvares de Azevedo e Maria Luísa Mota Azevedo, passou a infância no Rio de Janeiro, onde iniciou seus estudos. Voltou a São Paulo, em 1847, para estudar na Faculdade de Direito do Largo de São Francisco, onde, desde logo, ganhou fama por brilhantes e precoces produções literárias. Destacou-se pela facilidade de aprender línguas e pelo espírito jovial e sentimental.'),
	('J. K. Rowling', 'arquivos/autor-5.jpg', '1965-07-31','A escritora britânica Joanne Kathleen Rowling nasceu na cidade de Yate, nas proximidades de Bristol, na Inglaterra, em 31 de julho de 1965. Ela se tornaria célebre pela criação do bruxinho Harry Potter, que lhe renderia sete volumes de uma série premiada e aceita quase unanimemente pela crítica e pelo público.');

select * from autor;

create table autores_destaque
(
	cod_autor_destaque int primary key auto_increment, 
	cod_autor int,
	cod_estatus int,

	foreign key (cod_autor) references autor (cod_autor),
	foreign key (cod_estatus) references estatus (cod_estatus)
);

desc autores_destaque;

insert into autores_destaque
	(cod_autor, cod_estatus)
values
	('1','1'),
	('2','2'),
	('3','1'),
	('4','2'),
	('5','2');
    
select 
	a.nome_autor,
    e.texto
from autor as a
inner join autores_destaque as d
on (a.cod_autor = d.cod_autor) 
inner join estatus as e 
on (d.cod_estatus = e.cod_estatus);


create table categoria
(
	cod_categoria int auto_increment primary key,
    nome_categoria varchar (60) not null
);

desc categoria;

insert into categoria
	(nome_categoria)
values
	('Técnicos'),
	('Didáticos'),
	('Infantis');

select * from categoria; 

create table subcategoria
(
	cod_subcategoria int primary key auto_increment,
    nome_subcategoria varchar (60),
    cod_categoria int,
    
    foreign key (cod_categoria) references categoria (cod_categoria)
);

desc subcategoria;

insert into subcategoria
	(nome_subcategoria, cod_categoria)
values
	('Informática','1'),
	('Algoritimos','1'),
    ('Português','2'),
    ('Matematica','2'),
    ('João e Maria','3'),
    ('Mangas','3');
    
select * from subcategoria;

select 
	c.nome_categoria,
	s.nome_subcategoria
from categoria as c
inner join subcategoria as s
on (c.cod_categoria = s.cod_categoria);

create table livro
(
	cod_livro int auto_increment primary key,
	foto_livro varchar (60) not null,
	nome_livro varchar (60) not null,
	desc_livro text,
	preco_livro float(5,2),
	cod_autor int,
    cod_subcategoria int,
    visualizacao int not null DEFAULT 0,

	foreign key (cod_autor) references autor (cod_autor),
	foreign key (cod_subcategoria) references subcategoria (cod_subcategoria)
);    

desc livro;

insert into livro 
	(foto_livro, nome_livro, preco_livro, cod_autor, desc_livro,cod_subcategoria)
values
	('arquivos/livro-1.jpg','Harry Potter e o Prisioneiro de Azkaban','20.00','5','Durante 12 anos o forte de Azkaban guardou o prisioneiro Sirius Black, acusado de matar 13 pessoas e ser o principal ajudante de Voldemort, o Senhor das Trevas. Agora ele conseguiu escapar, deixando apenas uma pista: seu destino é a escola de Hogwarts, em busca de Harry Potter.','1'),
	('arquivos/livro-2.jpg','Ansiedade - Como Enfrentar o Mal do Século','14.90','2','Você sofre por antecipação? Acorda cansado? Não tolera trabalhar com pessoas lentas? Tem dores de cabeça ou muscular? Esquece-se das coisas com facilidade? Se você respondeu “sim” a alguma dessas questões, é bem provável que sofra da Síndrome do Pensamento Acelerado (SPA).','2'),
	('arquivos/livro-3.jpg','Friedrich Nietzsche - Obras Escolhidas','61.22','1','A obra do filósofo alemão Friedrich Nietzsche (1844-1900) permaneceu, durante um longo período, incompreendida e mesmo não lida. Primeiro, em função da decadência mental que acometeu o autor e levou-o precocemente à morte, aos 55 anos, impossibilitando que defendesse seus escritos.','3'),
	('arquivos/livro-4.jpg','Noite na Taverna','31.60','4','Um grupo de boêmios em uma taverna filosofando sobre a vida. Cinco amigos relembram casos sanguinolentos de amor, depurando suas dores e seus males num ambiente sombrio. Nesta adaptação em HQ de Noite na Taverna, publicado originalmente em 1855, pelo jovem Álvares de Azevedo...','4'),
	('arquivos/livro-5.jpg','Romanceiro da Inconfidência','29.40','3','De fato, o "Romanceiro da Inconfidência", publicado há alguns meses, resulta de uma combinação homogênea entre força poética, domínio da língua, erudição, e senso do detalhe histórico valorizado em vista de uma transposição superior, própria ao código da poesia.','5');

select * from livro;

select 
	l.nome_livro, l.foto_livro, l.preco_livro, l.desc_livro,
    a.nome_autor,
    s.nome_subcategoria
from livro as l
inner join autor as a
on (l.cod_autor = a.cod_autor)
inner join subcategoria as s
on (l.cod_subcategoria = s.cod_subcategoria)
order by l.nome_livro;

create table livro_mes
(
	cod_livro_mes int auto_increment primary key, 
	cod_livro int,
	cod_estatus int,

	foreign key (cod_estatus) references estatus (cod_estatus)
);

desc livro_mes;

insert into livro_mes
	(cod_livro, cod_estatus)
values
	('1','2'),
	('2','2'),
	('3','2'),
	('4','1'),
	('5','2');
    
select 
	l.nome_livro as livroa, l.desc_livro, l.foto_livro,
    e.texto
from livro as l
inner join livro_mes as m
on (l.cod_livro = m.cod_livro)
inner join autor as a 
on (l.cod_autor = a.cod_autor)
inner join estatus as e
on (m.cod_estatus = e.cod_estatus)
where m.cod_estatus = 1;

select 
	l.nome_livro as livroa, l.desc_livro, l.foto_livro, l.cod_livro, 
	a.nome_autor, 
	e.texto, 
	m.cod_livro_mes, m.cod_estatus 
from livro as l 
inner join livro_mes as m 
on (l.cod_livro = m.cod_livro) 
inner join autor as a 
on (l.cod_autor = a.cod_autor) 
inner join estatus as e 
on (m.cod_estatus = e.cod_estatus) ;


desc subcategoria;

select * from subcategoria;

select 
	c.cod_categoria, c.nome_categoria,
	s.nome_subcategoria
from categoria as c
inner join subcategoria as s
on (c.cod_categoria = s.cod_categoria)
order by nome_subcategoria;    
    
    
select * from categoria order by nome_categoria;    

select * from livro;
use db_livraria;
select l.cod_livro, l.foto_livro, l.nome_livro, l.desc_livro, l.preco_livro, 
sum(l.visualizacao) as visualizacao, a.cod_autor, a.nome_autor as nomeautor, 
s.cod_subcategoria, s.nome_subcategoria 
from livro as l 
left join autor as a 
on (l.cod_autor = a.cod_autor) 
inner join subcategoria as s 
on (l.cod_subcategoria = s.cod_subcategoria) group by nome_livro order by visualizacao desc;

select sum(visualizacao)as visusalizacao from livro;


