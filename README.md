# منصة وعي 🌟

منصة توعوية حكومية متكاملة مبنية بتقنية Laravel 11 و Docker، تهدف إلى نشر الوعي وتقديم الدعم النفسي والاجتماعي للمجتمع.

## 📋 المميزات

- 🌐 **واجهة مستخدم عربية RTL** بالكامل
- 📱 **تصميم متجاوب** يعمل على جميع الأجهزة
- 🎨 **تصميم عصري** باستخدام TailwindCSS و Alpine.js
- 👥 **نظام مستخدمين متقدم** (مدير، مدير حملات، مستخدمين)
- 📚 **إدارة محتوى شامل** (مقالات، فيديوهات، كتب)
- 🤖 **مساعد ذكي** للإجابة على استفسارات المستخدمين
- 📧 **رسائل مستقبلية** مجدولة
- 📊 **نظام حملات توعوية** متقدم
- 💬 **مجتمع تفاعلي** للقصص والعادات
- 🔐 **نظام مصادقة آمن**
- 📈 **لوحة تحكم إدارية** متكاملة

## 🛠️ التقنيات المستخدمة

- **Backend**: Laravel 11, PHP 8.2
- **Frontend**: TailwindCSS, Alpine.js, Blade
- **Database**: MySQL 8.0
- **Cache**: Redis
- **Queue**: Redis Queue
- **Containerization**: Docker & Docker Compose
- **Web Server**: Nginx
- **Admin Panel**: Custom Laravel Admin

## 📋 المتطلبات

- Docker 20.10+
- Docker Compose 2.0+
- Git

## 🚀 التثبيت السريع

### الطريقة الأولى: استخدام سكريبت الإعداد (موصى به)

```bash
# استنساخ المشروع
git clone <repository-url>
cd وعي

# تشغيل سكريبت الإعداد
chmod +x setup.sh
./setup.sh
```

### الطريقة الثانية: استخدام Makefile

```bash
# استنساخ المشروع
git clone <repository-url>
cd وعي

# إعداد المشروع بالكامل
make setup
```

### الطريقة الثالثة: خطوات يدوية

```bash
# 1. نسخ ملف البيئة
cp .env.example .env

# 2. تشغيل الحاويات
docker-compose up -d

# 3. تثبيت الاعتماديات
docker-compose exec wa3y_app composer install

# 4. إنشاء مفتاح التطبيق
docker-compose exec wa3y_app php artisan key:generate

# 5. تشغيل الـ Migrations
docker-compose exec wa3y_app php artisan migrate

# 6. ملء قاعدة البيانات بالبيانات التجريبية
docker-compose exec wa3y_app php artisan db:seed

# 7. إنشاء روابط التخزين
docker-compose exec wa3y_app php artisan storage:link
```

## 🌐 الوصول للموقع

بعد التثبيت، يمكنك الوصول للموقع من خلال:

- **الموقع الرئيسي**: http://localhost:8001
- **phpMyAdmin**: http://localhost:8080
- **لوحة تحكم المدير**: http://localhost:8001/admin

## 👤 بيانات الدخول

| الدور | البريد الإلكتروني | كلمة المرور |
|------|------------------|-------------|
| مدير النظام | admin@wa3y.com | password |
| مدير الحملات | manager@wa3y.com | password |
| مستخدم عادي | user1@wa3y.com | password |

## 📁 هيكل المشروع

```
وعي/
├── app/
│   ├── Http/
│   │   ├── Controllers/     # Controllers
│   │   └── Middleware/       # Middleware
│   ├── Models/              # Eloquent Models
│   ├── Jobs/                # Queue Jobs
│   └── Mail/                # Mail Classes
├── database/
│   ├── migrations/          # Database Migrations
│   └── seeders/             # Database Seeders
├── resources/
│   ├── views/               # Blade Views
│   │   ├── layouts/         # Layout Templates
│   │   ├── components/      # Blade Components
│   │   ├── pages/           # Public Pages
│   │   ├── auth/            # Authentication Pages
│   │   └── admin/           # Admin Pages
│   └── emails/              # Email Templates
├── docker/                  # Docker Configurations
├── routes/                  # Route Files
├── storage/                 # Storage Directory
├── public/                  # Public Assets
├── docker-compose.yml       # Docker Compose Configuration
├── Makefile                 # Development Commands
└── setup.sh                 # Setup Script
```

