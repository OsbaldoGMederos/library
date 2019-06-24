INSERT INTO categories(name, description)
VALUES('Horror', 'Horror is a genre that is intended to or has the ability to create the feeling of fear, repulsion, fright or terror in the readers. In other words, it creates a frightening and horror atmosphere.');

INSERT INTO categories(name, description)
VALUES('Humor', 'Humor fiction is usually full of fun, fancy, and excitement. It is meant to entertain and sometimes cause intended laughter in readers.');

INSERT INTO categories(name, description)
VALUES('Mystery', 'Mystery books have a suspenseful plot that often involves a mysterious crime. Suspects and motives are considered and clues throughout the story lead to a solution to the problem.');

INSERT INTO categories(name, description)
VALUES('Fantasy', 'A Book under this genre contains a story set in a fantasy world – a world that is not real and often includes magic, magical creatures, and supernatural events.');

INSERT INTO categories(name, description)
VALUES('Gothic Fiction', 'Common themes in Southern Gothic literature include deeply flawed, disturbing or eccentric characters who may be involved in hoodoo, decayed or derelict settings, grotesque situations, and other sinister events relating to or stemming from poverty, alienation, crime, or violence.');

INSERT INTO categories(name, description)
VALUES('Science fiction', 'Science fiction (sometimes called Sci-Fi or SF) is a genre of speculative fiction that has been called the "literature of ideas". It typically deals with imaginative and futuristic concepts such as advanced science and technology, time travel, parallel universes, fictional worlds, space exploration, and extraterrestrial life.');

INSERT INTO categories(name, description)
VALUES('Utopian and dystopian fiction', 'Utopia and dystopia are genres of speculative fiction that explore social and political structures. Utopian fiction portrays the setting that agrees with the author''s ethos, having various attributes of another reality intended to appeal to readers.');

INSERT INTO categories(name, description)
VALUES('Crime and Detective', 'As the name suggests, this book genre deals with crime, criminal motives and the investigation and detection of the crime and criminals.');

INSERT INTO categories(name, description)
VALUES('Action and Adventure', 'The stories under this genre usually show an event or a series of events that happen outside the course of the protagonist’s ordinary life. The plot is mostly accompanied by danger and physical action. These stories almost always move quickly and the high pace of the plot is usually an important part of the story.');



INSERT INTO books(name, author, category_id, published_date, user) 
VALUES('Fahrenheit 451','Ray Bradbury', 7, '1953-10-19', 'No User');

INSERT INTO books(name, author, category_id, published_date, user) 
VALUES('Foundation','Isaac Asimov', 6, '1951-01-01', 'No User');

INSERT INTO books(name, author, category_id, published_date, user) 
VALUES('Foundation and Empire','Isaac Asimov', 6, '1952-01-01', 'No User');

INSERT INTO books(name, author, category_id, published_date, user) 
VALUES('Second Foundation','Isaac Asimov', 6, '1953-01-01', 'No User');

INSERT INTO books(name, author, category_id, published_date, user) 
VALUES('Sherlock Holmes','Arthur Conan Doyle', 8, '1891-01-01', 'No User');

INSERT INTO books(name, author, category_id, published_date, user) 
VALUES('The Hobbit','J.R.R. Tolkien', 9, '1937-09-21', 'No User');

INSERT INTO books(name, author, category_id, published_date, user) 
VALUES('The Last Question','Isaac Asimov', 6, '1956-11-01', 'No User');

INSERT INTO books(name, author, category_id, published_date, user) 
VALUES('To Kill a Mockingbird','Harper Lee', 5, '1960-07-11', 'No User');
