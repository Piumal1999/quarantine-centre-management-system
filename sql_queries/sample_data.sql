/*
CO226 DATABASE PROJECT
Group 20
Sample data
*/


INSERT INTO staff VALUES
  ('ST000001', 'Nimal', 'Silva', 'M', '1977-05-20', '0731234567', 'No.120, Kandy Street, Colombo', 'MANAGEMENT'),
  ('ST000002', 'Dhammika', 'Perera', 'M', '1959-08-21', '0732372645', 'No.5, 2nd Lane, Peradeniya', 'MANAGEMENT'),
  ('ST000003', 'Wasana', 'Ekanayake', 'F', '1980-11-10', '0731253728', 'No. 279/A, Ambatenna Road, Katugasthota', 'MANAGEMENT'),
  ('ST000004', 'Saman', 'Sivakumaran', 'M', '1978-12-12', '0731234567', 'No.120, Main Road, Kaluthara', 'ACCOUNTING'),
  ('ST000005', 'Nuwan', 'Bandara', 'M', '1985-01-05', '0738395673', 'No.678, Flower Apartment, Gampaha', 'ACCOUNTING'),
  ('ST000006', 'Jayani', 'Jayawardana', 'F', '1991-03-09', '0732541933', 'No.99, Peradeniya Road, Kandy', 'LABORATORY'),
  ('ST000007', 'Senaka', ' Senarath', 'M', '1970-11-05', '0732435629', 'No.1, Panadura Road, Colombo', 'LABORATORY'),
  ('ST000008', 'Indumini', 'Bandara', 'F', '1992-06-12', '0735291647', 'No.13, Main Road, Panadura', 'LABORATORY'),
  ('ST000009', 'Nirmala', 'Wimalaratne', 'F', '1969-08-19', '0730987165', '25, 3rd Cross Street, Colombo', 'CLEANING'),
  ('ST000010', 'Sunil', 'Peries', 'M', '1971-06-20', '07312615789', 'No.76/B, Galle Road, Colombo', 'CLEANING'),
  ('ST000011', 'Rasika', 'Suriyasena', 'F', '1975-12-12', '0731234567', 'No.23/A, Samagi Street, Malabe', 'CLEANING'),
  ('ST000012', 'Nushan', 'Senarath', 'M', '1980-11-15', '0739672341', 'No.43, Heenatikumbura, Thalangama', 'CLEANING'),
  ('ST000013', 'Nishan', 'Michael', 'M', '1978-05-19', '0762345443', 'No.234, Matale Street, Kandy', 'CLEANING'),
  ('ST000014', 'Ruvini', 'Amarashinghe', 'F', '1979-10-19', '0714536278', 'No.29, Melbourne Avenue, Matara', 'SUPPORTING'),
  ('ST000015', 'Nilaksha', 'Premaratne', 'M', '1971-02-20', '0739078299', 'No.70, Dam Street, Colombo', 'SUPPORTING'),
  ('ST000016', 'Niranjana', 'Kalupahana', 'F', '1970-12-31', '0740188263', 'No.37, Prince Street, Nuwara Eliya', 'SUPPORTING'),
  ('ST000017', 'Kamal', 'Weerasinghe', 'M', '1985-11-01', '0745534568', '203/3, Horana Road, Panadura', 'SUPPORTING'),
  ('ST000018', 'James', 'Thomas', 'M', '1965-02-21', '0773423463', 'No.34, kachchai North, Kodikamam', 'SUPPORTING'),
  ('ST000019', 'Jeyan', 'Silva', 'M', '1973-06-20', '0731224567', 'No.129, Matale Street, Kandy', 'SECURITY'),
  ('ST000020', 'Robert', 'Anthony', 'M', '1987-07-09', '0751347867', 'No.78, Matale Street, Kandy', 'SECURITY');