## 🎨 الألوان والتصميم

- **اللون الأساسي**: #2D5E3A (أخضر داكن)
- **اللون الثانوي**: #C4A882 (ذهبي)
- **لون الخلفية**: #F0EFEC (بيج فاتح)
- **الخط**: Tajawal (خط عربي عصري)

## 📚 الأقسام الرئيسية

### 1. المقالات
- مقالات علمية وموثوقة
- تصنيفات متعددة (علم النفس، الإدمان، الصحة النفسية)
- نظام تقييم وتعليقات

### 2. الفيديوهات
- محتوى فيديو تعليمي
- قنوات متخصصة
- مدة متفاوتة (قصير، متوسط، طويل)

### 3. المكتبة
- كتب إلكترونية مجانية
- تحميل مباشر
- تصنيفات متنوعة

### 4. المجتمع
- قصص وتجارب شخصية
- عادات صحية
- نظام موافقة على المحتوى

### 5. المساعد الذكي
- روبوت محادثة ذكي
- إجابات فورية
- دعم نفسي أولي

## 🔧 الأوامر المفيدة

### أوامر Docker
```bash
# تشغيل الحاويات
docker-compose up -d

# إيقاف الحاويات
docker-compose down

# عرض السجلات
docker-compose logs -f

# الدخول لحاوية PHP
docker-compose exec wa3y_app bash
```

### أوامر Laravel
```bash
# تشغيل الـ Migrations
docker-compose exec wa3y_app php artisan migrate

# ملء قاعدة البيانات
docker-compose exec wa3y_app php artisan db:seed

# مسح الذاكرة المؤقتة
docker-compose exec wa3y_app php artisan cache:clear

# تحسين الأداء
docker-compose exec wa3y_app php artisan optimize
```

### أوامر Makefile
```bash
# عرض جميع الأوامر المتاحة
make help

# إعادة تهيئة قاعدة البيانات
make fresh

# تشغيل الاختبارات
make test

# مسح الحاويات والبيانات
make clean
```

## 📊 قاعدة البيانات

### الجداول الرئيسية
- `users` - معلومات المستخدمين
- `articles` - المقالات
- `videos` - الفيديوهات
- `books` - الكتب
- `stories` - قصص المجتمع
- `habits` - عادات صحية
- `future_messages` - الرسائل المستقبلية
- `campaigns` - الحملات التوعوية
- `contact_messages` - رسائل التواصل

## 🔐 الأمان

- حماية CSRF
- XSS Protection
- SQL Injection Prevention
- Password Hashing
- Rate Limiting
- Input Validation

## 📧 الإعدادات البريدية

يمكنك إعداد الإعدادات البريدية في ملف `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## 🚀 النشر للإنتاج

1. **إعداد البيئة**:
   ```bash
   cp .env.example .env
   # تعديل متغيرات البيئة للإنتاج
   ```

2. **تحسين الأداء**:
   ```bash
   make optimize
   ```

3. **تشغيل في وضع الإنتاج**:
   ```bash
   docker-compose -f docker-compose.prod.yml up -d
   ```

## 🤝 المساهمة

1. Fork المشروع
2. إنشاء فرع جديد (`git checkout -b feature/amazing-feature`)
3. حفظ التغييرات (`git commit -m 'Add amazing feature'`)
4. رفع الفرع (`git push origin feature/amazing-feature`)
5. إنشاء Pull Request

## 📄 الترخيص

هذا المشروع مرخص تحت ترخيص MIT.

## 🆘 الدعم

إذا واجهت أي مشكلة، يمكنك:

1. مراجعة قسم **الأوامر المفيدة**
2. التحقق من **السجلات** (`docker-compose logs`)
3. التواصل من خلال قسم **تواصل معنا** في الموقع

## 🙏 الشكر

شكراً لجميع المساهمين في هذا المشروع، وكل من يساهم في نشر الوعي في مجتمعنا.

---

**منصة وعي** - منصة توعوية حكومية متكاملة 🇸🇦
