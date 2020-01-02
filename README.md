Tracking
-------
<div align="center">
    <img src="https://raw.githubusercontent.com/frappe/erpnext/develop/erpnext/public/images/erpnext-logo.png" height="128">
    <h2>Aplikasi Boilerplate CI dengan CeBok</h2>
    <p align="center">
        <p>ERP made simple</p>
    </p>
</div>

Setup
=====
-   Download [Git](https://git-scm.com/downloads)
    clone projek dengan perintah 
    ```bash
    git clone https://github.com/wisnubaldas/pos_aws.git
    ```

-   Update paket composer dengan perintah composer install jika belom install
    composer pasti error, install composer dulu, bisa di liat di
    [sini](https://getcomposer.org/download/)

-   Setting koneksi database pada file ```.env``` 
    Buka file ```.env``` setting koneksi database nya.

-   Lakukan migrate dengan perintah 
    ```bash 
        php index.php luthier migrate 
    ```
    jika tidak berhasil refresh migrasi,
    ```bash  
        php index.php luthier migrate reverse
        php index.php luthier migrate refresh
    ```
-   Buka broser aplikasi localhost, sesuaikan dengan nama project yang di buat, 
    ```http://localhost/skripsi/tracking``` login dengan user ```admin@admin.com``` dan password ```admin```
    
    <img src="https://github.com/wisnubaldas/skripsi_tracking/blob/master/tracjk.png">

Struktur Folder
=====
```html
application
    - config
    - controllers
        - master
        - shops
    - models
    - routes
    - views
      - errors
      - master
      - pos
      - simpleauth
      - shops
      - template

asset
    - css
    - img
    - js
    - plugins
```