INSERT INTO app_login VALUES
  ('admin', MD5('password'), 'ST000001'),
  ('admin2', MD5('password'), 'ST000002'),
  ('admin3', MD5('password'), 'ST000003'),
  ('accountant1', MD5('password'), 'ST000004'),
  ('accountant2', MD5('password'), 'ST000005'),
  ('labstaff1', MD5('password'), 'ST000006'),
  ('labstaff2', MD5('password'), 'ST000007'),
  ('labstaff3', MD5('password'), 'ST000008');

INSERT INTO room VALUES
  ('RM000001', 5, 'ST000010', 'ST000013'),
  ('RM000002', 2, 'ST000011', 'ST000014'),
  ('RM000003', 3, 'ST000009', 'ST000013'),
  ('RM000004', 4, 'ST000009', 'ST000014'),
  ('RM000005', 5, 'ST000010', 'ST000015'),
  ('RM000006', 5, 'ST000011', 'ST000016'),
  ('RM000007', 3, 'ST000012', 'ST000014'),
  ('RM000008', 4, 'ST000013', 'ST000015'),
  ('RM000009', 5, 'ST000010', 'ST000016'),
  ('RM000010', 2, 'ST000009', 'ST000017'),
  ('RM000011', 3, 'ST000013', 'ST000017'),
  ('RM000012', 4, 'ST000013', 'ST000018'),
  ('RM000013', 5, 'ST000011', 'ST000018'),
  ('RM000014', 2, NULL, NULL),
  ('RM000015', 3, NULL, NULL),
  ('RM000016', 3, NULL, NULL),
  ('RM000017', 3, NULL, NULL),
  ('RM000018', 3, NULL, NULL),
  ('RM000019', 5, NULL, NULL),
  ('RM000020', 3, NULL, NULL);

