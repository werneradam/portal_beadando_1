<<<<<<< HEAD
# portal_beadando_1

Készítette:
Knon Máté Károly (BYEPTT)
Prehoda Barna (AWZCZ9)
Székely Dalma (F6139U, másik csoport)
Werner Ádám (HTOXJV)
=======
Készítette: Székely Dalma (másik csoport), Knon Máté Károly (BYEPTT), Prehoda Barna (AWZCZ9), Werner Ádám (HTOXJV)
>>>>>>> ea991ccde7e70a9e130dfcacf3c3a6c5d228691a

# Secret Santa

# Leírás

<<<<<<< HEAD
A webalkalmazásunk neve Secret Santa. Ez egy karácsonyi titkos húzást megvalósító online felület.
A kezdőoldalon be lehet jelentkezni vagy új felhasználóként regisztrálni: felhasználónév (bármi lehet, nem egyedi), email cím (egyedi azonosító, egy @-et kell tartalmazzon), jelszó megadása
Ezután megjelenik a Csoportok oldal, ahol meg lehet nézni a húzásos csoportokot, majd a szimpatikushoz csatlakozni.

Első lépésként egy csoportvezetőnek kell felregisztrálnia az oldalra, akinek meg kell adnia a csoport nevét és a húzás napját. Ő tudja majd később elindítani is a húzást, illetve ha meggondolná magát, akkor a csoportot törölni is tudja.
A sima felhasználóknak is ugyanúgy kell regisztrálnia. Egy felhasználó csak egy húzásban vehet részt, de a húzás előtt válthat csoportot, ha mégis egy másikhoz húz a szíve.
Miután a csoportvezető elindította a húzást, mindenkinál megjelenik a felületen, hogy kit húzott.
Másik felület, ami minden felhasználó számára elérhető, a beállítások. Itt meg tudja változtatni a megadott adatait (felhasználónév, email cím, jelszó) minden felhasználó. Illetve ezen az oldalon szerepel a Kilépés gomb is.

Az alkalmazásunkban összesen 2 féle jogosultság létezik: admin és nem admin.
Az adminok kiváltsága még két oldal. Az egyik a felhasználók kezelésére szolgál, a másik a csoportok és azok tagjainak monitorozására. Az Admin felület menüben lehet látni a felhasználók azonosítóját, email címét, felhasználónevét és azt, hogy admin-e. Minden sor mellett szerepel egy gomb, amivel törölheti az adott felhasználót. Emellett új felhasználót is hozzáadhat ugyanúgy, mintha a felhasználó regisztrált volna. Az admin csoportok oldalon láthatja a csoportok azonosítóját, nevét, a húzás dátumát, a belépett felhasználók neveit és hogy ők hozták-e létre a csoportot. Emelett szerepel a Kirúgás a csoportból gomb, mellyel egy az adott sorban lévő felhasználót távolíthatja el a csoportból.
Egy admin felhasználó belépési kódja:
felhasználónév: test1
jelszó: 12345678

# Követelemények

Követelmények teljesítése:
1. Az alkalmazás tartalmazzon egy összetettebb űrlapot, melyet feldolgoztok:
Az admin_groups.php oldalon az admin hozzáadhat új felhasználót az adatbázishoz, amiben meg kell adnia egy email címet, jelszót, felhasználó nevet és ki kell pipálnia, hogy admin lesz-e.
2. Alkalmazzatok menetkövetést:
A github repositorynk linkje, melyben a feladatot teljesítettük:
https://github.com/werneradam/portal_beadando_1
3. Használjatok adatbázist:
Az adatbázis felépítéséhez szükséges .sql az sql mappban van portal_1.sql néven.
4. Az alkalmazást több, eltérő jogosultságú felhasználó tudja használni:
Van admin és sima felhasználónk.
5. Az admin jogosultságú felhasználó tudjon felvenni/törölni felhasználót:
Az admin_groups.php oldalon ezt megteheti. Ezt a lapot alapból csak admin jogosultságú felhasználók nyithatják meg.

# Fejlesztői munkamegosztás

Csapattagok feladatai:

Knon Máté:
A regisztráció és a bejelentkezés (registration.php, login.php) űrlapot készítette el, részt vett a hibák kijavításánál is.

Prehoda Barna:
Az admin felület (admin\_groups.php, admin.php) elkészítése Prehoda Barnára esett, a php-k hibajavításában is részt vett.

