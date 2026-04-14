.PHONY: help setup up down shell fresh logs install migrate seed

# Default target
help:
	@echo "🌟 منصة وعي - الأوامر المتاحة"
	@echo ""
	@echo "setup     - إعداد المشروع بالكامل (بناء + تثبيت + تهيئة)"
	@echo "up        - تشغيل الحاويات"
	@echo "down      - إيقاف الحاويات"
	@echo "shell     - الدخول لحاوية PHP"
	@echo "fresh      - إعادة تهيئة قاعدة البيانات"
	@echo "logs      - عرض السجلات"
	@echo "install   - تثبيت الاعتماديات"
	@echo "migrate   - تشغيل الـ Migrations"
	@echo "seed      - ملء قاعدة البيانات بالبيانات التجريبية"
	@echo "test      - تشغيل الاختبارات"
	@echo "clean     - مسح الحاويات والبيانات"

# Setup the entire project
setup:
	@echo "🚀 بدء إعداد منصة وعي..."
	@chmod +x setup.sh
	@./setup.sh

# Start containers
up:
	@echo "🔧 تشغيل الحاويات..."
	docker compose up -d

# Stop containers
down:
	@echo "🛑 إيقاف الحاويات..."
	docker compose down

# Access PHP container shell
shell:
	@echo "🐚 الدخول لحاوية PHP..."
	docker compose exec wa3y_app bash

# Fresh installation (reset database)
fresh:
	@echo "🔄 إعادة تهيئة قاعدة البيانات..."
	docker compose exec wa3y_app php artisan migrate:fresh --seed

# View logs
logs:
	@echo "📋 عرض السجلات..."
	docker compose logs -f

# Install dependencies
install:
	@echo "📦 تثبيت الاعتماديات..."
	docker compose exec wa3y_app composer install

# Run migrations
migrate:
	@echo "🗄️ تشغيل الـ Migrations..."
	docker compose exec wa3y_app php artisan migrate

# Seed database
seed:
	@echo "🌱 ملء قاعدة البيانات..."
	docker compose exec wa3y_app php artisan db:seed

# Run tests
test:
	@echo "🧪 تشغيل الاختبارات..."
	docker compose exec wa3y_app php artisan test

# Clean up containers and volumes
clean:
	@echo "🧹 مسح الحاويات والبيانات..."
	docker compose down -v
	docker system prune -f

# Build containers
build:
	@echo "🏗️ بناء الحاويات..."
	docker compose build --no-cache

# Restart containers
restart:
	@echo "🔄 إعادة تشغيل الحاويات..."
	docker compose restart

# Check container status
status:
	@echo "📊 حالة الحاويات..."
	docker compose ps

# Access MySQL shell
mysql:
	@echo "🗄️ الدخول لـ MySQL..."
	docker compose exec mysql mysql -u wa3y_user -pwa3y_password wa3y_db

# Access Redis shell
redis:
	@echo "🔴 الدخول لـ Redis..."
	docker compose exec redis redis-cli

# Clear caches
clear-cache:
	@echo "🧹 مسح الذاكرة المؤقتة..."
	docker compose exec wa3y_app php artisan cache:clear
	docker compose exec wa3y_app php artisan config:clear
	docker compose exec wa3y_app php artisan view:clear

# Optimize for production
optimize:
	@echo "⚡ تحسين الأداء..."
	docker compose exec wa3y_app php artisan config:cache
	docker compose exec wa3y_app php artisan route:cache
	docker compose exec wa3y_app php artisan view:cache

# Create storage link
storage-link:
	@echo "🔗 إنشاء روابط التخزين..."
	docker compose exec wa3y_app php artisan storage:link

# Generate application key
key:
	@echo "🔑 إنشاء مفتاح التطبيق..."
	docker compose exec wa3y_app php artisan key:generate

# Show URLs
urls:
	@echo "🌐 روابط المشروع:"
	@echo "الموقع: http://localhost:8001"
	@echo "phpMyAdmin: http://localhost:8080"
	@echo ""
	@echo "👤 بيانات الدخول:"
	@echo "المدير: admin@wa3y.com / password"
	@echo "مدير الحملات: manager@wa3y.com / password"
	@echo "مستخدم: user1@wa3y.com / password"
