Kako bi projekt radio potrebno je prvo na http://localhost/phpmyadmin/ kreirati bazu "projekt" s tablicama:

"news":

"ID" INT(11) s AUTO_INCRIMENT
"date" VARCHAR(32)
"title" VARCHAR(64)
"c_news" TEXT
"news" TEXT
"news_type" VARCHAR(64)
"image" VARCHAR(65)
"private" TINYINT(1)

i

"user":

"ID" INT(11) s AUTO_INCRIMENT
"name" VARCHAR(32)
"s_name" VARCHAR(32)
"u_name" VARCHAR(32)
"pass" VARCHAR(225)
"level" TINYINT(1)