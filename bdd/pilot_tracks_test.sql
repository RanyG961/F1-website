USE f1_website;

ALTER TABLE pilots ADD code VARCHAR(5);
ALTER TABLE pilots ADD still_driving BOOLEAN NOT NULL DEFAULT TRUE;

INSERT INTO pilots(first_name, last_name) VALUES("Lewis", "Hamilton");
INSERT INTO pilots(first_name, last_name) VALUES("Valtteri", "Bottas");
INSERT INTO pilots(first_name, last_name) VALUES("Max", "Verstappen");
INSERT INTO pilots(first_name, last_name) VALUES("Charles", "Leclerc");
INSERT INTO pilots(first_name, last_name) VALUES("Sebastian", "Vettel");
INSERT INTO pilots(first_name, last_name) VALUES("Carlos", "Sainz Jr");
INSERT INTO pilots(first_name, last_name) VALUES("Pierre", "Gasly");
INSERT INTO pilots(first_name, last_name) VALUES("Alexander", "Albon");
INSERT INTO pilots(first_name, last_name) VALUES("Daniel", "Ricciardo");
INSERT INTO pilots(first_name, last_name) VALUES("Sergio", "Perez");
INSERT INTO pilots(first_name, last_name) VALUES("Lando", "Norris");
INSERT INTO pilots(first_name, last_name) VALUES("Kimi", "Raikkonen");
INSERT INTO pilots(first_name, last_name) VALUES("Daniil", "Kvyat");
INSERT INTO pilots(first_name, last_name) VALUES("Nico", "Hulkennberg");
INSERT INTO pilots(first_name, last_name) VALUES("Lance", "Stroll");
INSERT INTO pilots(first_name, last_name) VALUES("Kevin", "Magnussen");
INSERT INTO pilots(first_name, last_name) VALUES("Antonio", "Giovinazzi");
INSERT INTO pilots(first_name, last_name) VALUES("Romain", "Grosjean");
INSERT INTO pilots(first_name, last_name) VALUES("Robert", "Kubica");
INSERT INTO pilots(first_name, last_name) VALUES("Georges", "Russel");


UPDATE pilots SET code = "HAM" WHERE last_name = "Hamilton"; 
UPDATE pilots SET code = "VER" WHERE last_name = "Verstappen"; 
UPDATE pilots SET code = "LEC" WHERE last_name = "Leclerc"; 
UPDATE pilots SET code = "BOT" WHERE last_name = "Bottas"; 
UPDATE pilots SET code = "VET" WHERE last_name = "Vettel"; 
UPDATE pilots SET code = "ALB" WHERE last_name = "Albon"; 
UPDATE pilots SET code = "PER" WHERE last_name = "Perez"; 
UPDATE pilots SET code = "NOR" WHERE last_name = "Norris"; 
UPDATE pilots SET code = "KVY" WHERE last_name = "Kvyat"; 
UPDATE pilots SET code = "SAI" WHERE last_name = "Sainz Jr"; 
UPDATE pilots SET code = "RIC" WHERE last_name = "Ricciardo"; 
UPDATE pilots SET code = "HUL" WHERE last_name = "Hulkennberg"; 
UPDATE pilots SET code = "RAI" WHERE last_name = "Raikkonen"; 
UPDATE pilots SET code = "MAG" WHERE last_name = "Magnussen"; 
UPDATE pilots SET code = "GRO" WHERE last_name = "Grosjean"; 
UPDATE pilots SET code = "GIO" WHERE last_name = "Giovinazzi"; 
UPDATE pilots SET code = "RUS" WHERE last_name = "Russel"; 
UPDATE pilots SET code = "GAS" WHERE last_name = "Gasly"; 
UPDATE pilots SET code = "KUB" WHERE last_name = "Kubica"; 
UPDATE pilots SET code = "STR" WHERE last_name = "Stroll"; 


ALTER TABLE tracks ADD  circuitID VARCHAR(20);


