CREATE TABLE Pasākumi (
    DatumsUnLaiks DATETIME,
    Nosaukums VARCHAR(255),
    NorisesVieta VARCHAR(255)
);
CREATE TABLE Kolektīvi (
    id INT PRIMARY KEY,
    name VARCHAR(80) NOT NULL,
    description VARCHAR(500) NOT NULL
);

INSERT INTO Pasākumi (DatumsUnLaiks, Nosaukums, NorisesVieta)
VALUES 
('2024-03-31 13:00:00', 'Lieldienas Cēsīs', 'Rožu laukums'),
('2024-04-04 18:00:00', 'Leļļu teātra izrāde "Gangsteromīte"', 'Koncertzāle "Cēsis"'),
('2024-07-19 08:00:00', 'Cēsu pilsētas svētki 818', 'Cēsis');

INSERT INTO Kolektīvi (id, name, description)
VALUES 
(1, 'Cēsis', 'Pūtēju orķestris'),
(2, 'Raitais solis', 'Tautu deju ansamblis'),
(3, 'Vidzeme', 'Jauktais koris'),
(4, 'Dzieti', 'Tautas vērtes kopa');
