# portal_beadando_1

A webalkalmazásunk neve Secret Santa. Ez egy karácsonyi titkos húzásos online felület.
A kezdőoldalon be lehet jelentkezni vagy új felhasználóként regisztrálni: felhasználónév (bármi lehet, nem egyedi), email cím (egyedi azonosító, egy @-et kell tartalmazzon), jelszó megadása
Ezután megjelenik a Csoportok oldal, ahol meg lehet nézni a húzásos csoportokot, majd a szimpatikushoz csatlakozni.
Első lépésként egy csoportvezetőnek kell felregisztrálnia az oldalra, akinek meg kell adnia a csoport nevét és a húzás napját. Ő tudja majd később elindítani is a húzást, illetve ha meggondolná magát, akkor a csoportot törölni is tudja.
Egy felhasználó csak egy húzásban vehet részt, de a húzás előtt válthat csoportot, ha mégis egy másikhoz húz a szíve.
Miután a csoportvezető eilndította a húzást, mindenkinál megjelenik a felületen, hogy kit húzott.
Másik felület, ami minden felhasználó számára elérhető, a beállítások. Itt meg tudja változtatni a megadott adatait (felhasználónév, email cím, jelszó) minden felhasználó. Illetve ezen az oldalon szerepel a Kilépés gomb is.
Az alkalmazásunkban összesen 2 féle jogosultság létezik: admin és nem admin.
Az adminok kiváltsága még két oldal. Az egyik a felhasználók kezelésére szolgál, a másik a csoportok és azok tagjainak monitorozására. Az Admin felület menüben lehet látni a felhasználók azonosítóját, email címét, felhasználónevét és azt, hogy admin-e. Minden sor mellett szerepel egy gomb, amivel törölheti az adott felhasználót. Emellett új felhasználót is hozzáadhat ugyanúgy, mintha a felhasználó regisztrált volna. Az admin csoportok oldalon láthatja a csoportok azonosítóját, nevét, a húzás dátumát, a belépett felhasználók neveit és hogy ők hozták-e létre a csoportot. Emelett szerepel a Kirúgás a csoportból gomb, mellyel egy az adott sorban lévő felhasználót távolíthatja el a csoportból.
Egy admin felhasználó belépési kódja:
felhasználónév: test1
jelszó: 12345678

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

Csapattagok feladatai:
Knon Máté:
Prehoda Barna:
Székely Dalma: design, illetve kisebb javítások a szerkezetben
Werner Ádám:

Nehézségek a feladat során: