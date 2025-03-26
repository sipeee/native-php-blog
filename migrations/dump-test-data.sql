TRUNCATE TABLE posts;
TRUNCATE TABLE users;

INSERT INTO blog_db.users (id, email, password, is_active) VALUES (1, 'sipiszoty@gmail.com', '$2y$12$LliRKVsXa0g.2vwUCrTfduLwKH4AsU3c1Gb41N9A4xdp38XzNZP3y', 1);
INSERT INTO blog_db.users (id, email, password, is_active) VALUES (2, 'sipiszoty2@gmail.com', '$2y$12$RWOLrH0nnsqtjC.jwWpc0Oj0nriIceSFU1jIj3RzHr5.Koo8GShje', 1);
INSERT INTO blog_db.users (id, email, password, is_active) VALUES (3, 'sipiszoty3@gmail.com', '$2y$12$faOU0XhpBKxAOaIHJhq5TOwK2sx5iOAX/r/4zOLTh6a3qu5q5rvi.', 1);
INSERT INTO blog_db.users (id, email, password, is_active) VALUES (4, 'sipiszoty4@gmail.com', '$2y$12$coNG2LRvmUU20LeuTBgyMeoPsStWMqKypOujoukLK2wW4EgAkLT0C', 1);
INSERT INTO blog_db.users (id, email, password, is_active) VALUES (5, 'sipiszoty5@gmail.com', '$2y$12$Ak3H0MwdKYschDFlad2mCerHzBOh1OcHczHmfNL9kf4IrpCFPhm0O', 0);

