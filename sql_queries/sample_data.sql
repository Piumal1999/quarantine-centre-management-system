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
  ('ST000013', 'Ruvini', 'Amarashinghe', 'F', '1979-10-19', '0714536278', 'No.29, Melbourne Avenue, Matara', 'SUPPORTING'),
  ('ST000014', 'Nilaksha', 'Premaratne', 'M', '1971-02-20', '0739078299', 'No.70, Dam Street, Colombo', 'SUPPORTING'),
  ('ST000015', 'Niranjana', 'Kalupahana', 'F', '1970-12-31', '0740188263', 'No.37, Prince Street, Nuwara Eliya', 'SUPPORTING'),
  ('ST000016', 'Kamal', 'Weerasinghe', 'M', '1985-11-01', '0745534568', '203/3, Horana Road, Panadura', 'SUPPORTING'),
  ('ST000017', 'Jeyan', 'Silva', 'M', '1973-06-20', '0731224567', 'No.129, Matale Street, Kandy', 'SECURITY');

INSERT INTO app_login VALUES
  ('admin', '$2a$09$GHH3CSI8tylALSHZ5BcbyOBWI08JFQ38Uzi6MY/ceaiof2z9FxiI.', 'ST000001'),
  ('admin2', '$2a$09$GHH3CSI8tylALSHZ5BcbyOBWI08JFQ38Uzi6MY/ceaiof2z9FxiI.', 'ST000002'),
  ('accountant1', '$2a$09$GHH3CSI8tylALSHZ5BcbyOBWI08JFQ38Uzi6MY/ceaiof2z9FxiI.', 'ST000004'),
  ('labstaff1', '$2a$09$GHH3CSI8tylALSHZ5BcbyOBWI08JFQ38Uzi6MY/ceaiof2z9FxiI.', 'ST000006'),
  ('labstaff2', '$2a$09$GHH3CSI8tylALSHZ5BcbyOBWI08JFQ38Uzi6MY/ceaiof2z9FxiI.', 'ST000007');

INSERT INTO room VALUES
  ('RM000001', 5, 'ST000010', 'ST000013'),
  ('RM000002', 2, 'ST000011', 'ST000014'),
  ('RM000003', 3, 'ST000009', 'ST000013'),
  ('RM000004', 4, 'ST000009', 'ST000014'),
  ('RM000005', 5, 'ST000010', 'ST000015'),
  ('RM000006', 2, 'ST000011', 'ST000016'),
  ('RM000007', 3, NULL, NULL),
  ('RM000008', 4, NULL, NULL),
  ('RM000009', 5, NULL, NULL),
  ('RM000010', 2, NULL, NULL),
  ('RM000011', 3, NULL, NULL),
  ('RM000012', 4, NULL, NULL),
  ('RM000013', 5, NULL, NULL),
  ('RM000014', 2, NULL, NULL),
  ('RM000015', 3, NULL, NULL),
  ('RM000016', 4, NULL, NULL),
  ('RM000017', 5, NULL, NULL),
  ('RM000018', 2, NULL, NULL),
  ('RM000019', 3, NULL, NULL),
  ('RM000020', 4, NULL, NULL);

INSERT INTO client VALUES
  ('CL000001', 'Rue', 'Eoforwine', 'M', '1967-05-20', '0735173919', '73 Valley St. West Roxbury', 'NONE', 'NON_VEG', 'RM000002', 'NORMAL', '2022-02-16', NULL),
  ('CL000002', 'Ellington', 'Martialis', 'M', '1988-02-01', '0739162783', '73 Valley St. West Roxbury', 'FULLY', 'VEG', 'RM000002', 'NORMAL', '2022-02-16', NULL),
  ('CL000003', 'Zuza', 'Branislav', 'F', '1973-07-10', '0730100234', '831 Acacia St. Grayslake', 'FULLY', 'NON_VEG', 'RM000001', 'NORMAL', '2022-02-16', NULL),
  ('CL000004', 'Traudl', 'Haul', 'M', '1994-06-23', '0731123743', '831 Acacia St. Grayslake', 'PARTIALLY', 'VEG', 'RM000001', 'NORMAL', '2022-02-16', NULL),
  ('CL000005', 'Fabiana', 'Lauma', 'F', '2000-03-13', '0731922453', '831 Acacia St. Grayslake', 'FULLY', 'NON_VEG', 'RM000001', 'NORMAL', '2022-02-16', NULL),
  ('CL000006', 'Sebastian', 'Gonzalez', 'M', '1997-03-13', '0731273644', '831 Acacia St. Grayslake', 'NONE', 'VEG', 'RM000001', 'NORMAL', '2022-02-16', NULL),
  ('CL000007', 'John', 'Watson', 'M', '1997-03-13', '0731273644', '831 Acacia St. Grayslake', 'FULLY', 'NO_VEG', 'RM000001', 'NORMAL', '2022-02-16', NULL),
  ('CL000008', 'James', 'Furguson', 'M', '1997-03-13', '0731726711', '831 Acacia St. Grayslake', 'FULLY', 'NON_VEG', 'RM000001', 'NORMAL', '2022-02-16', NULL);

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
  ('TS000008', '2022-02-17', 'PCR', 'PENDING', 'CL000008', 'ST000007');

INSERT INTO payment VALUES
  ('PY000001', '2022-02-16', '7000.00', 'CL000001', 'ST000004'),
  ('PY000002', '2022-02-16', '7000.00', 'CL000002', 'ST000004'),
  ('PY000003', '2022-02-17', '6500.00', 'CL000003', 'ST000004'),
  ('PY000004', '2022-02-17', '7500.00', 'CL000004', 'ST000004'),
  ('PY000005', '2022-02-17', '7000.00', 'CL000005', 'ST000004'),
  ('PY000006', '2022-02-17', '6000.00', 'CL000006', 'ST000004'),
  ('PY000007', '2022-02-17', '5000.00', 'CL000007', 'ST000004'),
  ('PY000008', '2022-02-17', '6000.00', 'CL000008', 'ST000004');




  