INSERT INTO client VALUES
  ('CL000001', 'Rue', 'Eoforwine', 'M', '1967-05-20', '0735173919', '73 Valley St. West Roxbury', 'NONE', 'NON_VEG', 'RM000002', 'NORMAL', '2022-02-16', NULL),
  ('CL000002', 'Ellington', 'Martialis', 'M', '1988-02-01', '0739162783', '73 Valley St. West Roxbury', 'FULLY', 'VEG', 'RM000002', 'NORMAL', '2022-02-16', NULL),
  ('CL000003', 'Zuza', 'Branislav', 'F', '1973-07-10', '0730100234', '831 Acacia St. Grayslake', 'FULLY', 'NON_VEG', 'RM000001', 'NORMAL', '2022-02-16', NULL),
  ('CL000004', 'Traudl', 'Haul', 'M', '1994-06-23', '0731123743', '831 Acacia St. Grayslake', 'PARTIALLY', 'VEG', 'RM000001', 'NORMAL', '2022-02-16', NULL),
  ('CL000005', 'Fabiana', 'Lauma', 'F', '2000-03-13', '07314323443', '831 Acacia St. Grayslake', 'FULLY', 'NON_VEG', 'RM000001', 'NORMAL', '2022-02-16', NULL),
  ('CL000006', 'Sebastian', 'Gonzalez', 'M', '1996-05-14', '0762736448', '831 Acacia St. Grayslake', 'NONE', 'VEG', 'RM000001', 'NORMAL', '2022-02-16', NULL),
  ('CL000007', 'John', 'Watson', 'M', '1997-04-21', '0763984753', '831 Acacia St. Grayslake', 'FULLY', 'NO_VEG', 'RM000001', 'NORMAL', '2022-02-17', NULL),
  ('CL000008', 'David', 'Joseph', 'M', '1987-04-16', '0764587403', '7787 Edgewood Drive Minot', 'PARTIALLY', 'NON_VEG', 'RM000004', 'NORMAL', '2022-02-17', NULL),
  ('CL000009', 'Charles', 'Daniel', 'M', '1973-07-13', '0776648705', '724 Golf St. Manahawkin', 'FULLY', 'NON_VEG', 'RM000004', 'NORMAL', '2022-02-17', NULL),
  ('CL000010', 'Anthony', 'Mark', 'M', '1967-06-21', '0701893457', '568 Spring St. Voorhees', 'FULLY', 'VEG', 'RM000003', 'NORMAL', '2022-02-19', NULL),
  ('CL000011', 'Scott', 'Timothy', 'M', '1978-05-28', '0772341791', '568 Spring St. Voorhees', 'PARTIALLY', 'VEG', 'RM000003', 'NORMAL', '2022-02-19', NULL),
  ('CL000012', 'Emma', 'Edward', 'F', '1993-04-06', '0768008774', '568 Spring St. Voorhees', 'FULLY', 'NON_VEG', 'RM000003', 'NORMAL', '2022-02-19', NULL),
  ('CL000013', 'Samantha', 'Nicholas', 'F', '1991-07-14', '0739803963', '8626 Orchard St. Richardson', 'FULLY', 'NON_VEG', 'RM000005', 'NORMAL', '2022-02-20', NULL),
  ('CL000014', 'Angela', 'Jonathan', 'F', '1967-09-25', '0768614345', '8626 Orchard St. Richardson', 'PARTIALLY', 'VEG', 'RM000005', 'NORMAL', '2022-02-20', NULL),
  ('CL000015', 'Jerry', 'Brandon', 'M', '1956-12-22', '0734645455', '8626 Orchard St. Richardson', 'FULLY', 'VEG', 'RM000005', 'NORMAL', '2022-02-21', NULL),
  ('CL000016', 'Stephanie', 'Samuel', 'F', '1998-02-14', '0756436343', '8626 Orchard St. Richardson', 'FULLY', 'NON_VEG', 'RM000005', 'NORMAL', '2022-02-21', NULL),
  ('CL000017', 'Harold', 'Alexander', 'M', '1983-03-22', '0712434563', '8626 Orchard St. Richardson', 'PARTIALLY', 'NON_VEG', 'RM000005', 'INFECTED', '2022-02-22', NULL),
  ('CL000018', 'Dylan', 'Jerry', 'M', '1980-02-15', '0763247864', '73 Littleton Lane Piedmont', 'FULLY', 'NON_VEG', 'RM000006', 'NORMAL', '2022-02-22', NULL),
  ('CL000019', 'Emily', 'Adam', 'F', '1996-01-31', '0733465765', '73 Littleton Lane Piedmont', 'PARTIALLY', 'VEG', 'RM000006', 'INFECTED', '2022-02-23', NULL),
  ('CL000020', 'Ashley', 'Peter', 'F', '2000-08-23', '0733456765', '73 Littleton Lane Piedmont', 'FULLY', 'VEG', 'RM000006', 'INFECTED', '2022-02-23', NULL);

INSERT INTO equipment VALUES
  ('EQ000001', 'Ventilator', 'NORMAL', 'ST000001'),
  ('EQ000002', 'Ventilator', 'NORMAL', 'ST000001'),
  ('EQ000003', 'Ventilator', 'NORMAL', 'ST000001'),
  ('EQ000004', 'Electronic Thermometer', 'NORMAL', 'ST000001'),
  ('EQ000005', 'Electronic Thermometer', 'BROKEN', 'ST000001'),
  ('EQ000006', 'Electronic Thermometer', 'NORMAL', 'ST000001'),
  ('EQ000007', 'Blood pressure monitor', 'NORMAL', 'ST000001'),
  ('EQ000008', 'Blood pressure monitor', 'NORMAL', 'ST000001'),
  ('EQ000009', 'Thermometer', 'NORMAL', 'ST000001'),
  ('EQ000010', 'Thermometer', 'NORMAL', 'ST000001');

