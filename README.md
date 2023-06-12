<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
Karl Umberto Kats
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# **PROGRAMMEERIMISE/HAJUSRAKENDUSTE PROJEKT**
### **EESMÄRK**


## **PÄRAST KLOONIMNIST**
### **TAASTAB VENDOR KAUSTA**
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
### **INSTALLIB NODE'I MOODULID**
```
npm run dev
```

### **Migrate DB**
```
sail artisan migrate
```

manifest
```
sail npm run build
```

laravel invoices https://github.com/LaravelDaily/laravel-invoices
```
sail composer require laraveldaily/laravel-invoices:^3.0
```
- Saada praktiline kogemus hajussüsteemide ehitamisest XML(SOAP) või Rest veebiteenusel ja sellele klientrakenduse loomise abil ning süvendada meeskonnatööoskust.

- SOAP veebiteenuse puhul eeldatakse WCF tehnoloogia kasutamist. Vanema põlvkonna ASP.NET veebiteenuse loomine on lubatud.

- REST teenuste loomisel tuleks kasutada ASP.NET Web API võimalusi.


### RÜHM 6. Laohaldussüsteem
Rühma projektiks on lüüa laohaldussüsteem. Kliendid saavad näha laoseisu ning peale
sobivate toodete tellimist saavad nad automaatselt genereeritud arve. Laos olevad tooted on
jaotatud kategooriate kaupa.
Rakenduse kasutajatele on võimalik määrata erinevaid rolle, rollid on seotud õigustega -
näiteks administraator saab hallata kõiki kasutajaid, kaupu ja kategooriaid.
Tavakasutaja saab aga ainult tellimusi vormistada.

### **PROJEKT KOOSNEB KOLMEST ERALDISEISVAST ÜLESANDEST:**
### **Ülesanne 1. XML**
Luua XML fail vabalt valitud andmete edastamiseks, selle faili skeemifail ning XSL fail(id)
erinevate transformatsioonide tarvis (soovitavalt vähemalt andmete HTML ja XML kujul
kuvamiseks)
XML fail peab sisaldama toodenimi, id, kogus, arve, tellija, kuupäev ning võib lisada
oma omadusi.
XML-il peab olema 2 või 3 loogilist dimensiooni.

```
<dim1>
  <dim2>
    <dim3>
    </dim3>
  </dim2>
</dim1>
```




Kuvada andmed HTML tabelina kasutades XSLT ja PHP failis erinevaid funktsioone
(näiteks, otsida tellimuste numbri ja tellijate järgi).
Välja mõelda vähemalt 3 funktsiooni

### **Ülesanne 2. Veebiteenus ja klientrakendus.**
**Rakenduses on olemas järgmised võimalused:**
Rakendus võimaldab kasutajal veebirakendusse sisse logida, kasutades e-posti ja parooli.
Andmebaasis hoitakse toodete andmed ja tellimused(tähtaeg, toode, tellija, arve koostaja),
kasutajate paroole/emaile (adminid).

-  Kasutajate registreerimise süsteem
-  Kasutajate haldussüsteem
-  Sisse logimine
-  Laoseisu jälgimine
-  Kaupade tellimine, arve genereerimine
-  Kauba nimekiri erinevates ladudes
-  Tehtud tellimuste vaatamine
-  Toodetele CRUD

### **Ülesanne 3. Projekti dokumentatsioon.**

Kasutajalood (PivotalTrackeris vms. keskkonnas) koos vastuvõtu tingimustega.
Lähtekood versioonihalduses, tähenduslikud koodikinnitused ja seotud kasutajalugudega.
Projekti loomise etapid koos vastavate kirjelduste ja piltidega.
Kasutajajuhend iga rolli jaoks.