Székely Dalma:
Az oldal kinézete volt a legfőbb feladata, de a hibajavításoknál is jelentős szerepet kapott. Mindegyik css nagyrészt az ő munkájának köszönhető, ezen kívül a group.php-t is szerkesztette.

Werner Ádám:
Legtöbbet a group.php-ban szerkesztett, de a php-k összekapcsolásánál is jeleskedett.

Nehézségek a feladat során:
A git változáskövetés sokszor nem a leggördülékenyebb platform volt a merge conflictok kezelésekor.
Mivel a csapat fizikailag nem dogozhatott együtt, így sok híváson és üzeneten vagyunk túl, de ez alapvetően nagy meglepetésünkre nem bizonyult hátráltató tényezőnek a fejlesztés során.
Nem sokkal azután, hogy feltöltöttük a projektet a serverre, a php-s része elérhetetlenné vált, így megnehezítve a dolgonkut, hogy tudjuk, minden rendben vele.

Web-server elérhetősége:
=======
A Secret Santa egy webalkalmazás, ahol a karácsonyi húzást lehet megvalósítani online felületen keresztül. Első lépésként egy csoportvezetőnek kell felregisztrálni az oldalra:

- Regisztrálás: felhasználónév (bármi lehet, nem egyedi), e-mail cím (egyedi azonosító), jelszó megadása.
- Csoport létrehozása: meg kell adni a csoport nevét és a húzás napját.
- A húzást majd a csoport létrehozója (csoportvezető) tuja elindítani.
- A csoportot bármikor törölheti annak létrehozója.

Ezután a többi résztvevőnek is regisztrálnia kell magát a rendszerbe:

- A regisztráció ugyanúgy történik, mint a csoportvezető esetében.
- A regisztráció után csatlakozhat a csoportvezető által létrehozott csapathoz.
- Miután a csoportvezető elindította a húzás funkciót, miden résztvevőnél megjelenik, hogy kinek kell majd ajándékot vennie.
- A csoportvezetőn kívül bárki bármikor kiléphet a csoportból, a csoportvezető csak törölni tudja a csapatot

Admin felhasználói felület használata:

- Az első admin felületen az admin jogosultságú felhasználó látja az összes regisztrált felhasználó adatait, illetve egyesével ki tudja őket törölni az adatbázisból. Emellett lehetősége van új felhasználó létrehozására, ahol azt is kiválaszthatja, hogy az új felhasználó admin jogosultsággal rendelkezzen-e.
- A második admin képernyőn azt lehet látni, hogy a felhasználók mely csoportokban vannak benne, illetve azt, hogy abban a csoportban ők-e a csoportvezetők, akik létrehozták a csoportot. Továbbá lehetőség van a felhasználókat egyesével kirúgni a csoportjukból.
- Admin felhasználót csak admin jogosultságú felhasználó regisztrálhat

# Követelmények megvalósítása

- Összetett űrlap: regisztráció (registration.php), bejelentkezés (login.php) és az admin felhasználó létrehozása (admin.php) felületen is jelen van űrlap
- Alkalmazottak menetkövetése: minden php fájlban megtalálható
- Adatbázishasználat: a blan\_HTOXJV adatbázisban létrehoztunk két táblát a felhasználóknak és a csoportoknak (groups, users)
- Eltérő jogosultság: három jogosultságot különböztetünk meg (amin, csoportvezető, csoporttag)
- Admin felhasználói felület: elkészítettünk egy admin felületet (admin\_groups.php, admin.php)

# Fejlesztői munkamegosztás

### Székely Dalma

Az oldal kinézete volt a legfőbb feladata, de a hibajavításoknál is jelentős szerepet kapott. Mindegyik css nagyrészt az ő munkájának köszönhető, ezen kívül a group.php-t is szerkesztette.

### Knon Máté Károly

A regisztráció és a bejelentkezés (registration.php, login.php) űrlapot készítette el, részt vett a hibák kijavításánál is.

### Prehoda Barna

Az admin felület (admin\_groups.php, admin.php) elkészítése Prehoda Barnára esett, a php-k hibajavításában is részt vett.

### Werner Ádám

Legtöbbet a group.php-ban szerkesztett, de a php-k összekapcsolásánál is jeleskedett.
>>>>>>> ea991ccde7e70a9e130dfcacf3c3a6c5d228691a
