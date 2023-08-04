-- 1)Создайте базу данных «Телефонный справочник». Эта база данных должна содержать одну таблицу
-- «Люди». В таблице нужно хранить: ФИО человека, дату
-- рождения, пол, телефон, город проживания, страна проживания, домашний адрес. Для создания базы данных
-- используйте запрос CREATE DATABASE. Для создания
-- таблицы используйте запрос CREATE TABLE.
CREATE DATABASE Phonebook;
CREATE TABLE People (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    FullName VARCHAR(255) NOT NULL,
    DateOfBirth DATE NOT NULL,
    Gender VARCHAR(10) NOT NULL,
    Phone VARCHAR(20) NOT NULL,
    City VARCHAR(255) NOT NULL,
    Country VARCHAR(255) NOT NULL,
    HomeAddress VARCHAR(255) NOT NULL
);

-- Задание 2. Создайте базу данных «Продажи». База данных
-- должна содержать информацию о продавцах, покупателях,
-- продажах. Необходимо хранить следующую информацию:
-- 1. О продавцах: ФИО, email, контактный телефон
-- 2. О покупателях: ФИО, email, контактный телефон
-- 3. О продажах: покупатель, продавец, название товара, цена
-- продажи, дата сделки.
-- Для создания базы данных используйте запрос CREATE
-- DATABASE. Для создания таблицы используйте запрос
-- CREATE TABLE. Обязательно при создании таблиц задавать
-- связи между ними.
CREATE DATABASE Sales;
CREATE TABLE Sellers (
    SellerID INT PRIMARY KEY AUTO_INCREMENT,
    FullName VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Phone VARCHAR(20) NOT NULL
);

CREATE TABLE Buyers (
    BuyerID INT PRIMARY KEY AUTO_INCREMENT,
    FullName VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Phone VARCHAR(20) NOT NULL
);

CREATE TABLE Sales (
    SaleID INT PRIMARY KEY AUTO_INCREMENT,
    BuyerID INT NOT NULL,
    SellerID INT NOT NULL,
    ProductName VARCHAR(255) NOT NULL,
    Price DECIMAL(10,2) NOT NULL,
    SaleDate DATE NOT NULL,
    FOREIGN KEY (BuyerID) REFERENCES Buyers(BuyerID),
    FOREIGN KEY (SellerID) REFERENCES Sellers(SellerID)
);


-- Задание 3. Создайте базу данных «Музыкальная коллекция». База данных должна содержать информацию о музыкальных дисках, исполнителях, стилях. Необходимо хранить
-- следующую информацию:
-- 1. О музыкальном диске: название диска, исполнитель, дата
-- выпуска, стиль, издатель
-- 2. О стилях: названия стилей
-- 3. Об исполнителях: название
-- 4. Об издателях: название, страна
-- 5. О песнях: название песни, название диска, длительность
-- песни, музыкальный стиль песни, исполнитель.
CREATE DATABASE MusicCollection;
CREATE TABLE Discs (
    DiscID INT PRIMARY KEY AUTO_INCREMENT,
    DiscName VARCHAR(255) NOT NULL,
    ReleaseDate DATE NOT NULL,
    PublisherID INT NOT NULL,
    Review TEXT NOT NULL,
    FOREIGN KEY (PublisherID) REFERENCES Publishers(PublisherID)
);

CREATE TABLE Styles (
    StyleID INT PRIMARY KEY AUTO_INCREMENT,
    StyleName VARCHAR(255) NOT NULL
);

CREATE TABLE Artists (
    ArtistID INT PRIMARY KEY AUTO_INCREMENT,
    ArtistName VARCHAR(255) NOT NULL
);

CREATE TABLE Publishers (
    PublisherID INT PRIMARY KEY AUTO_INCREMENT,
    PublisherName VARCHAR(255) NOT NULL,
    Country VARCHAR(255) NOT NULL,
    LegalAddress VARCHAR(255) NOT NULL
);

CREATE TABLE Songs (
    SongID INT PRIMARY KEY AUTO_INCREMENT,
    SongName VARCHAR(255) NOT NULL,
    DiscID INT NOT NULL,
    Duration TIME NOT NULL,
    StyleID INT NOT NULL,
    ArtistID INT NOT NULL,
    FOREIGN KEY (DiscID) REFERENCES Discs(DiscID),
    FOREIGN KEY (StyleID) REFERENCES Styles(StyleID),
    FOREIGN KEY (ArtistID) REFERENCES Artists(ArtistID)
);

-- Задание 4. Все задания необходимо выполнить по отношению к базе данных из третьего задания:
-- 1. Добавьте к уже существующей таблице с информацией
-- о музыкальном диске столбец с краткой рецензией на него
-- 2. Добавьте к уже существующей таблице с информацией об
-- издателе столбец с юридическим адресом главного офиса
-- 3. Измените в уже существующей таблице с информацией
-- о песнях размер поля, хранящий название песни
-- 4. Удалите из уже существующей таблицы с информацией
-- об издателе столбец с юридическим адресом главного
-- офиса
-- 5. Удалите связь между таблицами «музыкальных дисков»
-- и «исполнителей»
-- 6. Добавьте связь между таблицами «музыкальных дисков»
-- и «исполнителей»
ALTER TABLE Discs ADD Review TEXT NOT NULL;
ALTER TABLE Publishers ADD LegalAddress VARCHAR(255) NOT NULL;
ALTER TABLE Songs MODIFY SongName VARCHAR(300) NOT NULL;
ALTER TABLE Publishers DROP COLUMN LegalAddress;
ALTER TABLE Discs DROP FOREIGN KEY PublisherID;
ALTER TABLE Discs ADD ArtistID INT NOT NULL, ADD FOREIGN KEY (ArtistID) REFERENCES Artists(ArtistID);


-- Задание 5. Создайте следующие представления. В качестве
-- базы данных используйте базу данных из третьего задания:
-- 1. Представление отображает названия всех стилей
-- 2. Представление отображает названия всех издателей
-- 3. Представление отображает полную информацию о диске:
-- название диска, исполнитель, дата выпуска, стиль, издатель.
CREATE VIEW StylesView AS 
SELECT StyleName FROM Styles;

CREATE VIEW PublishersView AS 
SELECT PublisherName FROM Publishers;

CREATE VIEW DiscsView AS 
SELECT DiscName, ArtistName, ReleaseDate, StyleName, PublisherName 
FROM Discs 
INNER JOIN Artists ON Discs.ArtistID = Artists.ArtistID 
INNER JOIN Styles ON Discs.StyleID = Styles.StyleID 
INNER JOIN Publishers ON Discs.PublisherID = Publishers.PublisherID;
