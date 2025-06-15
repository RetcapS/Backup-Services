#  Yedekleme Servisi Web Uygulaması

Bu proje, bir yazılım firmasının yedekleme hizmeti için geliştirilmiş bir **web tabanlı uygulamadır**.  
Kullanıcılar kayıt olabilir, güvenli şekilde giriş yapabilir ve yedekleme kayıtlarını **ekleyip, listeleyip, düzenleyip silebilir**.

> Uygulama, **PHP**, **MySQL**, **HTML** ve **Bootstrap** kullanılarak, tamamen **yalın PHP** ile geliştirilmiştir.

---

##  Özellikler

- ** Kullanıcı Kaydı ve Oturum Yönetimi**  
  Şifreler `password_hash()` ile güvenli şekilde saklanır, oturumlar `PHP session` ile yönetilir.

- ** Yedekleme Yönetimi**  
  Kullanıcılar, müşteri adı, yedekleme tarihi, boyutu ve durumu içeren kayıtları **ekleyebilir, görüntüleyebilir, düzenleyebilir ve silebilir**.

- ** Güvenli Veri İşleme**  
  PDO ile güvenli sorgular, hash'li şifreler ve temel güvenlik önlemleri sağlanmıştır.

- ** Responsive Arayüz**  
  Tüm cihazlarda uyumlu arayüz için **Bootstrap 5.3** kullanılmıştır.

---

##  Kullanılan Teknolojiler

| Katman     | Teknoloji              |
|------------|------------------------|
| Backend    | PHP 7.4+ (yalın PHP)   |
| Veritabanı | MySQL                  |
| Frontend   | HTML, Bootstrap 5.3 (CDN) |
| JavaScript | Bootstrap JS, basit onay diyaloğu |

---

### Gereksinimler

- PHP 7.4 veya üstü  
- MySQL 5.7 veya üstü  
- Apache ya da uyumlu web sunucusu  
- İnternet bağlantısı (CDN için)

---

###  Yerel Ortam Kurulumu

#### 1. Sunucu Kurulumu
- XAMPP ya da benzeri bir sunucu ortamı kurun  
- Apache ve MySQL servislerini başlatın

#### 2. Veritabanı Oluşturma
- `database.sql` dosyasını phpMyAdmin üzerinden çalıştırın  
- `backup_service` veritabanı ve tabloları (users, backups) oluşacaktır

#### 3. Dosyaları Kopyalama
- Proje dosyalarını şu dizine kopyalayın:  
  `C:\xampp\htdocs\backup_service\`

#### 4. Veritabanı Ayarları
```php
// config.php içeriği
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'backup_service');
