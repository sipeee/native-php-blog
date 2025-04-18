# Native PHP Blog

A projektet docker alatt készítettem el, érdemes a telepítéshez telepíteni egyet, ha még nincsen. Ha nem dockeres környezetben szeretnénk üzembe helyezni a blogot, akkor a telepítéshez érdemes a ./Dockerfile útmutatásait figyelembe venni.

A projekt környezetét fejlesztéshez legegyszerűbben a docker compose elindításával tudjuk üzembe helyezni:

> docker compose up -d

Ekkor a demo site az alábbi URL-en lesz elérhető lokálisan:

- http://127.0.0.1:8014/
- http://127.0.0.1:8014/login.php # crud-os belépés

Belépéshez a felhasználónév és jelszó migrációt követően: sipiszoty@gmail.com/password

Az adatbázis migrálásához be kell lépnünk a konténerbe és futtatnunk kell a migrációt:

> docker exec -ti blog-web bash
> 
> phpmig migrate

Ha szeretnénk tesztadatokat a próbálgatásokhoz, akkor azt az alább tudjuk megtenni:

> mysql -h 127.0.0.1 -p 3314 -u blog_user -p blog_password < /var/www/migrations/dump-test-data.sql

(Ez esetben a külső környezetnek rendelkeznie kell mysql kliensalkalmazással.)

Amivel még nem lettem kész (és persze látom, hogy jó lenne):
- A környezetek kialakítása elmaradt, most dev környezetben van a composer autoload-ja.
