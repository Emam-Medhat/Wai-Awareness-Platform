#!/bin/bash

# منصة وعي - Setup Script
# This script sets up the entire Wa'ay Awareness Platform

set -e  # Exit on any error

echo "🚀 بدء إعداد منصة وعي..."

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Function to print colored output
print_status() {
    echo -e "${GREEN}[INFO]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

print_header() {
    echo -e "${BLUE}================================${NC}"
    echo -e "${BLUE}$1${NC}"
    echo -e "${BLUE}================================${NC}"
}

# Check if Docker is installed
check_docker() {
    print_header "فحص Docker"
    if ! command -v docker &> /dev/null; then
        print_error "Docker غير مثبت. يرجى تثبيت Docker أولاً."
        echo "زيارة: https://docs.docker.com/get-docker/"
        exit 1
    fi
    
    if ! docker compose version &> /dev/null && ! command -v docker-compose &> /dev/null; then
        print_error "Docker Compose غير مثبت. يرجى تثبيت Docker Compose أولاً."
        exit 1
    fi
    
    print_status "Docker و Docker Compose جاهزين ✓"
}

# Build and start containers
setup_containers() {
    print_header "بناء وتشغيل الحاويات"
    
    # Stop existing containers if any
    docker compose down 2>/dev/null || true
    
    # Build containers
    print_status "بناء الحاويات..."
    docker compose build --no-cache
    
    # Start containers
    print_status "تشغيل الحاويات..."
    docker compose up -d
    
    print_status "انتظار قاعدة البيانات..."
    sleep 10
    
    # Wait for MySQL to be ready
    print_status "انتظار MySQL ليصبح جاهزاً..."
    while ! docker compose exec -T mysql mysqladmin ping -h"localhost" --silent; do
        echo "في انتظار MySQL..."
        sleep 2
    done
    
    print_status "الحاويات تعمل بنجاح ✓"
}

# Install Composer dependencies
install_dependencies() {
    print_header "تثبيت الاعتماديات"
    
    # Install Composer if not exists
    if ! command -v composer &> /dev/null; then
        print_status "تثبيت Composer..."
        docker compose exec wa3y_app sh -c "curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer"
    fi
    
    # Install PHP dependencies
    print_status "تثبيت حزم PHP..."
    docker compose exec wa3y_app composer install --no-interaction --optimize-autoloader
    
    print_status "تم تثبيت الاعتماديات بنجاح ✓"
}

# Setup Laravel application
setup_laravel() {
    print_header "إعداد Laravel"
    
    # Generate application key
    print_status "إنشاء مفتاح التطبيق..."
    docker compose exec wa3y_app php artisan key:generate
    
    # Create storage link
    print_status "إنشاء روابط التخزين..."
    docker compose exec wa3y_app php artisan storage:link
    
    # Cache configuration
    print_status "تخزين الإعدادات في الذاكرة المؤقتة..."
    docker compose exec wa3y_app php artisan config:cache
    
    print_status "تم إعداد Laravel بنجاح ✓"
}

# Run database migrations and seeders
setup_database() {
    print_header "إعداد قاعدة البيانات"
    
    # Run migrations
    print_status "تشغيل الـ Migrations..."
    docker compose exec wa3y_app php artisan migrate --force
    
    # Seed the database
    print_status "ملء قاعدة البيانات بالبيانات التجريبية..."
    docker compose exec wa3y_app php artisan db:seed --force
    
    print_status "تم إعداد قاعدة البيانات بنجاح ✓"
}

# Final setup steps
final_setup() {
    print_header "الإعدادات النهائية"
    
    # Set proper permissions
    print_status "ضبط الأذونات..."
    docker compose exec wa3y_app chown -R www-data:www-data /var/www/html/storage
    docker compose exec wa3y_app chown -R www-data:www-data /var/www/html/bootstrap/cache
    
    # Clear caches
    print_status "مسح الذاكرة المؤقتة..."
    docker compose exec wa3y_app php artisan cache:clear
    docker compose exec wa3y_app php artisan view:clear
    
    print_status "تم الإعدادات النهائية بنجاح ✓"
}

# Display success message and URLs
show_success() {
    print_header "🎉 تم الإعداد بنجاح!"
    
    echo ""
    echo -e "${GREEN}منصة وعي جاهزة للاستخدام:${NC}"
    echo ""
    echo -e "${BLUE}🌐 الموقع الرئيسي:${NC} http://localhost:8001"
    echo -e "${BLUE}📊 phpMyAdmin:${NC} http://localhost:8080"
    echo ""
    echo -e "${YELLOW}بيانات الدخول للتجربة:${NC}"
    echo -e "${BLUE}👤 المدير:${NC} admin@wa3y.com / password"
    echo -e "${BLUE}👤 مدير الحملات:${NC} manager@wa3y.com / password"
    echo -e "${BLUE}👤 مستخدم عادي:${NC} user1@wa3y.com / password"
    echo ""
    echo -e "${GREEN}أوامر مفيدة:${NC}"
    echo -e "${BLUE}• إيقاف الحاويات:${NC} docker compose down"
    echo -e "${BLUE}• عرض السجلات:${NC} docker compose logs -f"
    echo -e "${BLUE}• الدخول لحاوية PHP:${NC} docker compose exec wa3y_app bash"
    echo -e "${BLUE}• تشغيل الأوامر:${NC} docker compose exec wa3y_app php artisan [command]"
    echo ""
    echo -e "${GREEN}استمتع بمنصة وعي! 🚀${NC}"
}

# Main execution
main() {
    print_header "🌟 منصة وعي - منصة توعوية حكومية متكاملة"
    
    check_docker
    setup_containers
    install_dependencies
    setup_laravel
    setup_database
    final_setup
    show_success
}

# Handle script interruption
trap 'print_error "تم إيقاف الإعداد."; exit 1' INT

# Run main function
main
