insert into content (ref, fname, minitial, lname, email, street, street2, apt, city, state, zip, hphonepre, hphone, hphoneext, mphonepre, mphone, image)
	values (2, 'Mark', 'R', 'Hamill', 'luke@rebels.gov', '123 Wampa Ave', NULL, 3, 'Rebel Base', 'Hoth', 11111, 333, 4444444, 55555, 333, 6666666, NULL);

insert into content (ref, fname, minitial, lname, email, street, street2, apt, city, state, zip, hphonepre, hphone, hphoneext, mphonepre, mphone, image)
	values (2, 'Harrison', 'J', 'Ford', 'han@nogov.gov', '123 Cantina', NULL, 111, 'Mos Eisley', 'Tatooine', 22222, 456, 1234567, 11111, 456, 7654321, NULL);

insert into content (ref, fname, minitial, lname, email, street, street2, apt, city, state, zip, hphonepre, hphone, hphoneext, mphonepre, mphone, image)
	values (2, 'Carrie', 'F', 'Fisher', 'leia@princess.gov', '123 Blown Up St', NULL, NULL, 'Peaceful Village', 'Alderaan', 99999, 123, 0987654, NULL, 123, 4567890, NULL);

insert into content (ref, fname, minitial, lname, email, street, street2, apt, city, state, zip, hphonepre, hphone, hphoneext, mphonepre, mphone, image)
	values (2, 'Alec', NULL, 'Guiness', 'oldben@hiding.net', '564 Sand Dunes', NULL, NULL, 'Middle Of Nowhere', 'Tatooine', '00000', NULL, NULL, NULL, NULL, NULL, NULL);

insert into content (ref, fname, minitial, lname, email, street, street2, apt, city, state, zip, hphonepre, hphone, hphoneext, mphonepre, mphone, image)
	values (2, 'Frank', NULL, 'Oz', 'yoda@hiding.net', '4158 Swampy Lane', NULL, NULL, 'REALLY Middle Of Nowhere', 'Degobah', 09658, 413, 4568491, NULL, 413, 9949201, NULL);
	
insert into credentials(username, passwd, fname, lname, email)
	values('test', sha1('password'), 'Name', 'Lastname', 'nameofemail@provider.net');
	
insert into credentials(username, passwd, fname, lname, email)
	values('admin', sha1('troll'), 'Supreme', 'Overlord', 'emperor@email.com');
	
insert into credentials(username, passwd, fname, lname, email)
	values('user', sha1('sample'), 'Bob', 'Joe', 'derp@fakemail.com');
	
insert into credentials(username, passwd, fname, lname, email)
	values('foobar', sha1('dog123'), 'Foo', 'Bar', 'foobar@foobar.foo');
	
insert into credentials(username, passwd, fname, lname, email)
	values('DONT_TRUST_USERS', sha1('r2d2'), '<blink></blink>', '<blink></blink>', '<blink></blink>@<blink>.com');