# MVC PHP Routing ve Middleware Projesi

Bu proje, PHP ile oluşturulmuş basit bir MVC yapısıdır ve özel routing (yönlendirme) ile middleware (ara yazılım) içerir. Routing sistemi dinamik parametreler, opsiyonel parametreler ve regex desenleri için destek sağlar. Middleware'ler, controller çalıştırılmadan önce istekleri ele almak için kullanılabilir.

## Özellikler

- MVC mimarisi
- Dinamik ve opsiyonel parametreler ile özel routing
- İsteklerin yönetimi için middleware desteği
- PDO tabanlı veritabanı bağlantısı
- Çoklu içerik tipi (JSON, düz metin) yanıt desteği
- View (şablon) dosyalarını yüklemek için basit bir template motoru

## Kurulum

1. Repositoriesi klonlayın:
    ```bash
    git clone https://github.com/kullaniciadi/projeadi.git
    ```

2. Proje dizinine gidin:
    ```bash
    cd projeadi
    ```

3. Veritabanı ayarlarını yapılandırın:
    - `config/config.php` dosyasını açın ve veritabanı bilgilerini girin:
    ```php
    <?php
    return [
        'db_host' => 'localhost',
        'db_name' => 'veritabani_adi',
        'db_user' => 'kullanici_adi',
        'db_pass' => 'sifre',
    ];
    ```

4. Web sunucusunu başlatın:
    - PHP'nin yerleşik sunucusunu geliştirme ortamı için kullanabilirsiniz:
    ```bash
    php -S localhost:8000
    ```

5. Tarayıcınızda projeyi ziyaret edin:
    - `http://localhost:8000` adresine gidin.

## Dizin Yapısı

