Készítette: Székely Dalma (másik csoport), Knon Máté Károly (BYEPTT), Prehoda Barna (AWZCZ9), Werner Ádám (HTOXJV)

# Secret Santa

# Leírás

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
