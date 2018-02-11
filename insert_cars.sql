INSERT INTO public.driver (id, first_name, last_name, birthdate, license)
	VALUES (DEFAULT, 'John', 'Doe', '09-06-1969', 542156);

INSERT INTO public.driver (id, first_name, last_name, birthdate, license)
	VALUES (DEFAULT, 'Jane', 'Doe', '12-19-1968', 542177);
	
INSERT INTO public.driver (id, first_name, last_name, birthdate, license)
	VALUES (DEFAULT, 'Josh', 'Doe', '09-06-1989', 987568);
	
INSERT INTO public.driver (id, first_name, last_name, birthdate, license)
	VALUES (DEFAULT, 'Sarah', 'Doe', '03-01-1993', 383293);
	
INSERT INTO public.driver (id, first_name, last_name, birthdate, license)
	VALUES (DEFAULT, 'Sam', 'Smith', '09-06-1989', 323293);
	
INSERT INTO public.car (id, year, make, model, color, vin, mileage, driver_id)
	VALUES (DEFAULT, '2007', 'Mazda', 'Mazda6', 'silver', '1789GHNI2456923GI', 155000, (SELECT id FROM driver WHERE license = 542156));
	
INSERT INTO public.car (id, year, make, model, color, vin, mileage, driver_id)
	VALUES (DEFAULT, '1995', 'Volkswagen', 'Beetle', 'yellow', '19025GXLP24789923', 95000, (SELECT id FROM driver WHERE license = 542177));
	
INSERT INTO public.car (id, year, make, model, color, vin, mileage, driver_id)
	VALUES (DEFAULT, '2017', 'Toyota', 'Corolla', 'silver', 'JOPN2403932NMB456', 45000, (SELECT id FROM driver WHERE license = 987568));
	
INSERT INTO public.car (id, year, make, model, color, vin, mileage, driver_id)
	VALUES (DEFAULT, '2018', 'Hyundai', 'Accent', 'black', '1593987356GHCB123', 25000, (SELECT id FROM driver WHERE license = 383293));