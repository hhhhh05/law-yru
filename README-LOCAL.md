# รัน law-web บนเครื่อง local (Laragon)

## ติดตั้งครั้งแรก

1. ใช้ PHP 8.1 หรือ 8.2 ของ Laragon ได้ทั้งคู่
2. กด **Start All**
3. เปิด **Terminal** ของ Laragon แล้วรัน
   ```
   cd C:\laragon\www\law-web
   setup-local.bat
   ```
4. Laragon → **Reload** แล้วเปิด http://law-web.test
   (หรือรัน `php artisan serve` แล้วเปิด http://127.0.0.1:8000)

## ล็อกอินบน local

YRU Passport ส่ง callback กลับไปที่ law.yru.ac.th เท่านั้น จึงใช้ปุ่ม Passport บน local ไม่ได้ ให้ใช้ลิงก์ทดสอบแทน

- http://law-web.test/dev-login/1 → นิติกร (status 1) → เมนู /law, /check, /report
- http://law-web.test/dev-login/2 → นักกฎหมาย (status 2) → เมนู /lawyer, /lawyerreport
- http://law-web.test/dev-logout → ออกจากระบบ

ลิงก์นี้เปิดเฉพาะเมื่อ `.env` มี `APP_ENV=local` และ `LOCAL_DEV_LOGIN=true`

## สิ่งที่แก้ไข / เพิ่ม

| ไฟล์ | รายละเอียด |
|---|---|
| `.env` | APP_URL = law-web.test, DB = root/ไม่มีรหัส, เพิ่ม LOCAL_DEV_LOGIN (ค่าเดิมสำรองไว้ใน `.env.production`) |
| `bootstrap/app.php` | ไม่ให้ E_DEPRECATED ของ PHP 8.1 กลายเป็น error (Laravel 7) |
| `app/Classes/Theme/Menu.php` | กัน error "Cannot access offset of type string on string" ใน PHP 8 |
| `vendor/nesbot/carbon/src/Carbon/Traits/Creator.php` | แก้ให้ Carbon 2.51 ทำงานบน PHP 8.2+ ได้ (ไฟล์เดิมสำรองไว้เป็น .orig) — ถ้ารัน composer install/update ใหม่ต้องแก้ซ้ำ หรืออัปเกรดเป็น nesbot/carbon ^2.62 |
| `routes/web.php` | เพิ่ม /dev-login, /dev-logout (local เท่านั้น) |
| `public/` | สร้างจาก `aaapublicaaa` + CSS/JS ของ Metronic ที่ build แล้ว (`npm run production`) |
| `_setup/law_db_local.sql` | โครงสร้าง DB ที่ตรงกับโค้ด (laws, types, stutas, users ...) + ผู้ใช้ทดสอบ |

## ข้อมูลจริง

- ฐานข้อมูล: ถ้ามี dump ของฐานข้อมูล จากเซิร์ฟเวอร์ ให้ import ผ่าน HeidiSQL เข้าฐานข้อมูล `law-web` แทน `law_db_local.sql`
  (ต้อง UPDATE ผู้ใช้ของตัวเองให้ `status` = 1 หรือ 2 ถ้าจะใช้ /dev-login/{id})
- ไฟล์ PDF อยู่ใน `storage/app/public/law` แล้ว (ลิงก์ให้โดย setup-local.bat)
- รูปโลโก้/แบนเนอร์ใน `public/media/logos` บางไฟล์ไม่มีในโปรเจกต์ (banner_law.png, yru_passport.jpg, yru-logo.png, *_logo.png, qr-lineofficial.png, new_year.jpg) ให้คัดลอกจากเซิร์ฟเวอร์จริงมาใส่

## หลังจากติดตั้งเสร็จ ลบได้

`_setup/_build_src.tgz`, `_setup/proj_src.tgz` (ไฟล์ชั่วคราวที่ใช้ตอน build)
