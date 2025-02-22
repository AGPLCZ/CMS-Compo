# CMS-Compo

## 📌 O projektu
**CMS Compo** je modulární systém pro správu obsahu (CMS), který umožňuje snadné rozšíření pomocí komponent a pluginů. Systém je navržen s důrazem na flexibilitu, škálovatelnost a jednoduchost použití.

---

## 📂 Struktura projektu

### 📁 `src/` – Hlavní jádro systému
Tato složka obsahuje klíčové soubory a třídy, které zajišťují fungování CMS.

#### 📌 Hlavní soubory a jejich popis:
- **`Config.php`** – Konfigurace databáze a dalších globálních nastavení.
- **`Database.php`** – Třída pro komunikaci s databází pomocí PDO.
- **`Router.php`** – Správa směrování URL adres.
- **`PageRenderer.php`** – Správa vykreslování stránek.
- **`MenuManager.php`** – Správa a generování menu.
- **`UrlManager.php`** – Pomocná třída pro práci s URL adresami.
- **`Component.php`** – Základní třída pro všechny komponenty.
- **`Content.php`** – Správa obsahu uloženého v databázi.
- **`ContentLocalization.php`** – Podpora vícejazyčného obsahu.
- **`FlashManager.php`** – Správa flash zpráv pro uživatele.

---

### 📁 `admin/` – Administrátorská část
Složka obsahuje soubory a skripty pro správu CMS v administračním rozhraní.

#### 📌 Hlavní soubory a jejich popis:
- **`AdminRenderer.php`** – Správa vykreslování administračního rozhraní.
- **`CreatePage.php`** – Skript pro vytváření nových stránek.
- **`CreateContent.php`** – Správa a přidávání obsahu.
- **`EditContent.php`** – Možnost úpravy existujícího obsahu.
- **`EditComponentsOrder.php`** – Úprava pořadí komponent na stránce.
- **`DeleteComponents.php`** – Odstranění komponent.
- **`components.php`** – Správa dynamických komponent systému.

---

## 🚀 Instalace
```sh
# Naklonujte repozitář:
git clone https://github.com/AGPLCZ/CMS-Compo.git

# Nainstalujte závislosti přes Composer:
composer install

# Nakonfigurujte připojení k databázi v src/Config.php

# Spusťte migrace pro vytvoření tabulek:
php src/migrate.php
```

Otevřete projekt v prohlížeči a přihlaste se do administrace.

---

## 🔧 Požadavky
✅ PHP 7.4+
✅ MySQL / MariaDB
✅ Apache/Nginx s podporou mod_rewrite
✅ Composer pro správu závislostí

---

## 📜 Licence
Tento projekt je licencován pod licencí **MIT**.

---

## 🤝 Přispívání
Pokud chcete přispět do projektu, vytvořte **pull request** nebo nahlaste chybu v sekci **Issues**. 🛠️