INSERT INTO test VALUES
  ('TS000001', '2022-02-16', 'RAT', 'NEGATIVE', 'CL000001', 'ST000006'),
  ('TS000002', '2022-02-16', 'RAT', 'NEGATIVE', 'CL000002', 'ST000006'),
  ('TS000003', '2022-02-17', 'PCR', 'PENDING', 'CL000003', 'ST000007'),
  ('TS000004', '2022-02-17', 'PCR', 'PENDING', 'CL000004', 'ST000007'),
  ('TS000005', '2022-02-17', 'PCR', 'PENDING', 'CL000005', 'ST000007'),
  ('TS000006', '2022-02-17', 'PCR', 'PENDING', 'CL000006', 'ST000007'),
  ('TS000007', '2022-02-17', 'PCR', 'PENDING', 'CL000007', 'ST000007'),
  ('TS000008', '2022-02-17', 'PCR', 'PENDING', 'CL000008', 'ST000007'),
  ('TS000009', '2022-02-18', 'PCR', 'NEGATIVE', 'CL000009', 'ST000007'),
  ('TS000010', '2022-02-19', 'RAT', 'NEGATIVE', 'CL000010', 'ST000006'),
  ('TS000011', '2022-02-20', 'RAT', 'NEGATIVE', 'CL000011', 'ST000006'),
  ('TS000012', '2022-02-20', 'PCR', 'NEGATIVE', 'CL000012', 'ST000007'),
  ('TS000013', '2022-02-20', 'PCR', 'PENDING', 'CL000013', 'ST000007'),
  ('TS000014', '2022-02-21', 'PCR', 'PENDING', 'CL000014', 'ST000007'),
  ('TS000015', '2022-02-21', 'PCR', 'NEGATIVE', 'CL000015', 'ST000007'),
  ('TS000016', '2022-02-21', 'RAT', 'NEGATIVE', 'CL000016', 'ST000006'),
  ('TS000017', '2022-02-23', 'RAT', 'POSITIVE', 'CL000017', 'ST000006'),
  ('TS000018', '2022-02-23', 'PCR', 'NEGATIVE', 'CL000018', 'ST000007'),
  ('TS000019', '2022-02-23', 'RAT', 'POSITIVE', 'CL000019', 'ST000006'),
  ('TS000020', '2022-02-24', 'RAT', 'POSITIVE', 'CL000020', 'ST000006');

INSERT INTO payment VALUES
  ('PY000001', '2022-02-16', '7000.00', 'CL000001', 'ST000004'),
  ('PY000002', '2022-02-16', '7000.00', 'CL000002', 'ST000004'),
  ('PY000003', '2022-02-17', '6500.00', 'CL000003', 'ST000004'),
  ('PY000004', '2022-02-17', '7500.00', 'CL000004', 'ST000004'),
  ('PY000005', '2022-02-17', '7000.00', 'CL000005', 'ST000004'),
  ('PY000006', '2022-02-17', '6000.00', 'CL000006', 'ST000004'),
  ('PY000007', '2022-02-17', '5000.00', 'CL000007', 'ST000004'),
  ('PY000008', '2022-02-17', '6000.00', 'CL000008', 'ST000005'),
  ('PY000009', '2022-02-18', '6000.00', 'CL000009', 'ST000005'),
  ('PY000010', '2022-02-19', '6500.00', 'CL000010', 'ST000005'),
  ('PY000011', '2022-02-19', '7000.00', 'CL000011', 'ST000005'),
  ('PY000012', '2022-02-19', '6000.00', 'CL000012', 'ST000005'),
  ('PY000013', '2022-02-20', '7500.00', 'CL000013', 'ST000004'),
  ('PY000014', '2022-02-20', '6000.00', 'CL000014', 'ST000004'),
  ('PY000015', '2022-02-21', '7500.00', 'CL000015', 'ST000004'),
  ('PY000016', '2022-02-21', '6500.00', 'CL000016', 'ST000004'),
  ('PY000017', '2022-02-22', '7000.00', 'CL000017', 'ST000005'),
  ('PY000018', '2022-02-22', '7500.00', 'CL000018', 'ST000005'),
  ('PY000019', '2022-02-22', '6500.00', 'CL000019', 'ST000005'),
  ('PY000020', '2022-02-23', '7000.00', 'CL000020', 'ST000005');
