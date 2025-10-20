#  dormitory-management-system (ระบบจัดการหอพัก)

โปรเจกต์นี้เป็นระบบสำหรับจัดการข้อมูลภายในหอพัก พัฒนาด้วย Laravel Framework เพื่อเพิ่มความสะดวกในการบริหารจัดการข้อมูลผู้เช่า, ห้องพัก, การเงิน และการแจ้งซ่อมบำรุง

## 🚀 Features (คุณสมบัติหลัก)

* **Authentication:** ระบบยืนยันตัวตน (Login/Register)
* **Tenant Management:** การจัดการข้อมูลผู้เช่า (เพิ่ม, ลบ, แก้ไข)
* **Room Management:** การจัดการข้อมูลห้องพัก (สถานะห้อง, ประเภทห้อง)
* **Invoice Management:** ระบบออกใบแจ้งหนี้และติดตามการชำระเงิน
* **Maintenance System:** ระบบแจ้งซ่อมและติดตามสถานะการซ่อม
* **Profile Management:** การจัดการโปรไฟล์ผู้ใช้งาน

## 🛠️ Technology Stack (เทคโนโลยีที่ใช้)

* **Backend:** PHP (Laravel Framework)
* **Frontend:** Blade Templates, CSS, JS
* **Database:** SQLite

## ⚙️ Installation (การติดตั้งเพื่อใช้งาน)

1.  Clone a repository:
    ```bash
    git clone [Your-Repo-URL]
    cd [Your-Project-Folder]
    ```

2.  ติดตั้ง Dependencies ของ PHP:
    ```bash
    composer install
    ```

3.  คัดลอกไฟล์ Environment:
    ```bash
    cp .env.example .env
    ```

4.  สร้าง Application Key:
    ```bash
    php artisan key:generate
    ```

5.  **ตั้งค่าฐานข้อมูล (สำคัญ):**
    * โปรเจกต์นี้ใช้ SQLite ตรวจสอบว่าในไฟล์ `.env` มีการตั้งค่า `DB_CONNECTION=sqlite`
    * (เนื่องจากคุณมีไฟล์ `database.sqlite` อยู่แล้ว ไม่ต้องตั้งค่า `DB_DATABASE` เพิ่มเติม)

6.  Run Database Migrations (สร้างตารางฐานข้อมูล):
    ```bash
    php artisan migrate
    ```

7.  (ถ้ามี) Run Seeders (เพิ่มข้อมูลเริ่มต้น):
    ```bash
    php artisan db:seed
    ```

8.  รันเซิร์ฟเวอร์:
    ```bash
    php artisan serve
    ```

9.  เปิดเว็บที่: `http://127.0.0.1:8000`

## 🚀 วิธีใช้ Ngrok (สำหรับพรีเซนต์)

1.  รันโปรเจกต์ของคุณ ( `php artisan serve` )
2.  เปิด Terminal/CMD อีกหน้าต่างหนึ่ง
3.  รันคำสั่ง:
    ```bash
    ngrok http 8000
    ```
4.  คุณจะได้ URL (เช่น `https://xxxx-xxxx-xxxx.ngrok-free.app`) ส่งให้เพื่อนหรืออาจารย์เพื่อเข้าดูเว็บของคุณได้เลย