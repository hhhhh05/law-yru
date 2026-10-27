@echo off
REM ==================================================================
REM  law-web : ติดตั้งให้รันบนเครื่อง local (Laragon)
REM  วิธีใช้: เปิด Laragon > Terminal แล้วพิมพ์  setup-local.bat
REM ==================================================================
chcp 65001 >nul
setlocal
cd /d "%~dp0"

echo.
echo [1/6] ตรวจเวอร์ชัน PHP
for /f %%v in ('php -r "echo PHP_VERSION_ID;"') do set PHPV=%%v
if "%PHPV%"=="" (
  echo   ไม่พบคำสั่ง php - กรุณารันไฟล์นี้จาก Terminal ของ Laragon
  goto :fail
)
php -v | findstr /b "PHP"
if %PHPV% LSS 70400 (
  echo   ต้องใช้ PHP 7.4 ขึ้นไป - Laragon: คลิกขวา ^> PHP ^> Version
  goto :fail
)

echo.
echo [2/6] สร้างโฟลเดอร์ public (คัดลอกจาก aaapublicaaa)
robocopy aaapublicaaa public /E /NFL /NDL /NJH /NJS /NP >nul
if %ERRORLEVEL% GEQ 8 goto :fail

echo.
echo [3/6] แตกไฟล์ CSS/JS/รูป ของ Metronic ที่ build ไว้แล้ว
tar -xzf _setup\public_bundles.tgz -C public || goto :fail
tar -xzf _setup\public_media1.tgz -C public || goto :fail
tar -xzf _setup\public_media2.tgz -C public || goto :fail

echo.
echo [4/6] ลิงก์ไฟล์เอกสาร PDF (storage)
if not exist public\storage php artisan storage:link
if not exist "public\@laravel\storage\app" mkdir "public\@laravel\storage\app"
if not exist "public\@laravel\storage\app\public" mklink /J "public\@laravel\storage\app\public" "%CD%\storage\app\public" >nul

echo.
echo [5/6] สร้างฐานข้อมูล law-web
mysql -u root -e "CREATE DATABASE IF NOT EXISTS `law-web` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci" || goto :dbfail
set HASLAWS=0
for /f %%n in ('mysql -u root -N -e "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema='law-web' AND table_name='laws'"') do set HASLAWS=%%n
if "%HASLAWS%"=="0" (
  mysql -u root --default-character-set=utf8mb4 law-web < _setup\law_db_local.sql || goto :dbfail
  echo   import _setup\law_db_local.sql เรียบร้อย
) else (
  echo   law-web มีตารางอยู่แล้ว - ข้ามการ import ^(ไม่ทับข้อมูลเดิม^)
)

echo.
echo [6/6] ล้าง cache ของ Laravel
php artisan optimize:clear

echo.
echo ==================================================================
echo  เสร็จแล้ว
echo   - Laragon: กด Reload แล้วเปิด  http://law-web.test
echo   - หรือรัน   php artisan serve   แล้วเปิด  http://127.0.0.1:8000
echo   - ล็อกอินทดสอบ: /dev-login/1 = นิติกร , /dev-login/2 = นักกฎหมาย
echo ==================================================================
pause
exit /b 0

:dbfail
echo   เชื่อมต่อ MySQL ไม่ได้ - กด Start All ใน Laragon ก่อน แล้วรันใหม่
:fail
echo.
echo   ติดตั้งไม่สำเร็จ ดูข้อความด้านบน
pause
exit /b 1