INSERT INTO tracks(country) VALUES("Australie");
INSERT INTO tracks(country) VALUES("Bahrein");
INSERT INTO tracks(country) VALUES("Chine");
INSERT INTO tracks(country) VALUES("Azerbaidjan");
INSERT INTO tracks(country) VALUES("Espagne");
INSERT INTO tracks(country) VALUES("Monaco");
INSERT INTO tracks(country) VALUES("Canada");
INSERT INTO tracks(country) VALUES("France");
INSERT INTO tracks(country) VALUES("Autriche");
INSERT INTO tracks(country) VALUES("Grande-Bretagne");
INSERT INTO tracks(country) VALUES("Allemagne");
INSERT INTO tracks(country) VALUES("Hongrie");
INSERT INTO tracks(country) VALUES("Belgique");
INSERT INTO tracks(country) VALUES("Italie");
INSERT INTO tracks(country) VALUES("Singapour");
INSERT INTO tracks(country) VALUES("Russie");
INSERT INTO tracks(country) VALUES("Japon");
INSERT INTO tracks(country) VALUES("Mexique");
INSERT INTO tracks(country) VALUES("USA");
INSERT INTO tracks(country) VALUES("Bresil");
INSERT INTO tracks(country) VALUES("EAU");


UPDATE tracks SET circuitID = "albert_park" WHERE country = ("Australie");
UPDATE tracks SET circuitID = "bahrain" WHERE country = ("Bahrein");
UPDATE tracks SET circuitID = "shanghai" WHERE country = ("Chine");
UPDATE tracks SET circuitID = "BAK" WHERE country = ("Azerbaidjan");
UPDATE tracks SET circuitID = "catalunya" WHERE country = ("Espagne");
UPDATE tracks SET circuitID = "monaco" WHERE country = ("Monaco");
UPDATE tracks SET circuitID = "villeneuve" WHERE country = ("Canada");
UPDATE tracks SET circuitID = "ricard" WHERE country = ("France");
UPDATE tracks SET circuitID = "red_bull_ring" WHERE country = ("Autriche");
UPDATE tracks SET circuitID = "silverstone" WHERE country = ("Grande-Bretagne");
UPDATE tracks SET circuitID = "hockenheimring" WHERE country = ("Allemagne");
UPDATE tracks SET circuitID = "hungaroring" WHERE country = ("Hongrie");
UPDATE tracks SET circuitID = "spa" WHERE country = ("Belgique");
UPDATE tracks SET circuitID = "monza" WHERE country = ("Italie");
UPDATE tracks SET circuitID = "marina_bay" WHERE country = ("Singapour");
UPDATE tracks SET circuitID = "sochi" WHERE country = ("Russie");
UPDATE tracks SET circuitID = "suzuka" WHERE country = ("Japon");
UPDATE tracks SET circuitID = "rodriguez" WHERE country = ("Mexique");
UPDATE tracks SET circuitID = "americas" WHERE country = ("USA");
UPDATE tracks SET circuitID = "interlagos" WHERE country = ("Bresil");
UPDATE tracks SET circuitID = "yas_marina" WHERE country = ("EAU");

INSERT INTO teams(name, engine, car_name) VALUES("Mercedes-AMG", "Mercedes", "W11");
INSERT INTO teams(name, engine, car_name) VALUES("Scuderia-Ferrari", "Ferrari", "SF1000");
INSERT INTO teams(name, engine, car_name) VALUES("Red-Bull", "Honda", "RB16");
INSERT INTO teams(name, engine, car_name) VALUES("McLaren-F1", "Renault", "MCL35");
INSERT INTO teams(name, engine, car_name) VALUES("Renault-F1", "Renault", "R.S.20");
INSERT INTO teams(name, engine, car_name) VALUES("Alfa-Romeo", "Ferrari", "C39");
INSERT INTO teams(name, engine, car_name) VALUES("BWT Racing-Point", "Mercedes", "RP20");
INSERT INTO teams(name, engine, car_name) VALUES("Scuderia-AlphaTauri", "Honda", "AT01");
INSERT INTO teams(name, engine, car_name) VALUES("Haas-F1", "Ferrari", "VF-20");
INSERT INTO teams(name, engine, car_name) VALUES("Williams-Racing", "Mercedes", "FW43");

INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(1, 1, 44);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(2, 1, 77);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(5, 2, 5);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES (4, 2, 16);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(3, 3, 33);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(8, 3, 23);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(6, 4, 55);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(11, 4, 55);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(9, 5, 3);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(14, 5, 60);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(12, 6, 7);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(17, 6, 99);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(10, 7, 11);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(15, 7, 18);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(13, 8, 26);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(7, 8, 10);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(18, 9, 8);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(16, 9, 20);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(19, 10, 63);
INSERT INTO pilot_team(pilot_id, team_id, pilot_number) VALUES(20, 10, 88);
